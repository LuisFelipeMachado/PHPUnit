<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/CacheInteligente.php';

class TestCacheInteligente extends TestCase
{
    public function testArmazenamentoERecuperacaoDeValor()
    {
        $cache = new CacheInteligente();
        $cache->definir('nome', 'Fernando');
        $this->assertEquals('Fernando', $cache->obter('nome'));
    }

    public function testExpiracaoDeItem()
    {
        $cache = new CacheInteligente(100, 1);
        $cache->definir('chave', 'valor');
        sleep(2);
        $this->assertNull($cache->obter('chave'));
    }

    public function testRemocaoDeItem()
    {
        $cache = new CacheInteligente();
        $cache->definir('teste', 123);
        $this->assertTrue($cache->remover('teste'));
        $this->assertNull($cache->obter('teste'));
    }

    public function testNaoRemoveItemInexistente()
    {
        $cache = new CacheInteligente();
        $this->assertFalse($cache->remover('inexistente'));
    }

    public function testLimiteDoCacheRemoveMaisAntigo()
    {
        $cache = new CacheInteligente(2);
        $cache->definir('a', 'primeiro');
        $cache->definir('b', 'segundo');
        $cache->definir('c', 'terceiro'); // Deve remover 'a'
        $this->assertNull($cache->obter('a'));
        $this->assertEquals('segundo', $cache->obter('b'));
        $this->assertEquals('terceiro', $cache->obter('c'));
    }

    public function testTamanhoAtualizadoComItensValidos()
    {
        $cache = new CacheInteligente(5, 1);
        $cache->definir('x', '123');
        $cache->definir('y', '456');
        sleep(2);
        $cache->definir('z', '789');
        $this->assertEquals(1, $cache->tamanho());
    }
}
