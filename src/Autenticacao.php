<?php

namespace Unit;

class Autenticacao
{
    private $usuarios = [];

    #Função para registrar um usuário
    public function registrarUsuario($nome, $email, $senha)
    {
        #Verifica se o email já está registrado
        foreach ($this->usuarios as $usuario) {
            if ($usuario['email'] === $email) {
                return false; 
            }
        }

        #Cria um novo usuário
        $this->usuarios[] = [
            'nome' => $nome,
            'email' => $email,
            'senha' => password_hash($senha, PASSWORD_BCRYPT) #Simulador com proteção auth

        ];

        return true; 
    }

    #Função para fazer login
    public function login($email, $senha)
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario['email'] === $email) {
                if (password_verify($senha, $usuario['senha'])) {
                    return true; 
                } else {
                    return false; 
                }
            }
        }

        return false; 
    }
}
