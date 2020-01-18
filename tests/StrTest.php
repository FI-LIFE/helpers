<?php
declare(strict_types=1);

namespace Neugen\Tests;

use Neugen\Helpers\Str;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testStartsWithReturnsCorrectBoolValues()
    {
        $this->assertEquals(true, Str::startsWith('This test string', 'This te'));
        $this->assertEquals(false, Str::startsWith('This test string', 'This error'));
    }

    public function testEndsWithReturnsCorrectBoolValues()
    {
        $this->assertEquals(true, Str::endsWith('This test string', 'string'));
        $this->assertEquals(false, Str::endsWith('This test string', 'strings'));
    }

    public function testUcFirstReturnsCorrectBoolValues()
    {
        $this->assertEquals('This test string', Str::ucFirst('this test string'));
    }
}
