<?php

namespace Kobens\Math\BasicCalculator;

/**
 * Because division can yield irrational numbers, there
 * is no automatic precision (scale) detection for Divide.
 *
 * TODO: Verify strings
 * TODO: Verify divisor is not zero
 */
final class Divide
{
    private function __construct() { }

    public static function getResult(string $dividend, string $divisor, int $scale): string
    {
        $result = \bcdiv($dividend, $divisor, $scale);
        if (\strpos($result, '.') !== false) {
            $result = \rtrim(\rtrim($result, '0'), '.');
        }
        return $result;
    }

}
