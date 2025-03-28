<?php

namespace Unit\Tests;

use PHPUnit\Framework\TestCase;
use Unit\BooleanOperations;

class BooleanOperationsTest extends TestCase
{
    private $booleanOperations;

    protected function setUp(): void
    {
        $this->booleanOperations = new BooleanOperations();
    }

    public function testIsEven()
    {
        $this->assertTrue($this->booleanOperations->isEven(2));
        $this->assertFalse($this->booleanOperations->isEven(3));
    }

    public function testIsOdd()
    {
        $this->assertTrue($this->booleanOperations->isOdd(3));
        $this->assertFalse($this->booleanOperations->isOdd(2));
    }

    public function testGetNonEmptyValue()
    {
        $this->assertEquals('Test', $this->booleanOperations->getNonEmptyValue('Test'));
        $this->assertNull($this->booleanOperations->getNonEmptyValue(''));
    }

    public function testAlwaysNull()
    {
        $this->assertNull($this->booleanOperations->alwaysNull());
    }

    public function testAlwaysTrue()
    {
        $this->assertTrue($this->booleanOperations->alwaysTrue());
    }
}
