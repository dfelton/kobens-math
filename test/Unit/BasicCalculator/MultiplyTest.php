<?php

namespace KobensTest\Math\Unit\BasicCalculator;

use Kobens\Math\BasicCalculator\Multiply;
use PHPUnit\Framework\TestCase;

final class MultiplyTest extends TestCase
{
    public function testConstructorIsPrivate(): void
    {
        $reflection = new \ReflectionClass(Multiply::class);
        $this->assertTrue($reflection->getConstructor()->isPrivate());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(Multiply::class);
        $this->assertTrue($reflection->isFinal());
    }

    public function testGetScale(): void
    {
        $this->assertEquals(0,  Multiply::getScale('1.000',   '0.00000'));
        $this->assertEquals(10, Multiply::getScale('1.12345', '1.12345'));
        $this->assertEquals(3,  Multiply::getScale('1.001',   '1'));
        $this->assertEquals(1,  Multiply::getScale('1.0',     '1.20'));
    }

    public function testGetResult(): void
    {
        $this->assertEquals('1', Multiply::getResult('1.0', '1'));
        $this->assertEquals('2', Multiply::getResult('2.0', '1'));
        $this->assertEquals(
            '12.1932631112635269',
            Multiply::getResult('9.87654321', '1.234567890')
        );
        $this->assertEquals(
            '28951.2572128656',
            Multiply::getResult('234.928374', '00123.2344')
        );
    }
}
