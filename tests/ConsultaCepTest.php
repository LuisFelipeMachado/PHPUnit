<?php

use PHPUnit\Framework\TestCase;
use App\ConsultaCep;

require_once __DIR__ . '/../src/ConsultaCep.php';

class ConsultaCepTest extends TestCase
{
    public function testCepValido()
    {
        $mock = $this->getMockBuilder(ConsultaCep::class)
                     ->onlyMethods(['buscar'])
                     ->getMock();

        $mock->method('buscar')->willReturn([
            'cep' => '01001-000',
            'logradouro' => 'Praça da Sé',
            'bairro' => 'Sé',
            'localidade' => 'São Paulo'
        ]);

        $resultado = $mock->buscar('01001-000');

        $this->assertNotNull($resultado);
        $this->assertEquals('Praça da Sé', $resultado['logradouro']);
    }

    public function testCepInvalido()
    {
        $mock = $this->getMockBuilder(ConsultaCep::class)
                     ->onlyMethods(['buscar'])
                     ->getMock();

        $mock->method('buscar')->willReturn(null);

        $resultado = $mock->buscar('00000-000');

        $this->assertNull($resultado);
    }
}
