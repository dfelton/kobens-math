<?php

declare(strict_types=1);

namespace Kobens\Math\BasicCalculator;

/**
 * Performs bccomp operations with automatic scale detection.
 *
 *
 * TODO: Verify strings
 */
final class Compare
{
    const EQUAL              =  0;
    const LEFT_GREATER_THAN  =  1;
    const LEFT_LESS_THAN     = -1;
    const RIGHT_LESS_THAN    = self::LEFT_GREATER_THAN;
    const RIGHT_GREATER_THAN = self::LEFT_LESS_THAN;

    private function __construct() { }

    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @return string
     */
    public static function getResult(string $leftOperand, string $rightOperand): int
    {
        return \bccomp($leftOperand, $rightOperand, self::getPrecision($leftOperand, $rightOperand));
    }

    /**
     * @param string $leftOperand
     * @param string $rightOperand
     * @return int
     */
    public static function getPrecision(string $leftOperand, string $rightOperand): int
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
