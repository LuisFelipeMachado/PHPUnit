<?php
declare(strict_types=1);

namespace Unit;

class GerenciadorUsuarios
{
    private array $usuarios = [];

    /**
     * Cadastra um novo usuário com nome completo e nome de usuário
     */
    public function cadastrarUsuario(
        string $nomeCompleto,
        string $nomeUsuario, 
        string $email
    ): bool {
        if ($this->usuarioExiste($email) || $this->nomeUsuarioExiste($nomeUsuario)) {
            return false;
        }

        $this->usuarios[$email] = [
            'nome_completo' => $nomeCompleto,
            'nome_usuario' => $nomeUsuario,
            'email' => $email,
            'data_cadastro' => date('Y-m-d H:i:s')
        ];
        
        return true;
    }

    /**
     * Verifica se um usuário existe pelo email
     */
    public function usuarioExiste(string $email): bool
    {
        return isset($this->usuarios[$email]);
    }

    /**
     * Verifica se um nome de usuário já está em uso
     */
    public function nomeUsuarioExiste(string $nomeUsuario): bool
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario['nome_usuario'] === $nomeUsuario) {
                return true;
            }
        }
        return false;
    }

    /**
     * Busca usuário por email
     */
    public function buscarPorEmail(string $email): ?array
    {
        return $this->usuarios[$email] ?? null;
    }

    /**
     * Busca usuário por nome de usuário
     */
    public function buscarPorNomeUsuario(string $nomeUsuario): ?array
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario['nome_usuario'] === $nomeUsuario) {
                return $usuario;
            }
        }
        return null;
    }

    /**
     * Remove um usuário
     */
    public function removerUsuario(string $email): bool
    {
        if (!$this->usuarioExiste($email)) {
            return false;
        }

        unset($this->usuarios[$email]);
        return true;
    }
}