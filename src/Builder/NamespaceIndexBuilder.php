<?php
/**
 * Created by PhpStorm.
 * User: jus
 * Date: 06.10.17
 * Time: 03:05
 */

namespace JuliusHaertl\PHPDocToRst\Builder;


use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Php\Namespace_;

class NamespaceIndexBuilder extends PhpDomainBuilder {

    /** @var Namespace_ */
    private $currentNamespace;
    /** @var Namespace_[] */
    private $namespaces;
    public function __construct($namespaces, Namespace_ $current) {
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
            $this->addH1(RstBuilder::escape($currentNamespaceFqsen));
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