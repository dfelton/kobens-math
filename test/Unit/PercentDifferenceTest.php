<?php

namespace KobensTest\Math;

use Kobens\Math\PercentDifference;
use PHPUnit\Framework\TestCase;

final class PercentDifferenceTest extends TestCase
{
    public function testConstructorIsPrivate(): void
    {
        $reflection = new \ReflectionClass(PercentDifference::class);
        $this->assertTrue($reflection->getConstructor()->isPrivate());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(PercentDifference::class);
        $this->assertTrue($reflection->isFinal());
    }

    public function testGetResult(): void
    {
        $this->assertEquals('-100',  PercentDifference::getResult('100',  '0'));
        $this->assertEquals('-50',   PercentDifference::getResult('100',  '50'));
        $this->assertEquals('50',    PercentDifference::getResult('100',  '150'));
        $this->assertEquals('0',     PercentDifference::getResult('100',  '100'));
        $this->assertEquals('-1',    PercentDifference::getResult('100',  '99'));
        $this->assertEquals('1',     PercentDifference::getResult('100',  '101'));
        $this->assertEquals('100',   PercentDifference::getResult('.5',   '1'));
        $this->assertEquals('200',   PercentDifference::getResult('.5',   '1.5'));
        $this->assertEquals('-2.56', PercentDifference::getResult('123',  '119.8512', 2));
    }

    public function testNegativeScaleThrowsLogicException(): void
    {
        $this->expectException(\LogicException::class);
        PercentDifference::getResult('1', '1', -1);
    }

    public function testNegativeOriginalValueThrowsLogicException(): void
    {
        $this->expectException(\LogicException::class);
        PercentDifference::getResult('-1', '1');
    }

    public function testNegativeNewValueThrowsLogicException(): void
    {
        $this->expectException(\LogicException::class);
        PercentDifference::getResult('1', '-1');
    }
}
