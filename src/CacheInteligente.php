<?php

class CacheInteligente
{
    private array $dados = [];
    private int $limite;
    private int $tempoExpiracao;

    public function __construct(int $limite = 100, int $tempoExpiracao = 10)
    {
        $this->limite = $limite;
        $this->tempoExpiracao = $tempoExpiracao;
    }

    public function definir(string $chave, mixed $valor): void
    {
        $this->removerExpirados();

        if (count($this->dados) >= $this->limite) {
            array_shift($this->dados);
        }

        $this->dados[$chave] = [
            'valor' => $valor,
            'timestamp' => time()
        ];
    }

    public function obter(string $chave): mixed
    {
        if (!isset($this->dados[$chave])) {
            return null;
        }

        $registro = $this->dados[$chave];

        if (time() - $registro['timestamp'] > $this->tempoExpiracao) {
            $this->remover($chave);
            return null;
        }

        return $registro['valor'];
    }

    public function remover(string $chave): bool
    {
        if (isset($this->dados[$chave])) {
            unset($this->dados[$chave]);
            return true;
        }

        return false;
    }

    public function tamanho(): int
    {
        $this->removerExpirados();
        return count($this->dados);
    }

    private function removerExpirados(): void
    {
        $agora = time();
        foreach ($this->dados as $chave => $registro) {
            if ($agora - $registro['timestamp'] > $this->tempoExpiracao) {
                unset($this->dados[$chave]);
            }
        }
    }
}
