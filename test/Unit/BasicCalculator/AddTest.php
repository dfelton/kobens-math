<?php

namespace KobensTest\Math\Unit\BasicCalculator;

use Kobens\Math\BasicCalculator\Add;
use PHPUnit\Framework\TestCase;

final class AddTest extends TestCase
{
    public function testConstructorIsPrivate(): void
    {
        $reflection = new \ReflectionClass(Add::class);
        $this->assertTrue($reflection->getConstructor()->isPrivate());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(Add::class);
        $this->assertTrue($reflection->isFinal());
    }

    public function testGetResult(): void
    {
        $this->assertEquals('0.12345', Add::getResult('0.123', '0.00045'));
        $this->assertEquals('0.03',    Add::getResult('0.01',  '0.02'));
        $this->assertEquals('1',       Add::getResult('1',     '0.000'));
        $this->assertEquals('1.10203', Add::getResult('1',     '0.102030'));
        $this->assertEquals('1',       Add::getResult('0.3',   '0.7'));
    }

    public function testGetScale(): void
    {
        $this->assertEquals(0, Add::getScale('1',       '100'));
        $this->assertEquals(0, Add::getScale('0.00000', '2'));
        $this->assertEquals(4, Add::getScale('0.1234',  '10'));
        $this->assertEquals(2, Add::getScale('0.02',    '0.01'));
    }
}
