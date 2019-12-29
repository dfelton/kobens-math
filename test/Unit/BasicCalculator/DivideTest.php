<?php

namespace KobensTest\Math\Unit\BasicCalculator;

use Kobens\Math\BasicCalculator\Divide;
use PHPUnit\Framework\TestCase;

final class DivideTest extends TestCase
{
    public function testConstructorIsPrivate(): void
    {
        $reflection = new \ReflectionClass(Divide::class);
        $this->assertTrue($reflection->getConstructor()->isPrivate());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(Divide::class);
        $this->assertTrue($reflection->isFinal());
    }

    public function testGetResult(): void
    {
        $this->assertEquals('2',     Divide::getResult('4',   '2', 0));
        $this->assertEquals('2',     Divide::getResult('4',   '2', 1));
        $this->assertEquals('2',     Divide::getResult('4.1', '2', 0));
        $this->assertEquals('33',    Divide::getResult('100', '3', 0));
        $this->assertEquals('33.3',  Divide::getResult('100', '3', 1));
        $this->assertEquals('33.33', Divide::getResult('100', '3', 2));
    }
}
