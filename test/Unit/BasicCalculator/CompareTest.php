<?php

namespace KobensTest\Math\Unit\BasicCalculator;

use Kobens\Math\BasicCalculator\Compare;
use PHPUnit\Framework\TestCase;

final class CompareTest extends TestCase
{
    public function testConstructorIsPrivate(): void
    {
        $reflection = new \ReflectionClass(Compare::class);
        $this->assertTrue($reflection->getConstructor()->isPrivate());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(Compare::class);
        $this->assertTrue($reflection->isFinal());
    }

    public function testRightGreaterThanEqualsLeftLessThan(): void
    {
        $this->assertEquals(Compare::LEFT_LESS_THAN, Compare::RIGHT_GREATER_THAN);
    }

    public function testRightLessThanEqualsLeftGreaterThan(): void
    {
        $this->assertEquals(Compare::LEFT_GREATER_THAN, Compare::RIGHT_LESS_THAN);
    }

    public function testEqualIsZero(): void
    {
        $this->assertEquals(0, Compare::EQUAL);
    }

    public function testLeftGreaterThanEqualsOne(): void
    {
        $this->assertEquals(1, Compare::LEFT_GREATER_THAN);
    }

    public function testLeftLessThanEqualsNegativeOne(): void
    {
        $this->assertEquals(-1, Compare::LEFT_LESS_THAN);
    }

    public function testGetPrecision(): void
    {
        $this->assertEquals(0, Compare::getPrecision('123',     '1'));
        $this->assertEquals(1, Compare::getPrecision('123.1',   '1'));
        $this->assertEquals(1, Compare::getPrecision('123.4',   '1.2'));
        $this->assertEquals(3, Compare::getPrecision('0.001',   '1'));
        $this->assertEquals(0, Compare::getPrecision('1.000',   '0.000'));
        $this->assertEquals(5, Compare::getPrecision('0.12345', '1'));
    }

    public function testGetResult(): void
    {
        $this->assertEquals(0,  Compare::getResult('0',      '0'));
        $this->assertEquals(0,  Compare::getResult('1.234',  '1.234'));
        $this->assertEquals(1,  Compare::getResult('1',      '-1'));
        $this->assertEquals(1,  Compare::getResult('1',      '0.9999'));
        $this->assertEquals(1,  Compare::getResult('0.001',  '0.0009'));
        $this->assertEquals(-1, Compare::getResult('-2',     '1'));
        $this->assertEquals(-1, Compare::getResult('0.9999', '1'));
        $this->assertEquals(-1, Compare::getResult('0.0009', '0.001'));
    }
}
