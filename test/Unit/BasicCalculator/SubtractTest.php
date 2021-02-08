<?php

declare(strict_types=1);

namespace KobensTest\Math\Unit\BasicCalculator;

use Kobens\Math\BasicCalculator\Subtract;
use PHPUnit\Framework\TestCase;

final class SubtractTest extends TestCase
{
    public function testConstructorIsPrivate(): void
    {
        $reflection = new \ReflectionClass(Subtract::class);
        $this->assertTrue($reflection->getConstructor()->isPrivate());
    }

    public function testClassIsFinal(): void
    {
        $reflection = new \ReflectionClass(Subtract::class);
        $this->assertTrue($reflection->isFinal());
    }

    public function testGetScale(): void
    {
        $this->assertEquals(0, Subtract::getScale('1',       '100'));
        $this->assertEquals(0, Subtract::getScale('0.00000', '2'));
        $this->assertEquals(4, Subtract::getScale('0.1234',  '10'));
        $this->assertEquals(2, Subtract::getScale('0.02',    '0.01'));
    }

    public function testGetResult(): void
    {
        $this->assertEquals('1',   Subtract::getResult('2.5', '1.5'));
        $this->assertEquals('-1',  Subtract::getResult('1',   '2'));
        $this->assertEquals('3',   Subtract::getResult('1',   '-2'));
        $this->assertEquals('0',   Subtract::getResult('0',   '0'));
        $this->assertEquals('1.5', Subtract::getResult('2',   '.5'));
    }
}
