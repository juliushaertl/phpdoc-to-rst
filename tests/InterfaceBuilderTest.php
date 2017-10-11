<?php
/**
 * Created by PhpStorm.
 * User: jus
 * Date: 06.10.17
 * Time: 00:55
 */

namespace JuliusHaertl\PHPDocToRst\Test;

use JuliusHaertl\PHPDocToRst\Builder\InterfaceFileBuilder;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Php\File;
use PHPUnit\Framework\TestCase;

class InterfaceBuilderTest extends TestCase {

    public function testFoobar() {
        $file = $this->getMockBuilder(File::class);
        $element = $this->getMockBuilder(Element::class);
    }
}