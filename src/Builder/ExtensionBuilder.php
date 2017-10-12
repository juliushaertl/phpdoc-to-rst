<?php
/**
 * Created by PhpStorm.
 * User: jus
 * Date: 11.10.17
 * Time: 23:02
 */

namespace JuliusHaertl\PHPDocToRst\Builder;

use JuliusHaertl\PHPDocToRst\Extension\Extension;

trait ExtensionBuilder {

    /** @var Extension[] */
    protected $extensions;

    public function __construct($extensions) {
        $this->extensions = $extensions;
    }

    protected function callExtensions($type, $element) {
        foreach ($this->extensions as $extension) {
            $extension->render($type, $this, $element);
        }
    }
}