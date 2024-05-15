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

use Circle\DoctrineRestDriver\Types\Format;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

/**
 * Tests the format type
 *
 * @author    Tobias Hauck <tobias@circle.ai>
 * @copyright 2015 TeeAge-Beatz UG
 *
 */
#[CoversClass(Format::class)]
#[CoversMethod(Format::class,'create')]
#[CoversMethod(Format::class,'assert')]
class FormatTest extends \PHPUnit\Framework\TestCase {

    /**
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    #[Test]
    #[Group('unit')]
    public function create() {
        $this->assertInstanceOf('Circle\DoctrineRestDriver\Formatters\Formatter', Format::create([]));
    }

    /**
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    #[Test]
    #[Group('unit')]
    public function createWithOptions() {
        $this->assertInstanceOf('Circle\DoctrineRestDriver\Formatters\Json', Format::create(['driverOptions' => ['format' => 'json']]));
    }

    /**
     *
     * @SuppressWarnings("PHPMD.StaticAccess")
     */
    #[Test]
    #[Group('unit')]
    public function assert() {
        $formatter = $this->getMockBuilder('Circle\DoctrineRestDriver\Formatters\Formatter')->getMock();
        $this->assertSame($formatter, Format::assert($formatter));
    }
}
