<?php

namespace Unit\Testes;

use PHPUnit\Framework\TestCase;
use Unit\GerenciadorUsuarios;

class GerenciadorUsuariosTest extends TestCase
{
    private GerenciadorUsuarios $gerenciador;

    #Este método será executado antes de cada teste
    protected function setUp(): void
    {
        #pode inicializar o Gerenciador e qualquer outra dependência
        $this->gerenciador = new GerenciadorUsuarios();
    }

    #Teste para cadastro de usuário
    public function testCadastraUsuarioComSucesso()
    {
        #Tentando cadastrar um usuário
        $resultado = $this->gerenciador->cadastrarUsuario(
            'João Silva',
            'joao.silva',
            'joao@exemplo.com'
        );
        
        #Verifica se o cadastro foi bem-sucedido
        $this->assertTrue($resultado);
    }

    #Teste para evitar email duplicado
    public function testNaoPermiteEmailDuplicado()
    {
        #Cadastra o primeiro usuário
        $this->gerenciador->cadastrarUsuario('Maria', 'maria', 'maria@exemplo.com');
        
        $resultado = $this->gerenciador->cadastrarUsuario('Maria 2', 'maria2', 'maria@exemplo.com');
        
        # Verifica se a operação falhou ao tentar cadastrar email duplicado
        $this->assertFalse($resultado);
    }

    #Teste de busca de usuário pelo email
    public function testBuscaUsuarioPorEmail()
    {
        #Cadastra um usuário
        $this->gerenciador->cadastrarUsuario('Carlos', 'carlos', 'carlos@exemplo.com');
        
        #Busca o usuário por email
        $usuario = $this->gerenciador->buscarPorEmail('carlos@exemplo.com');
        
        #Verifica se o nome do usuário encontrado está correto
        $this->assertEquals('Carlos', $usuario['nome_completo']);
    }

    #Teste para remoção de usuário
    public function testRemoveUsuario()
    {
        #Cadastra um usuário e remove por email
        $this->gerenciador->cadastrarUsuario('Teste', 'teste', 'teste@exemplo.com');
        
        $resultado = $this->gerenciador->removerUsuario('teste@exemplo.com');
        
        #Verifica se a remoção foi bem-sucedida e Busca 
        $this->assertTrue($resultado);
        
        #Tenta buscar o usuário após a remoção
        $usuario = $this->gerenciador->buscarPorEmail('teste@exemplo.com');
        
        #Verifica se o usuário foi realmente removido
        $this->assertNull($usuario);
    }

    #Teste para garantir que ao cadastrar um usuário sem o nome ele retorne falso
    public function testCadastroComNomeVazio()
    {
        #Tenta cadastrar um usuário com nome vazio
        $resultado = $this->gerenciador->cadastrarUsuario(
            '',
            'usuario',
            'usuario@exemplo.com'
        );
        
        #Verifica se a operação falhou, pois o nome está vazio
        $this->assertFalse($resultado);
    }

    #Teste para garantir que não é possível cadastrar usuário com e-mail inválido
    public function testCadastroComEmailInvalido()
    {
        // Tenta cadastrar um usuário com email inválido
        $resultado = $this->gerenciador->cadastrarUsuario(
            'João',
            'joao',
            'invalid-email'
        );
        
        #Verifica se a operação falhou, pois o email é inválido
        $this->assertFalse($resultado);
    }
}
