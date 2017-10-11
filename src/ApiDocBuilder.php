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

use JuliusHaertl\PHPDocToRst\Builder\TraitFileBuilder;
use JuliusHaertl\PHPDocToRst\Middleware\ErrorHandlingMiddleware;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\File\LocalFile;
use phpDocumentor\Reflection\Php\Namespace_;
use phpDocumentor\Reflection\Php\NodesFactory;
use phpDocumentor\Reflection\Php\Project;
use phpDocumentor\Reflection\Php\ProjectFactory;
use phpDocumentor\Reflection\Php\Factory;
use JuliusHaertl\PHPDocToRst\Builder\MainIndexBuilder;
use JuliusHaertl\PHPDocToRst\Builder\NamespaceIndexBuilder;
use JuliusHaertl\PHPDocToRst\Extension\Extension;
use JuliusHaertl\PHPDocToRst\Builder\ClassFileBuilder;
use JuliusHaertl\PHPDocToRst\Builder\InterfaceFileBuilder;
use phpDocumentor\Reflection\PrettyPrinter;

/**
 * This class is used to parse a project tree and generate rst files
 * for all of the containing PHP structures
 *
 * Example usage is documented in examples/example.php
 *
 * @package JuliusHaertl\PHPDocToRst
 */
class ApiDocBuilder {

    /** @var Project */
    private $project;

    /** @var array */
    private $docFiles = [];

    /** @var Extension[] */
    private $extensions;

    /** @var string[] */
    private $extensionNames = [];

    /** @var string[] */
    private $srcDir;

    /** @var string */
    private $dstDir;

    /** @var bool */
    private $verboseOutput = false;

    /** @var bool */
    private $debugOutput = false;

    /**
     * ApiDocBuilder constructor.
     *
     * @param string[] $srcDir array of paths that should be analysed
     * @param string $dstDir path where the output documentation should be stored
     */
    public function __construct($srcDir, $dstDir) {
        $this->dstDir = $dstDir;
        $this->srcDir = (array)$srcDir;
    }

    /**
     * Run this to build the documentation
     */
    public function build() {
        $this->setupReflection();
        $this->createDirectoryStructure();
        $this->parseFiles();
        $this->buildIndexes();
    }

    /* hacky logging for cli */

    /**
     * Enable verbose logging output
     *
     * @param bool $v Set to true to enable
     */
    public function setVerboseOutput($v) {
        $this->verboseOutput = $v;
    }

    /**
     * Enable debug logging output
     *
     * @param bool $v Set to true to enable
     */
    public function setDebugOutput($v) {
        $this->debugOutput = $v;
    }

    /**
     * Log a message
     *
     * @param string $message Message to be logged
     */
    public function log($message) {
        if ($this->verboseOutput) {
            echo $message . PHP_EOL;
        }
    }

    /**
     * Log a debug message
     *
     * @param string $message Message to be logged
     */
    public function debug($message) {
        if ($this->debugOutput) {
            echo $message . PHP_EOL;
        }
    }

    /**
     * @throws \Exception
     */
    private function setupReflection() {

        $interfaceList = [];
        $this->log('Start parsing files.');
        foreach ($this->srcDir as $srcDir) {
            $dir = new \RecursiveDirectoryIterator($srcDir);
            $files = new \RecursiveIteratorIterator($dir);

            foreach ($files as $file) {
                if ($file->isDir()) {
                    continue;
                }
                try {
                    $interfaceList[] = new LocalFile($file->getPathname());
                } catch (\Exception $e) {
                    $this->log('Failed to load ' . $file->getPathname() . PHP_EOL);
                }
            }
        }

        $projectFactory = new ProjectFactory([
            new Factory\Argument(new PrettyPrinter()),
            new Factory\Class_(),
            new Factory\Constant(new PrettyPrinter()),
            new Factory\DocBlock(DocBlockFactory::createInstance()),
            new Factory\File(NodesFactory::createInstance(),
                [
                    new ErrorHandlingMiddleware($this)
                ]),
            new Factory\Function_(),
            new Factory\Interface_(),
            new Factory\Method(),
            new Factory\Property(new PrettyPrinter()),
            new Factory\Trait_(),
        ]);
        $this->project = $projectFactory->create('MyProject', $interfaceList);
        $this->log('Successfully parsed files.');

        // load extensions
        foreach ($this->extensionNames as $extensionName) {
            $extension = new $extensionName($this->project);
            if (!is_subclass_of($extension, Extension::class)) {
                $this->log('Failed to load extension ' . $extensionName . '.');
            }
            $this->extensions[] = $extension;
            $this->log('Extension ' . $extensionName . ' loaded.');
        }
    }

