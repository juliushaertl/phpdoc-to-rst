<?php
/**
 * @copyright Copyright (c) 2017 Julius Härtl <jus@bitgrid.net>
 *
 * @author Julius Härtl <jus@bitgrid.net>
 *
 * @license GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace JuliusHaertl\PHPDocToRst;

use JuliusHaertl\PHPDocToRst\Extension\Extension;
use phpDocumentor\Reflection\File\LocalFile;
use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Namespace_;
use phpDocumentor\Reflection\Php\Project;
use phpDocumentor\Reflection\Php\ProjectFactory;

use JuliusHaertl\PHPDocToRst\Builder\ClassBuilder;
use JuliusHaertl\PHPDocToRst\Builder\InterfaceBuilder;

class ApiDocBuilder {

    private $reflectionProject;

    /** @var Project */
    private $project;

    private $docFiles = [];

    private $extensions;


    public function __construct($srcDir, $dstDir) {
        $this->dstDir = $dstDir;
        $this->srcDir = $srcDir;
        $this->setupReflection();
    }

    public function build() {
        $this->createDirectoryStructure();
        $this->parseFiles();
        $this->buildToc();
    }

    /**
     * @throws \Exception
     */
    private function setupReflection() {
        if (!is_array($this->srcDir)) {
            $this->srcDir = [$this->srcDir];
        }
        $interfaceList = [];

        foreach ($this->srcDir as $srcDir) {
            $dir = new \RecursiveDirectoryIterator($srcDir);
            $files = new \RecursiveIteratorIterator($dir);

            foreach ($files as $file) {
                if ($file->isDir()) continue;
                try {
                    $interfaceList[] = new LocalFile($file->getPathname());
                } catch (\Exception $e) {
                    echo "Failed to load " . $file->getPathname() . "\n";
                }
            }
        }

        $projectFactory = ProjectFactory::createInstance();
        $this->project = $projectFactory->create('MyProject', $interfaceList);
    }

    /**
     * @param string $class name of the extension class
     * @throws \Exception
     */
    public function addExtension($class) {
        $extension = new $class($this->project);
        if (!is_subclass_of($extension, Extension::class)) {
            throw new \Exception('Extension must be an instance of JuliusHaertl\PHPDocToRst\Extension\Extension');
        }
        $this->extensions[] = $extension;
    }

    /**
     * Create directory structure for the rst output
     */
    public function createDirectoryStructure() {
        foreach ($this->project->getNamespaces() as $namespace) {
            $namespaceDir = $this->dstDir . str_replace("\\", "/", $namespace->getFqsen());
            if (!mkdir($namespaceDir, 0755, true)) {
                throw new \Exception('Could not create directory '. $namespaceDir);
            }
        }
    }

    public function parseFiles() {
        /** @var Extension $extension */
        foreach ($this->extensions as $extension) {
            $extension->prepare();
        }
        foreach ($this->project->getFiles() as $file) {
            /**
             * Constants, Traits not used in files
             * Go though interfaces/classes/functions of files and build documentation
             */
            foreach ($file->getInterfaces() as $interface) {
                $builder = new InterfaceBuilder($file, $interface, $this->extensions);
                $filename = $this->dstDir . str_replace("\\", "/", $interface->getFqsen()) . '.rst';
                file_put_contents($filename, $builder->getContent());
                $this->docFiles[(string)$interface->getFqsen()] = str_replace("\\", "/", $interface->getFqsen());
            }

            foreach ($file->getClasses() as $class) {
                $builder = new ClassBuilder($file, $class, $this->extensions);
                $filename = $this->dstDir . str_replace("\\", "/", $class->getFqsen()) . '.rst';
                file_put_contents($filename, $builder->getContent());
                $this->docFiles[(string)$class->getFqsen()] = str_replace("\\", "/", $class->getFqsen());
            }

            // FIXME: add functions/constants/traits

        }
    }

    // FIXME: Builder class for indexes
    public function buildNamespaceIndexes(Namespace_ $namespace) {
        $label = str_replace('\\', '-', $namespace->getFqsen());
        $len = strlen($namespace->getFqsen());

        $content = '.. _namespace-' . $label . ':

' . $namespace->getFqsen() . '
' . str_repeat('=', $len) . '

';

        $content .= 'Classes' . PHP_EOL;
        $content .= '-------' . PHP_EOL;
        $content .= '.. toctree::' . PHP_EOL;
        $content .= '  :maxdepth: 2' . PHP_EOL . PHP_EOL;
        /** @var Class_ $entry */
        foreach ($namespace->getClasses() as $entry) {
            $subPath = str_replace($namespace->getFqsen(), '', $entry);
            $path = substr(str_replace("\\", "/", $subPath), 1);
            $content .= "  " . $entry . ' <' . $path . '>' . PHP_EOL;
        }
        $content .= PHP_EOL . PHP_EOL;

        $content .= 'Interfaces' . PHP_EOL;
        $content .= '----------' . PHP_EOL;
        $content .= '.. toctree::' . PHP_EOL;
        $content .= '  :maxdepth: 2' . PHP_EOL . PHP_EOL;
        /** @var Class_ $entry */
        foreach ($namespace->getInterfaces() as $entry) {
            $subPath = str_replace($namespace->getFqsen(), '', $entry);
            $path = substr(str_replace("\\", "/", $subPath), 1);
            $content .= "  " . $entry . ' <' . $path . '>' . PHP_EOL;
        }
        $content .= PHP_EOL . PHP_EOL;

        $path = substr(str_replace("\\", "/", $namespace->getFqsen()), 1);
        $fullPath = $this->dstDir . '/' . $path . '/index.rst';
        file_put_contents($fullPath, $content);


    }

    // FIXME: Builder class for toc
    public function buildToc() {

        $content = '.. _namespaces:

Public namespaces
=================

.. toctree::
  :maxdepth: 2

';

        $namespaces = $this->project->getNamespaces();
        usort($namespaces, function (Namespace_ $a, Namespace_ $b) {
            return strcmp($a->getFqsen(), $b->getFqsen());
        });
        foreach ($namespaces as $namespace) {
            $path = str_replace("\\", "/", $namespace->getFqsen());
            $content .= "  " . $namespace->getFqsen() . ' <' . substr($path, 1) . '/index>' . PHP_EOL;
            $this->buildNamespaceIndexes($namespace);
        }
        file_put_contents($this->dstDir . '/namespaces.rst', $content);


        $content = '.. _interfaces:

\OCP Interfaces
===============

.. toctree::
  :maxdepth: 3

';

        ksort($this->docFiles);
        foreach ($this->docFiles as $n => $f) {
            $content .= "  " . $n . ' <' . substr($f, 1) . '>' . PHP_EOL;
        }
        file_put_contents($this->dstDir . '/interfaces.rst', $content);


        $content = '.. _public-api-docs:

Public API Docs
===============

.. toctree::
  :maxdepth: 2

  interfaces
  namespaces
';
        file_put_contents($this->dstDir . '/index.rst', $content);

    }

}
