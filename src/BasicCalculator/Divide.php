<?php

declare(strict_types=1);

namespace Kobens\Math\BasicCalculator;

/**
 * Because division can yield irrational numbers, there
 * is no automatic precision (scale) detection for Divide.
 *
 * TODO: Verify strings
 */
final class Divide
{
    private function __construct() { }

    public static function getResult(string $dividend, string $divisor, int $scale): string
    {
        if (Compare::getResult($divisor, '0') === Compare::EQUAL) {
            throw new \InvalidArgumentException('Cannot divide by zero.');
        }
        $result = \bcdiv($dividend, $divisor, $scale);
        if (\strpos($result, '.') !== false) {
            $result = \rtrim(\rtrim($result, '0'), '.');
        }
        return $result;
    }
}
