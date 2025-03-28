<?php

namespace Unit;

class BooleanOperations
{
    public function isEven(int $number): bool
    {
        return $number % 2 === 0;
    }

    public function isOdd(int $number): bool
    {
        return $number % 2 !== 0;
    }

    public function getNonEmptyValue(?string $value): ?string
    {
        return empty($value) ? null : $value;
    }

    public function alwaysNull()
    {
        return null;
    }

    public function alwaysTrue(): bool
    {
        return true;
    }
}
