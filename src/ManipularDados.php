<?php
namespace Unit;

class ManipularDados
{
    // Cria um arquivo e escreve dados nele
    public function criarArquivo(string $nomeArquivo, string $conteudo): bool
    {
        $arquivo = fopen($nomeArquivo, 'w'); // Abre o arquivo para escrita (cria se não existir)
        
        if ($arquivo === false) {
            return false; // Se não conseguiu abrir o arquivo, retorna falso
        }

        fwrite($arquivo, $conteudo); // Escreve o conteúdo no arquivo
        fclose($arquivo); // Fecha o arquivo
        return true;
    }

    // Lê o conteúdo de um arquivo
    public function lerArquivo(string $nomeArquivo): ?string
    {
        if (!file_exists($nomeArquivo)) {
            return null; // Retorna null se o arquivo não existir
        }

        return file_get_contents($nomeArquivo); // Lê o conteúdo do arquivo
    }

    // Adiciona dados ao final de um arquivo (apêndice)
    public function adicionarAoArquivo(string $nomeArquivo, string $conteudo): bool
    {
        $arquivo = fopen($nomeArquivo, 'a'); // Abre o arquivo para adicionar dados (sem sobrescrever)

        if ($arquivo === false) {
            return false; // Se não conseguiu abrir o arquivo, retorna falso
        }

        fwrite($arquivo, $conteudo); // Escreve o conteúdo no final do arquivo
        fclose($arquivo); // Fecha o arquivo
        return true;
    }

    // Exclui um arquivo
    public function excluirArquivo(string $nomeArquivo): bool
    {
        if (!file_exists($nomeArquivo)) {
            return false; // Se o arquivo não existir, retorna falso
        }

        return unlink($nomeArquivo); // Exclui o arquivo
    }
}
