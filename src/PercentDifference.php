<?php

declare(strict_types=1);

namespace Kobens\Math;

use Kobens\Math\BasicCalculator\Compare;
use Kobens\Math\BasicCalculator\Divide;
use Kobens\Math\BasicCalculator\Multiply;
use Kobens\Math\BasicCalculator\Subtract;

final class PercentDifference
{
    private function __construct() { }

    public static function getResult(string $origValue, string $newValue, int $scale = 0)
    {
        switch (true) {
            case $scale < 0:
                throw new \LogicException('Scale must be greater than or equal to zero.');
            case \in_array(Compare::getResult($origValue, '0'), [Compare::EQUAL, Compare::LEFT_LESS_THAN]):
                throw new \LogicException('Original value must be greater than zero.');
            case Compare::getResult($newValue, '0') === Compare::LEFT_LESS_THAN:
                throw new \LogicException('New value must be greater than or equal to zero.');
        }
        if (Compare::getResult($newValue, '0') === Compare::EQUAL) {
            $result = '-100';
        } else {
            $absDiff = Subtract::getResult($newValue, $origValue);
            $result = Divide::getResult($absDiff, $origValue, $scale + 2);
            $result = Multiply::getResult($result, '100');
        }
        return $result;
    }
}