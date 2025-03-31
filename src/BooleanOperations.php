<?php

namespace Unit;

class BooleanOperations
{
    #Verfica se o numero é impar
    public function isEven(int $number): bool
    {
        return $number % 2 === 0;
    }
    
    #Verifica se o Numero é Impar
    public function isOdd(int $number): bool
    {
        return $number % 2 !== 0;
    }

    #Retorna o valor passado, caso não seja vazio, se for retorna null
    public function getNonEmptyValue(?string $value): ?string
    {
        return empty($value) ? null : $value;
    }

    #Sempre Retorna Null
    public function alwaysNull()
    {
        return null;
    }

    #Sempre retorna True
    public function alwaysTrue(): bool
    {
        return true;
    }
}
