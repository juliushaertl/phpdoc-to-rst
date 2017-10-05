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


class RstBuilder {

    /** @var string */
    protected $content;

    public function getContent() {
        return $this->content;
    }

    public function addH1($text) {
        $this->add($text . PHP_EOL);
        $this->add(str_repeat('=', strlen((string)$text)) . PHP_EOL);
        return $this;
    }

    public function addH2($text) {
        $this->add($text . PHP_EOL);
        $this->add(str_repeat('-', strlen((string)$text)) . PHP_EOL);
        return $this;
    }

    public function addLine($text = '') {
        $this->add($text . PHP_EOL);
        return $this;
    }

    public function addIndentLine($indent, $text) {
        $this->add(str_repeat("\t", $indent) . $text . PHP_EOL);
        return $this;
    }

    public function addIndentMultiline($indent, $text, $blockIndent = false) {
        // parse <code> / {@link seeMethod} / {@link https://}
        $lines = preg_split('/$\R?^/m', $text);
        $i = 0;
        foreach ($lines as $line) {
            if ($blockIndent && $i === 1) {
                $indent++;
            }
            $this->addIndentLine($indent, $line);
            $i++;
        }
        return $this;
    }

    public function add($text) {
        $this->content .= $text;
        return $this;
    }

}