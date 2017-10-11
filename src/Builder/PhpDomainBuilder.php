<?php
/**
 * Created by PhpStorm.
 * User: jus
 * Date: 07.10.17
 * Time: 23:25
 */

namespace JuliusHaertl\PHPDocToRst\Builder;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\Php\Constant;
use phpDocumentor\Reflection\Php\Property;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;

class PhpDomainBuilder extends RstBuilder {

    protected function addConstant(Constant $constant) {
        $this->beginPhpDomain('const', $constant->getName() . ' = ' . $constant->getValue());
        $docBlock = $constant->getDocBlock();
        if ($docBlock) {
            foreach ($docBlock->getTags() as $tag) {
                $this->addDocblockTag( $tag->getName(), $docBlock);
            }
        }
        $this->endPhpDomain();
    }

    protected function addProperty(Property $property) {
        $this->beginPhpDomain('attr', $property->getName());
        $this->endPhpDomain();
    }
    public function getLink($type, $fqsen) {
        return ':php:' . $type . ':`' . RstBuilder::escape(substr($fqsen, 1)) . '`';
    }

    public function beginPhpDomain($type, $name, $indent=true) {
        // FIXME: Add checks if it is properly ended
        $this->addLine('.. php:' . $type . ':: '. $name)->addLine();
        if ($indent === true) {
            $this->indent();
        }
    }

    public function endPhpDomain($type='') {
        $this->unindent();
        $this->addLine();
    }

    /**
     * @param string $tag Name of the tag to parse
     * @param DocBlock $docBlock
     */
    protected function addDocblockTag($tag, DocBlock $docBlock) {
        $tags = $docBlock->getTagsByName($tag);
        switch ($tag) {
            case 'return':
                if (count($tags) === 0) continue;
                /** @var Return_ $return */
                $return = $tags[0];
                $this->addMultiline(':returns: ' . $return->getType() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'throws':
                if (count($tags) === 0) continue;
                /** @var Throws $return */
                $return = $tags[0];
                $this->addMultiline(':throws: ' . $return->getType() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'since':
                if (count($tags) === 0) continue;
                /** @var Since $return */
                $return = $tags[0];
                $this->addMultiline(':since: ' . $return->getVersion() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'deprecated':
                if (count($tags) === 0) continue;
                /** @var Deprecated $return */
                $return = $tags[0];
                $this->addMultiline(':deprecated: ' . $return->getVersion() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'see':
                if (count($tags) === 0) continue;
                /** @var See $return */
                $return = $tags[0];
                $this->addMultiline(':see: ' . $return->getReference() . ' ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'license':
                if (count($tags) === 0) continue;
                /** @var DocBlock\Tags\BaseTag $return */
                $return = $tags[0];
                $this->addMultiline(':license: ' . RstBuilder::escape($return->getDescription()), true);
                break;
            case 'param':
                // param handling is done by subclasses since it is more that docbook parsing
                break;
            default:
                //echo 'Tag handling not defined for: ' . $tag . PHP_EOL;
                break;
        }

    }

}