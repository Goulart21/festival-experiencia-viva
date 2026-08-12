
<?php

class Inscricao{

    private ?int $id_inscricao;
    private int $id_participante;
    private int $id_atividade;
    private ?string $data_inscricao;
    private string $status;

    public function __construct(

    int $id_participante,
    int $id_atividade,
    string $status = 'ATIVA',
    ?int $id_inscricao = null,
    ?string $data_inscricao = null
    )
    {
        $this->id_inscricao = $id_inscricao;
        $this->id_participante =  $id_participante;
        $this->id_atividade = $id_atividade;
        $this->data_inscricao = $data_inscricao;
        $this->status = $status;
    }

    public function getIdInscricao(): ?int{
        return $this->id_inscricao;
    }

    public function getIdParticipante(): int{

        return $this->id_participante;
    }

    public function getIdAtividade(): int{
        return $this->id_atividade;
    }

    public function getDataInscricao(): string{
        return $this->data_inscricao;
    }

    public function getStatus(): string{
        return $this->status;
    }

    
}

?>