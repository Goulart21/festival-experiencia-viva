

<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Inscricao.php';

class InscricaoService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Realizar inscrição
    public function cadastrarInscricao(Inscricao $inscricao): bool
    {
        // Verifica se o participante já está inscrito
        $sql = "SELECT COUNT(*)
                FROM inscricoes
                WHERE id_participante = :id_participante
                AND id_atividade = :id_atividade
                AND status = 'ATIVA'";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id_participante' => $inscricao->getIdParticipante(),
            ':id_atividade' => $inscricao->getIdAtividade()
        ]);

        if ($stmt->fetchColumn() > 0) {
            return false;
        }

        // Verifica a capacidade da atividade
        $sql = "SELECT capacidade
                FROM atividades
                WHERE id_atividade = :id_atividade";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id_atividade' => $inscricao->getIdAtividade()
        ]);

        $capacidade = $stmt->fetchColumn();

        if ($capacidade === false) {
            return false;
        }

        // Conta inscrições ativas
        $sql = "SELECT COUNT(*)
                FROM inscricoes
                WHERE id_atividade = :id_atividade
                AND status = 'ATIVA'";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id_atividade' => $inscricao->getIdAtividade()
        ]);

        $quantidadeInscritos = $stmt->fetchColumn();

        // Verifica se existem vagas
        if ($quantidadeInscritos >= $capacidade) {
            return false;
        }

        // Realiza a inscrição
        $sql = "INSERT INTO inscricoes
                (id_participante, id_atividade)
                VALUES
                (:id_participante, :id_atividade)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id_participante' => $inscricao->getIdParticipante(),
            ':id_atividade' => $inscricao->getIdAtividade()
        ]);
    }


    // Listar inscrições
    public function listarInscricoes(): array
    {
        $sql = "SELECT * FROM inscricoes
                ORDER BY data_inscricao DESC";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Buscar inscrição por ID
    public function buscarInscricaoPorId(int $id_inscricao): ?array
    {
        $sql = "SELECT *
                FROM inscricoes
                WHERE id_inscricao = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id_inscricao
        ]);

        $inscricao = $stmt->fetch(PDO::FETCH_ASSOC);

        return $inscricao ?: null;
    }


    // Listar participantes de uma atividade
    public function listarPorAtividade(int $id_atividade): array
    {
        $sql = "SELECT p.*
                FROM participantes p
                INNER JOIN inscricoes i
                    ON p.id_participante = i.id_participante
                WHERE i.id_atividade = :id_atividade
                AND i.status = 'ATIVA'
                ORDER BY p.nome";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id_atividade' => $id_atividade
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Cancelar inscrição
    public function cancelarInscricao(int $id_inscricao): bool
    {
        $sql = "UPDATE inscricoes
                SET status = 'CANCELADA'
                WHERE id_inscricao = :id
                AND status = 'ATIVA'";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id_inscricao
        ]);
    }
}