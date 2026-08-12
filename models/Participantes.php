<?php

class Participante
{
    private ?int $id_participante;
    private string $nome;
    private string $email;
    private string $telefone;
    private ?string $data_cadastro;

    public function __construct(
        string $nome,
        string $email,
        string $telefone,
        ?int $id_participante = null,
        ?string $data_cadastro = null
    ) {
        $this->id_participante = $id_participante;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->data_cadastro = $data_cadastro;
    }

    public function getIdParticipante(): ?int
    {
        return $this->id_participante;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getDataCadastro(): ?string
    {
        return $this->data_cadastro;
    }
}