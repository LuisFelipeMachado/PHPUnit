<?php
namespace Unit\Testes;

use PHPUnit\Framework\TestCase;
use Unit\ManipularDados;

class ManipularDadosTest extends TestCase
{
    private ManipularDados $manipularDados;

    protected function setUp(): void
    {
        $this->manipularDados = new ManipularDados();
    }

    public function testCriarArquivo()
    {
        $nomeArquivo = 'teste.txt';
        $conteudo = 'Este é um teste!';

        $resultado = $this->manipularDados->criarArquivo($nomeArquivo, $conteudo);

        $this->assertTrue($resultado);
        $this->assertFileExists($nomeArquivo);
        $this->assertEquals($conteudo, file_get_contents($nomeArquivo));


        unlink($nomeArquivo);
    }

    public function testLerArquivo()
    {
        $nomeArquivo = 'teste.txt';
        $conteudo = 'Conteúdo para leitura!';
        $this->manipularDados->criarArquivo($nomeArquivo, $conteudo);

        $resultado = $this->manipularDados->lerArquivo($nomeArquivo);

        $this->assertEquals($conteudo, $resultado);


        unlink($nomeArquivo);
    }

    public function testAdicionarAoArquivo()
    {
        $nomeArquivo = 'teste.txt';
        $conteudoOriginal = 'Conteúdo original';
        $conteudoAdicional = ' - Conteúdo adicional';

        $this->manipularDados->criarArquivo($nomeArquivo, $conteudoOriginal);
        $this->manipularDados->adicionarAoArquivo($nomeArquivo, $conteudoAdicional);

        $resultado = file_get_contents($nomeArquivo);

        $this->assertEquals($conteudoOriginal . $conteudoAdicional, $resultado);

        unlink($nomeArquivo);
    }

    public function testExcluirArquivo()
    {
        $nomeArquivo = 'teste.txt';
        $conteudo = 'Conteúdo para exclusão';
        $this->manipularDados->criarArquivo($nomeArquivo, $conteudo);

        $resultado = $this->manipularDados->excluirArquivo($nomeArquivo);

        $this->assertTrue($resultado);
        $this->assertFileDoesNotExist($nomeArquivo);
    }
}
