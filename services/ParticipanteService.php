
<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Participantes.php';

class ParticipanteService{
    
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrar(Participante $participante): bool{

        $sql = "INSERT INTO participantes (nome,email,telefone)";
        
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome' => $participante->getNome(),
            ':email' => $participante->getEmail(),
            ':telefone' =>$participante->getTelefone()
        ]);
    }

    public function listar(): array{

        $sql = "SELECT * FROM participantes ORDER BY nome";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id): ?array{

        $sql = "SELECT * FROM participantes WHERE id_participante = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        $participante = $stmt->fetch(PDO::FETCH_ASSOC);

        return $participante ?: null;
    }
}

?>