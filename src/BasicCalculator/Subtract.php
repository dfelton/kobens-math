<?php

declare(strict_types=1);

namespace Kobens\Math\BasicCalculator;

/**
 * Performs bcsub operations with automatic scale detection.
 *
 * TODO: Verify strings
 */
final class Subtract
{
    private function __construct() { }

    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @return string
     */
    public static function getResult(string $leftOperand, string $rightOperand): string
    {
        $result = \bcsub($leftOperand, $rightOperand, self::getScale($leftOperand, $rightOperand));
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
        foreach ([$leftOperand, $rightOperand] as $value) {
            if (\strpos($value, '.') !== false) {
                $length = \strlen(\rtrim(\explode('.', $value)[1], '0'));
                if ($length > $precision) {
                    $precision = $length;
                }
            }
        }
        return $precision;
    }

}
