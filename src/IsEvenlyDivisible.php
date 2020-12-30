<?php

declare(strict_types=1);

namespace Kobens\Math;

use Kobens\Math\BasicCalculator\Compare;

final class IsEvenlyDivisible
{
    private function __construct()
    {

    }

    public static function getResult(string $leftOperand, string $rightOperand): bool
    {
        if (Compare::getResult('0', $rightOperand) === Compare::EQUAL) {
            throw new \InvalidArgumentException('Cannot divide by zero.');
        }

        $leftOperandPadding = strpos($leftOperand, '.') !== false
            ? strlen(explode('.', $leftOperand)[1])
            : 0;
        $rightOperandPadding = strpos($rightOperand, '.') !== false
            ? strlen(explode('.', $rightOperand)[1])
            : 0;

        if ($rightOperandPadding > $leftOperandPadding) {
            $multiplier = $rightOperandPadding - $leftOperandPadding;
            $intRightOperand = (int) str_replace('.', '', $rightOperand);
            $intLeftOperand = (int) (str_replace('.', '', $leftOperand) . str_repeat('0', $multiplier));
        } else {
            $multiplier = $leftOperandPadding - $rightOperandPadding;
            $intRightOperand = (int) (str_replace('.', '', $rightOperand) . str_repeat('0', $multiplier));
            $intLeftOperand = (int) str_replace('.', '', $leftOperand);
        }

        return $intLeftOperand % $intRightOperand === 0;
    }
}
