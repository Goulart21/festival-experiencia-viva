
<?php

class Atividade{

    private ?int $id_atividade;
    private string $nome;
    private ?string $descricao;
    private string $data_atividade;
    private string $hora_inicio;
    private string $hora_fim;
    private string $local_atividade;
    private int $capacidade;

    public function __construct(

    string $nome,
    ?string $descricao,
    string $data_atividade,
    string $hora_inicio,
    string $hora_fim,
    string $local_atividade,
    int $capacidade,
    ?int $id_atividade = null

    )
    {
        $this->id_atividade = $id_atividade;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->data_atividade = $data_atividade;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fim = $hora_fim;
        $this->local_atividade = $local_atividade;
        $this->capacidade = $capacidade;
        
    }

    public function getIdAtividade(): ?int{

        return $this->id_atividade;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function getDescricao(): ?string{
        return $this->descricao;
    }

    public function getDataAtividade(): ?string{
        return $this->data_atividade;
    }

    public function getHoraInicio(): string{
        return $this->hora_inicio;
    }

    public function getHoraFim(): string{
        return $this->hora_fim;
    }

    public function getLocalAtividade(): string{
        return $this->local_atividade;
    }

    public function getCapacidade(): int{
        return $this->capacidade;
    }


}



?>