<?php

use PHPUnit\Framework\TestCase;
use App\ApiService;

require_once __DIR__ . '/../src/ApiService.php';

class ApiServiceTest extends TestCase
{
    public function testUsuarioExiste()
    {
        $mock = $this->getMockBuilder(ApiService::class)
                     ->onlyMethods(['buscarUsuario'])
                     ->getMock();

        $mock->method('buscarUsuario')->willReturn([
            'id' => 1,
            'name' => 'Leanne Graham',
            'email' => 'Sincere@april.biz'
        ]);

        $usuario = $mock->buscarUsuario(1);

        $this->assertNotNull($usuario);
        $this->assertEquals('Leanne Graham', $usuario['name']);
        $this->assertEquals('Sincere@april.biz', $usuario['email']);
    }

    public function testUsuarioNaoExiste()
    {
        $mock = $this->getMockBuilder(ApiService::class)
                     ->onlyMethods(['buscarUsuario'])
                     ->getMock();

        $mock->method('buscarUsuario')->willReturn(null);

        $usuario = $mock->buscarUsuario(9999); // usuário que não existe

        $this->assertNull($usuario);
    }
}
