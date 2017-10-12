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

/**
 * Helper class to build reStructuredText files
 *
 * @package JuliusHaertl\PHPDocToRst\Builder
 */
class RstBuilder {

    private $indentLevel = 0;
    /** @var string */
    protected $content = '.. rst-class:: phpdoctorst' . PHP_EOL . PHP_EOL ;

    public function getContent() {
        return $this->content;
    }

    public static function escape($text) {
        // escape all common reStructuredText control chars
        $text = preg_replace("/[\'\`\*\_\{\}\[\]\(\)\>\#\+\-\.\\\!]/", '\\\\$0', $text);
        return $text;
    }

    public function indent() {
        $this->indentLevel++;
        return $this;
    }

    public function unindent() {
        $this->indentLevel--;
        $this->addLine();
        return $this;
    }

    public function addFieldList($key, $value) {
        $this->addLine(':'.self::escape($key).':');
        $this->indent()->addMultiline($value, true)->unindent();
        return $this;
    }

    public function addH1($text) {
        $this->addLine($text);
        $this->addLine(str_repeat('=', strlen((string)$text)))->addLine();
        return $this;
    }

    public function addH2($text) {
        $this->addLine($text);
        $this->addLine(str_repeat('-', strlen((string)$text)))->addLine();
        return $this;
    }

    public function addH3($text) {
        $this->addLine($text);
        $this->addLine(str_repeat('~', strlen((string)$text)))->addLine();
        return $this;
    }

    public function addLine($text = '') {
        $this->add(str_repeat("\t", $this->indentLevel) . $text . PHP_EOL);
        return $this;
    }

    public function addMultiline($text = '', $blockIndent = false) {
        $lines = preg_split('/$\R?^/m', $text);
        $i = 0;
        foreach ($lines as $line) {
            if ($blockIndent && $i++ === 1) {
                $this->indent();
            }
            $this->addLine($line);
        }
        if ($blockIndent && count($lines) > 1) {
            $this->unindent();
        }
        return $this;
    }

    public function add($text) {
        $this->content .= $text;
        return $this;
    }


}