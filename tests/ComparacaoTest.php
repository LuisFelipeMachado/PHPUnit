<?php

use PHPUnit\Framework\TestCase;
use App\Comparador;

require_once __DIR__ . '/../src/Comparador.php';

class ComparacaoTest extends TestCase
{
    private Comparador $comparador;

    protected function setUp(): void
    {
        $this->comparador = new Comparador();
    }

    public function testSomaEhIgual()
    {
        $resultado = $this->comparador->somar(10, 5);
        $this->assertEquals(15, $resultado);  
    }

    public function testValorEhIdentico()
    {
        $resultado = $this->comparador->valorComTipo('123');
        $this->assertSame('123', $resultado);  
    }

    public function testValoresSaoDiferentes()
    {
        $resultado = $this->comparador->somar(10, 2);
        $this->assertNotEquals(20, $resultado);  
    }

    public function testValoresNaoSaoIdenticos()
    {
        $resultado = $this->comparador->valorComTipo(123);
        $this->assertNotSame('123', $resultado); 
    }

    public function testMaiorQue()
    {
        $resultado = $this->comparador->obterMaior(10, 5);
        $this->assertGreaterThan(5, $resultado); 
    }

    public function testMaiorOuIgual()
    {
        $resultado = $this->comparador->obterMaior(10, 10);
        $this->assertGreaterThanOrEqual(10, $resultado);
    }

    public function testMenorQue()
    {
        $resultado = $this->comparador->obterMenor(5, 10);
        $this->assertLessThan(10, $resultado);
    }

    public function testMenorOuIgual()
    {
        $resultado = $this->comparador->obterMenor(10, 10);
        $this->assertLessThanOrEqual(10, $resultado);
    }
}
