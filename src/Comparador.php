<?php

namespace App;

class Comparador
{
    public function somar(int $a, int $b): int
    {
        return $a + $b;
    }

    public function valorComTipo($valor)
    {
        return $valor;
    }

    public function obterMaior(int $a, int $b): int
    {
        return $a > $b ? $a : $b;
    }

    public function obterMenor(int $a, int $b): int
    {
        return $a < $b ? $a : $b;
    }
}
