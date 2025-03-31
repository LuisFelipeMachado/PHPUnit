<?php
declare(strict_types=1);

namespace Unit;

class CalculadoraFatorial
{
    /**
     * Calcula o fatorial de um número inteiro não negativo
     * 
     * @param int $numero Número para calcular o fatorial
     * @return int Resultado do fatorial
     * @throws InvalidArgumentException Se o número for negativo
     */

     #Calculo Fatorial com Invalid Número Negativo
    public function calcular(int $numero): int
    {
        if ($numero < 0) {
            throw new \InvalidArgumentException("Não existe fatorial de número negativo");
        }

        if ($numero === 0 || $numero === 1) {
            return 1;
        }

        $resultado = 1;
        for ($i = 2; $i <= $numero; $i++) {
            $resultado *= $i;
        }

        return $resultado;
    }
}