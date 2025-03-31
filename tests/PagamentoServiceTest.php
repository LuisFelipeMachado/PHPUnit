<?php

use PHPUnit\Framework\TestCase;
use App\PagamentoService;

require_once __DIR__ . '/../src/PagamentoService.php';

class PagamentoServiceTest extends TestCase
{
    private PagamentoService $service;

    protected function setUp(): void
    {
        $this->service = new PagamentoService();
    }

    public function testPagamentoSemDesconto()
    {
        $resultado = $this->service->processarPagamento(50);
        $this->assertEquals(50, $resultado);
    }

    public function testPagamentoComDesconto()
    {
        $resultado = $this->service->processarPagamento(200);
        $this->assertEquals(180, $resultado); // 10% de desconto
    }

    public function testPagamentoZero()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->service->processarPagamento(0);
    }

    public function testPagamentoNegativo()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->service->processarPagamento(-10);
    }
}
