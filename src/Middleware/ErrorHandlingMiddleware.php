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
namespace JuliusHaertl\PHPDocToRst\Middleware;

use JuliusHaertl\PHPDocToRst\ApiDocBuilder;
use phpDocumentor\Reflection\Middleware\Middleware;
use phpDocumentor\Reflection\Php\Factory\File\CreateCommand;

/**
 * Class ErrorHandlingMiddleware
 * @ignore
 */
final class ErrorHandlingMiddleware implements Middleware
{

    private $apiDocBuilder;

    public function __construct(ApiDocBuilder $apiDocBuilder) {
        $this->apiDocBuilder = $apiDocBuilder;
    }

    /**
     * Executes this middleware class.
     *
     * @param CreateCommand $command
     * @param callable $next
     * @return object
     */
    public function execute($command, callable $next)
    {
        $filename = $command->getFile()->path();
        $this->apiDocBuilder->debug('Starting to parse file: ' . $filename);
        try {
            return $next($command);
        } catch (\Exception $e) {
            $this->apiDocBuilder->log('Unable to parse file "' . $filename . '", ' . $e->getMessage());
        }
        return null;
    }
}