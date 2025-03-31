<?php

namespace App;

class PagamentoService
{
    public function processarPagamento(float $valor): float
    {
        if ($valor <= 0) {
            throw new \InvalidArgumentException("Valor deve ser maior que zero");
        }

        if ($valor > 100) {
            return $valor * 0.9; // 10% de desconto
        }

        return $valor;
    }
}
