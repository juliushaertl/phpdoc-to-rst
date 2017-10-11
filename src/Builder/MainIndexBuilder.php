<?php
/**
 * Created by PhpStorm.
 * User: jus
 * Date: 06.10.17
 * Time: 03:05
 */

namespace JuliusHaertl\PHPDocToRst\Builder;


use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Namespace_;

class MainIndexBuilder extends RstBuilder {

    /** @var Namespace_[] */
    private $namespaces;

    public function __construct($namespaces) {
        $this->namespaces = $namespaces;
    }

    public function render() {
        $label = 'root-namespace';
        $this->addLine('.. _namespaces:')->addLine();
        $this->addH1(RstBuilder::escape('Namespaces'));

        $this->addLine('.. toctree::');
        $this->indent();
        $this->addLine(':maxdepth: 1')->addLine();
        foreach ($this->namespaces as $namespace) {
            $namespaceString = (string)$namespace->getFqsen();
            $subPath = $namespaceString;
            $path = substr(str_replace("\\", "/", $subPath), 1) . '/index';
            if ($namespaceString === '\\') {
                $path = 'index';
            }
            $this->addLine($namespace->getFqsen() . ' <' . $path . '>');
        }
        $this->addLine();
        $this->addLine();

    }
}