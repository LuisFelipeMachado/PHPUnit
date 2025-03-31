<?php

namespace Unit\Tests;

use PHPUnit\Framework\TestCase;
use Unit\Autenticacao;

class AutenticacaoTest extends TestCase
{
    private $auth;

    #Criação da instância da classe Autenticacao antes de cada teste
    protected function setUp(): void
    {
        $this->auth = new Autenticacao();
    }

    #Testa o registro de um usuário com sucesso
    public function testRegistrarUsuarioComSucesso()
    {
        $resultado = $this->auth->registrarUsuario('João Silva', 'joao@exemplo.com', 'senha123');
        $this->assertTrue($resultado); 
    }

    #Testa se o sistema não permite registro com email duplicado
    public function testNaoPermiteEmailDuplicado()
    {
        $this->auth->registrarUsuario('Maria', 'maria@exemplo.com', 'senha123');
        $resultado = $this->auth->registrarUsuario('Maria 2', 'maria@exemplo.com', 'senha456');
        $this->assertFalse($resultado); 
    }

    #Testa o login com sucesso
    public function testLoginComSucesso()
    {
        $this->auth->registrarUsuario('João Silva', 'joao@exemplo.com', 'senha123');
        $resultado = $this->auth->login('joao@exemplo.com', 'senha123');
        $this->assertTrue($resultado); 
    }

    #Testa o login com email inexistente
    public function testLoginComEmailInexistente()
    {
        $resultado = $this->auth->login('naoexiste@exemplo.com', 'senha123');
        $this->assertFalse($resultado);
    }

    #Testa o login com senha incorreta
    public function testLoginComSenhaIncorreta()
    {
        $this->auth->registrarUsuario('João Silva', 'joao@exemplo.com', 'senha123');
        $resultado = $this->auth->login('joao@exemplo.com', 'senhaErrada');
        $this->assertFalse($resultado);
    }
}