    /**
     * @param string $class name of the extension class
     * @throws \Exception
     */
    public function addExtension($class) {
        $this->extensionNames[] = $class;
    }

    /**
     * Create directory structure for the rst output
     * @throws \Exception
     */
    private function createDirectoryStructure() {
        foreach ($this->project->getNamespaces() as $namespace) {
            $namespaceDir = $this->dstDir . str_replace('\\', '/', $namespace->getFqsen());
            if (is_dir($namespaceDir)) {
                continue;
            }
            if (!mkdir($namespaceDir, 0755, true)) {
                throw new WriteException('Could not create directory ' . $namespaceDir);
            }
        }
    }

    private function parseFiles() {
        /** @var Extension $extension */
        foreach ($this->extensions as $extension) {
            $extension->prepare();
        }
        $this->log('Start building files');
        foreach ($this->project->getFiles() as $file) {
            /**
             * Go though interfaces/classes/functions of files and build documentation
             */
            foreach ($file->getInterfaces() as $interface) {
                $fqsen = $interface->getFqsen();
                $builder = new InterfaceFileBuilder($file, $interface, $this->extensions);
                $filename = $this->dstDir . str_replace('\\', '/', $fqsen) . '.rst';
                file_put_contents($filename, $builder->getContent());
                $this->docFiles[(string)$interface->getFqsen()] = str_replace('\\', '/', $fqsen);

                // also build root namespace in indexes
                if (strpos((string)substr($fqsen, 1), '\\') === false) {
                    $this->project->getRootNamespace()->addInterface($fqsen);
                }
                $this->debug('Written interface documentation to ' . $filename);
            }

            foreach ($file->getClasses() as $class) {
                $fqsen = $class->getFqsen();
                $builder = new ClassFileBuilder($file, $class, $this->extensions);
                $filename = $this->dstDir . str_replace('\\', '/', $fqsen) . '.rst';
                file_put_contents($filename, $builder->getContent());
                $this->docFiles[(string)$class->getFqsen()] = str_replace('\\', '/', $fqsen);

                // also build root namespace in indexes
                if (strpos((string)substr($class->getFqsen(), 1), '\\') === false) {
                    $this->project->getRootNamespace()->addClass($fqsen);
                }
                $this->debug('Written class documentation to ' . $filename);
            }

            foreach ($file->getTraits() as $trait) {
                $fqsen = $trait->getFqsen();
                $builder = new TraitFileBuilder($file, $trait, $this->extensions);
                $filename = $this->dstDir . str_replace('\\', '/', $fqsen) . '.rst';
                file_put_contents($filename, $builder->getContent());
                $this->docFiles[(string)$trait->getFqsen()] = str_replace('\\', '/', $fqsen);

                // also build root namespace in indexes
                if (strpos((string)substr($fqsen, 1), '\\') === false) {
                    $this->project->getRootNamespace()->addTrait($fqsen);
                }
                $this->debug('Written trait documentation to ' . $filename);
            }

            // TODO: document constants/functions without namespace
            // $file->getConstants();
            // $file->getFunctions();


        }
    }

    private function buildIndexes() {
        $this->log('Build indexes.');
        $namespaces = $this->project->getNamespaces();
        $namespaces['\\'] = $this->project->getRootNamespace();
        usort($namespaces, function (Namespace_ $a, Namespace_ $b) {
            return strcmp($a->getFqsen(), $b->getFqsen());
        });
        /** @var Namespace_ $namespace */
        foreach ($namespaces as $namespace) {
            $this->debug('Build namespace index for ' . $namespace->getFqsen());
            $builder = new NamespaceIndexBuilder($this->extensions, $namespaces, $namespace);
            $builder->render();
            $path = $this->dstDir . str_replace('\\', '/', $namespace->getFqsen()) . '/index.rst';
            file_put_contents($path, $builder->getContent());
        }

        $this->log('Build main index files.');
        $builder = new MainIndexBuilder($namespaces);
        $builder->render();
        $path = $this->dstDir . '/index-namespaces-all.rst';
        file_put_contents($path, $builder->getContent());
    }
}
