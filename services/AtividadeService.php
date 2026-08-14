
<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Atividade.php';


class AtividadeService
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrarAtividade(Atividade $atividade): bool
    {
        $sql = "INSERT INTO atividades
            (nome_atividade, descricao, data_atividade, hora_inicio, hora_fim, local_atividade, capacidade)
            VALUES
            (:nome_atividade, :descricao, :data_atividade, :hora_inicio, :hora_fim, :local_atividade, :capacidade)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome' => $atividade->getNomeAtividade(),
            ':descricao' => $atividade->getDescricao(),
            ':data_atividade' => $atividade->getDataAtividade(),
            ':hora_inicio' => $atividade->getHoraInicio(),
            ':hora_fim' => $atividade->getHoraFim(),
            ':local_atividade' => $atividade->getLocalAtividade(),
            ':capacidade' => $atividade->getCapacidade()
        ]);
    }
    public function listarAtividade(): array
    {

        $sql = "SELECT * FROM atividades order by nome_atividade";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarAtividadePorId(int $id_atividade): ?array
    {

        $sql = "SELECT * FROM atividades WHERE id_atividade = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id_atividade
        ]);

        $atividade = $stmt->fetch(PDO::FETCH_ASSOC);

        return $atividade ?: null;
    }

    public function atualizarAtividade(int $id_atividade, Atividade $atividade): bool{
        
        $sql = "UPDATE atividades
        SET nome_atividade = :nome_atividade,
        descricao = :descricao,
        data_atividade = :data_atividade,
        hora_inicio = :hora_inicio,
        hora_fim = :hora_fim,
        local_atividade = :local_atividade,
        capacidade = :capacidade
        WHERE id_capacidade = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome_atividade' => $atividade->getNomeAtividade(),
            ':descricao' => $atividade->getDescricao(),
            ':data_atividade' => $atividade->getCapacidade(),
            ':hora_inicio' => $atividade->getHoraInicio(),
            ':hora_fim' => $atividade->getHoraFim(),
            ':local_atividade' => $atividade->getLocalAtividade(),
            ':capacidade' => $atividade->getCapacidade(),
            ':id' => $id_atividade
        ]);

    }

    public function excluir(int $id_atividade): bool{

        $sql = "SELECT COUNT(*)
        FROM inscricoes
        WHERE id_atividade = id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id_atividade
        ]);

        $quantidade = $stmt->fetchColumn();

        if($quantidade > 0){
            return false;
        }

        $sql = "DELETE FROM atividades
                WHERE $id_atividade = :id";
        
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id_atividade
        ]);
    }
}




?>