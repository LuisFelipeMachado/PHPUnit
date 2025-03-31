<?php

namespace App;

class ConsultaCep
{
    public function buscar(string $cep): ?array
    {
        $cep = preg_replace('/[^0-9]/', '', $cep); // só números

        if (strlen($cep) !== 8) {
            return null;
        }

        $url = "https://viacep.com.br/ws/$cep/json/";

        $resposta = file_get_contents($url);
        $dados = json_decode($resposta, true);

        if (isset($dados['erro'])) {
            return null;  
        }

        return $dados;
    }
}
