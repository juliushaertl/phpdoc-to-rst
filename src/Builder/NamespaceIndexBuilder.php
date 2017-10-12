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


use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Php\Constant;
use phpDocumentor\Reflection\Php\Argument;
use phpDocumentor\Reflection\Php\Function_;
use phpDocumentor\Reflection\Php\Namespace_;

/**
 * This class will build an index for each namespace.
 * It contains a toc for child namespaces, classes, traits, interfaces and functions
 *
 * @package JuliusHaertl\PHPDocToRst\Builder
 */
class NamespaceIndexBuilder extends PhpDomainBuilder {

    const RENDER_INDEX_NAMESPACE = 0;
    const RENDER_INDEX_CLASSES = 1;
    const RENDER_INDEX_TRAITS = 2;
    const RENDER_INDEX_INTERFACES = 3;
    const RENDER_INDEX_FUNCTIONS = 4;
    const RENDER_INDEX_CONSTANTS = 5;

    /** @var Namespace_ */
    private $currentNamespace;

    /** @var Namespace_[] */
    private $namespaces;

    /** @var Namespace_[] */
    private $childNamespaces = [];

    /** @var Function_[] */
    private $functions;

    /** @var Constant[] */
    private $constants;

    public function __construct($extensions, $namespaces, Namespace_ $current, $functions, $constants) {
        parent::__construct($extensions);
        $this->namespaces = $namespaces;
        $this->currentNamespace = $current;
        $this->functions = $functions;
        $this->constants = $constants;
        $this->findChildNamespaces();
    }

    /**
     * Find child namespaces for current namespace
     */
    private function findChildNamespaces() {
        $currentNamespaceFqsen = (string)$this->currentNamespace->getFqsen();
        /** @var Namespace_ $namespace */
        foreach ($this->namespaces as $namespace) {
            // check if not root and doesn't start with current namespace
            if ($currentNamespaceFqsen !== '\\' && strpos((string)$namespace->getFqsen(), $currentNamespaceFqsen . '\\') !== 0) {
                continue;
            }
            if ((string)$namespace->getFqsen() !== $currentNamespaceFqsen && strpos((string)$namespace->getFqsen(), $currentNamespaceFqsen) === 0) {
                // only keep first level children
                $childrenPath = substr((string)$namespace->getFqsen(), strlen((string)$this->currentNamespace->getFqsen()) + 1);
                if (strpos($childrenPath, '\\') === false) {
                    $this->childNamespaces[] = $namespace;
                }
            }
        }
    }

    public function render() {
        $currentNamespaceFqsen = (string)$this->currentNamespace->getFqsen();
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

        $this->addIndex(self::RENDER_INDEX_NAMESPACE);
        $this->addIndex(self::RENDER_INDEX_INTERFACES);
        $this->addIndex(self::RENDER_INDEX_CLASSES);
        $this->addIndex(self::RENDER_INDEX_TRAITS);

        if ($this->shouldRenderIndex(self::RENDER_INDEX_CONSTANTS)) {
            $this->addConstants($this->constants);
        }
        $this->addFunctions();
    }

    protected function addIndex($type) {
        if ($this->shouldRenderIndex($type)) {
            $this->addH2($this->getHeaderForType($type));
            $this->addLine('.. toctree::');
            $this->indent();
            $this->addLine(':maxdepth: 1')->addLine();
            /** @var Fqsen $entry */
            foreach ($this->getElementList($type) as $entry) {
                if (!$this->shouldRenderIndex($type, $entry)) {
                    continue;
                }
                if ($type === self::RENDER_INDEX_NAMESPACE) {
                    $this->addLine($entry->getName() . ' <' . $entry->getName() . '/index>');
                } else {
                    $this->addElementTocEntry($entry);
                }
            }
            $this->unindent();
            $this->addLine();
        }
    }

    private function addFunctions() {
        if (!$this->shouldRenderIndex(self::RENDER_INDEX_FUNCTIONS)) {
            return;
        }
        $this->addH2('Functions');
        /** @var Function_ $function */
        foreach ($this->functions as $function) {
            if (!$this->shouldRenderIndex(self::RENDER_INDEX_FUNCTIONS, $function)) {
                continue;
            }
            $docBlock = $function->getDocBlock();
            $params = [];
            if ($docBlock !== null) {
                /** @var Param $param */
                foreach ($docBlock->getTagsByName('param') as $param) {
                    $params[$param->getVariableName()] = $param;
                }
            }
            $args = '';
            /** @var Argument $argument */
            foreach ($function->getArguments() as $argument) {
                // TODO: defaults, types
                $args .= '$' . $argument->getName() . ', ';
            }
            $args = substr($args, 0, -2);
            $this->beginPhpDomain('function', $function->getName() . '(' . $args . ')');
            $this->addDocBlockDescription($function);
            if (!empty($params)) {
                foreach ($function->getArguments() as $argument) {
                    /** @var Param $param */
                    $param = $params[$argument->getName()];
                    if ($param !== null) {
                        $this->addMultiline(':param ' . self::escape($param->getType()) . ' $' . $argument->getName() . ': ' . $param->getDescription(), true);
                    }
                }
            }
            $this->endPhpDomain('function');
        }
    }

    private function addElementTocEntry(Fqsen $entry) {
        $currentNamespaceFqsen = (string)$this->currentNamespace->getFqsen();
        $subPath = $entry;
        if ($currentNamespaceFqsen !== '\\' && substr($entry, 0, strlen($currentNamespaceFqsen)) === $currentNamespaceFqsen) {
            $subPath = substr($entry, strlen($currentNamespaceFqsen));
        }
        $path = substr(str_replace('\\', '/', $subPath), 1);
        $this->addLine($entry->getName() . ' <' . $path . '>');
    }

    private function shouldRenderIndex($type, $element = null) {
        foreach ($this->extensions as $extension) {
            if (!$extension->shouldRenderIndex($type, $element)) {
                return false;
            }
        }
        if ($element === null) {
            return (count($this->getElementList($type)) > 0);
        }
        return true;
    }

    private function getHeaderForType($type) {
        $headers = [self::RENDER_INDEX_NAMESPACE => 'Namespaces', self::RENDER_INDEX_INTERFACES => 'Interfaces', self::RENDER_INDEX_CLASSES => 'Classes', self::RENDER_INDEX_TRAITS => 'Traits', self::RENDER_INDEX_FUNCTIONS => 'Functions', self::RENDER_INDEX_CONSTANTS => 'Constants'];
        return $headers[$type];
    }

    /**
     * @param int $type
     * @return array
     */
    private function getElementList($type) {
        $elements = [];
        switch ($type) {
            case self::RENDER_INDEX_NAMESPACE:
                $elements = $this->childNamespaces;
                break;
            case self::RENDER_INDEX_CLASSES:
                $elements = $this->currentNamespace->getClasses();
                break;
            case self::RENDER_INDEX_INTERFACES:
                $elements = $this->currentNamespace->getInterfaces();
                break;
            case self::RENDER_INDEX_TRAITS:
                $elements = $this->currentNamespace->getTraits();
                break;
            case self::RENDER_INDEX_FUNCTIONS:
                $elements = $this->functions;
                break;
            case self::RENDER_INDEX_CONSTANTS:
                $elements = $this->constants;
                break;
        }
        return $elements;
    }

}