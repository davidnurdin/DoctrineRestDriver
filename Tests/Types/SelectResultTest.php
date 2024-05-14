<?php
/**
 * This file is part of DoctrineRestDriver.
 *
 * DoctrineRestDriver is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DoctrineRestDriver is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DoctrineRestDriver.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Circle\DoctrineRestDriver\Tests\Types;

use Circle\DoctrineRestDriver\Types\SelectResult;
use PHPSQLParser\PHPSQLParser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

/**
 * Tests the select result type
 *
 * @author    Tobias Hauck <tobias@circle.ai>
 * @copyright 2015 TeeAge-Beatz UG
 *
 */
#[CoversClass(SelectResult::class)]
#[CoversMethod(SelectResult::class,'create')]
class SelectResultTest extends \PHPUnit\Framework\TestCase {

    /**
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    #[Test]
    #[Group('unit')]
    public function createSingle() {
        $query  = 'SELECT name FROM products WHERE id=1';
        $parser = new PHPSQLParser();
        $tokens = $parser->parse($query);

        $content = [
            'name' => 'username'
        ];

        $expected = [
            [
                'name' => 'username'
            ]
        ];

        $this->assertEquals($expected, SelectResult::create($tokens, $content));
    }

    /**
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    #[Test]
    #[Group('unit')]
    public function createAll() {
        $query  = 'SELECT name FROM products';
        $parser = new PHPSQLParser();
        $tokens = $parser->parse($query);

        $content = [
            [
                'name' => 'username'
            ],
            [
                'name' => 'anotherUser'
            ],
        ];

        $expected = [
            [
                'name' => 'username'
            ],
            [
                'name' => 'anotherUser'
            ],
        ];

        $this->assertEquals($expected, SelectResult::create($tokens, $content));
    }
}
