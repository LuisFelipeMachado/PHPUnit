<?php
namespace Unit\Testes;

use PHPUnit\Framework\TestCase;
use Unit\CalculadoraFatorial;

class CalculadoraFatorialTest extends TestCase
{
    private CalculadoraFatorial $calculadora;

    protected function setUp(): void
    {
        $this->calculadora = new CalculadoraFatorial();
    }

    public function testFatorialDeZero()
    {
        $this->assertEquals(1, $this->calculadora->calcular(0));
    }

    public function testFatorialDeUm()
    {
        $this->assertEquals(1, $this->calculadora->calcular(1));
    }

    public function testFatorialDeCinco()
    {
        $this->assertEquals(120, $this->calculadora->calcular(5));
    }

    public function testFatorialDeDez()
    {
        $this->assertEquals(3628800, $this->calculadora->calcular(10));
    }

    public function testNumeroNegativoLancaExcecao()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Não existe fatorial de número negativo");
        $this->calculadora->calcular(-5);
    }
}