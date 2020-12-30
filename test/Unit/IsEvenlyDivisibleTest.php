<?php

declare(strict_types=1);

namespace KobensTest\Math;

use Kobens\Math\IsEvenlyDivisible;
use PHPUnit\Framework\TestCase;

final class IsEvenlyDivisibleTest extends TestCase
{
    public function testConstructorIsPrivate(): void
    {
        $reflection = new \ReflectionClass(IsEvenlyDivisible::class);
        $this->assertTrue($reflection->getConstructor()->isPrivate());
    }

    public function testGetResultReturnsTrue(): void
    {
        $this->assertTrue(IsEvenlyDivisible::getResult('1', '1'));
        $this->assertTrue(IsEvenlyDivisible::getResult('0', '1'));
        $this->assertTrue(IsEvenlyDivisible::getResult('4', '2'));
        $this->assertTrue(IsEvenlyDivisible::getResult('1', '0.00001'));
        $this->assertTrue(IsEvenlyDivisible::getResult('2', '2'));
        $this->assertTrue(IsEvenlyDivisible::getResult('0.6', '0.002'));
        $this->assertTrue(IsEvenlyDivisible::getResult('123', '0.123'));
    }

    public function testGetResultReturnsFalse(): void
    {
        $this->assertFalse(IsEvenlyDivisible::getResult('3', '2'));
        $this->assertFalse(IsEvenlyDivisible::getResult('0.5', '0.2'));
        $this->assertFalse(IsEvenlyDivisible::getResult('124', '0.123'));
    }
}
