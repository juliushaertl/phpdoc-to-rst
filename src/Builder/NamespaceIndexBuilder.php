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
namespace JuliusHaertl\PHPDocToRst\Builder;


use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Php\Namespace_;

/**
 * This class will build an index for each namespace.
 * It contains a toc for child namespaces, classes, traits, interfaces and functions
 *
 * @package JuliusHaertl\PHPDocToRst\Builder
 */
class NamespaceIndexBuilder extends PhpDomainBuilder {

    /** @var Namespace_ */
    private $currentNamespace;
    /** @var Namespace_[] */
    private $namespaces;

    public function __construct($extensions, $namespaces, Namespace_ $current) {
        parent::__construct($extensions);
        $this->namespaces = $namespaces;
        $this->currentNamespace = $current;
    }

    public function render() {
        $currentNamespaceFqsen = (string)$this->currentNamespace->getFqsen();

        /**
         * Find child namespaces for current namespace
         */
        $childNamespaces = [];
        /** @var Namespace_ $namespace */
        foreach ($this->namespaces as $namespace) {
            // check if not root and doesn't start with current namespace
            if ($currentNamespaceFqsen !== '\\' && strpos((string)$namespace->getFqsen(), $currentNamespaceFqsen . '\\') !== 0) {
                continue;
            }
            if (
                strpos((string)$namespace->getFqsen(), $currentNamespaceFqsen) === 0
                && (string)$namespace->getFqsen() !== (string)$currentNamespaceFqsen
            ) {
                // only keep first level children
                $childrenPath = substr((string)$namespace->getFqsen(), strlen((string)$this->currentNamespace->getFqsen())+1);
                if (strpos($childrenPath, '\\') === false) {
                    $childNamespaces[] = $namespace;
                }
            }
        }

        if ($currentNamespaceFqsen !== '\\') {
            $label = str_replace('\\', '-', $currentNamespaceFqsen);
            $this->addLine('.. _namespace' . $label . ':')->addLine();
            $this->addH1(RstBuilder::escape($this->currentNamespace->getName()));
            $this->addLine(self::escape($currentNamespaceFqsen))->addLine();
        } else {
            $label = 'root-namespace';
            $this->addLine('.. _namespace-' . $label . ':')->addLine();
            $this->addH1(RstBuilder::escape('\\'));
        }
        $this->addLine();

        $this->addH2('Namespaces');
        $this->addLine('.. toctree::');
        $this->indent();
        $this->addLine(':maxdepth: 1')->addLine();
        /** @var Namespace_ $namespace */
        foreach ($childNamespaces as $namespace) {
            $this->addLine($namespace->getName() . ' <' . $namespace->getName() . '/index>');
        }
        $this->unindent();
        $this->addLine()->addLine();

        $this->addH2('Interfaces');
        $this->addLine('.. toctree::');
        $this->indent();
        $this->addLine(':maxdepth: 1')->addLine();
        /** @var Fqsen $entry */
        foreach ($this->currentNamespace->getInterfaces() as $entry) {
            $subPath = $entry;
            if ($currentNamespaceFqsen !== '\\' && substr($entry, 0, strlen($currentNamespaceFqsen)) === $currentNamespaceFqsen) {
                $subPath = substr($entry, strlen($currentNamespaceFqsen));
            }
            $path = substr(str_replace("\\", "/", $subPath), 1);
            $this->addLine($entry->getName() . ' <' . $path . '>');
        }
        $this->unindent();
        $this->addLine()->addLine();

        $this->addH2('Classes');
        $this->addLine('.. toctree::');
        $this->indent();
        $this->addLine(':maxdepth: 1')->addLine();
        /** @var Fqsen $entry */
        foreach ($this->currentNamespace->getClasses() as $entry) {
            $subPath = $entry;
            if ($currentNamespaceFqsen !== '\\' && substr($entry, 0, strlen($currentNamespaceFqsen)) === $currentNamespaceFqsen) {
                $subPath = substr($entry, strlen($currentNamespaceFqsen));
            }
            $path = substr(str_replace("\\", "/", $subPath), 1);
            $this->addLine($entry->getName() . ' <' . $path . '>');
        }
        $this->unindent();
        $this->addLine()->addLine();

        $this->addH2('Functions');
        foreach ($this->currentNamespace->getFunctions() as $function) {
            $this->beginPhpDomain('function', $function->getName(). '()');
            $this->endPhpDomain('function');
        }


        // FIXME: add functions / constants


    }

}