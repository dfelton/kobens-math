<?php

declare(strict_types=1);

namespace Kobens\Math\BasicCalculator;

final class Multiply
{
    private function __construct() { }

    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @return string
     */
    public static function getResult(string $leftOperand, string $rightOperand): string
    {
        $result = \bcmul($leftOperand, $rightOperand, self::getScale($leftOperand, $rightOperand));
        if (\strpos($result, '.') !== false) {
            $result = \rtrim(\rtrim($result, '0'), '.');
        }
        return $result;
    }

    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @return int
     */
    public static function getScale(string $leftOperand, string $rightOperand): int
    {
        $precision = 0;
        if (\strpos($leftOperand, '.') !== false) {
            $precision += \strlen(\rtrim(\explode('.', $leftOperand)[1], '0'));
        }
        if (\strpos($rightOperand, '.') !== false) {
            $precision += \strlen(\rtrim(\explode('.', $rightOperand)[1], '0'));
        }
        return $precision;
    }
}
