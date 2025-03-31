<?php

namespace App;

class ApiService
{
    public function buscarUsuario(int $id): ?array
    {
        $url = "https://jsonplaceholder.typicode.com/users/$id";
        $resposta = file_get_contents($url);
        $dados = json_decode($resposta, true);

        if (!isset($dados['id'])) {
            return null;
        }

        return $dados;
    }
}
