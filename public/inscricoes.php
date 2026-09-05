<?php


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Atividade.php';
require_once __DIR__ . '/../models/Participantes.php';
require_once __DIR__ . '/../models/Inscricao.php';

require_once __DIR__ . '/../services/AtividadeService.php';
require_once __DIR__ . '/../services/InscricaoService.php';
require_once __DIR__ . '/../services/ParticipanteService.php';

$participanteService = new ParticipanteService($pdo);
$atividadeService = new AtividadeService($pdo);
$inscricoesService = new InscricaoService($pdo);

$participantes = $participanteService->listar();
$atividades = $atividadeService->listarAtividade();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_participante = (int) $_POST['id_participante'];
    $id_atividade = (int) $_POST['id_atividade'];

    $inscricao = new Inscricao(
        $id_participante,
        $id_atividade
    );

    $inscricoesService->cadastrarInscricao($inscricao);

    header('Location: inscricoes.php');
    exit;
}

$inscricoes = $inscricoesService->listarInscricoes();

if (isset($_GET['cancelar'])) {

    $id_inscricao = (int) $_GET['cancelar'];

    $inscricoesService->cancelarInscricao($id_inscricao);

    header('Location: inscricoes.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Pagina de Inscrições</title>
</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h1>Festival Experiência Viva</h1>
                </a>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="participantes.php" class="nav-link">
                            Participantes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="atividades.php" class="nav-link">
                            Atividades
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="participantes.php" class="nav-link">
                            Inscrições
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>

        <section class="mb-4 mt-4">
            <h2 class="text-center">Cadastro de Inscrições</h2>

            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-6">

                    <form action="" method="post">

                        <div class="mb-3">

                            <label for="id_participante" class="form-label">Participante:</label>
                            <select name="id_participante" id="id_participante" class="form-select" required>
                                <option value="">
                                    Selecione um participante
                                </option>

                                <?php foreach ($participantes as $participante): ?>

                                    <option value="<?= $participante['id_participante'] ?>">
                                        <?= htmlspecialchars($participante['nome']) ?>
                                    </option>

                                    <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_atividade" class="form-label">Atividade:</label>

                            <select name="id_atividade" id="id_atividade" class="form-select" required>
                                <option value="">
                                    Selecione uma Atividade
                                </option>

                                <?php foreach ($atividades as $atividade): ?>

                                    <option value="<?= $atividade['id_atividade'] ?>">
                                        <?= htmlspecialchars($atividade['nome_atividade']) ?>
                                    </option>

                                    <?php endforeach;?>

                            </select>
                        </div>

                        <div class="text-center">

                            <button type="submit" class="btn btn-success">Inscrever Participante</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="container mb-5">

            <h2 class="mb-4">Inscrições cadastradas</h2>

            <div class="table-responsive">
                <table class="table table-striped table-hover">

                    <thead>
                        <tr>
                            <th>Participantes</th>
                            <th>Atividade</th>
                            <th>Data de Inscrições</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                    <?php foreach ($inscricoes as $inscricao):?>
                    <tr>
                        <td><?= htmlspecialchars($inscricao['nome_participante']) ?></td>
                        <td><?= htmlspecialchars($inscricao['nome_atividade']) ?></td>
                        <td><?= $inscricao['data_inscricao'] ?></td>
                        <td><?= $inscricao['status'] ?></td>

                        <td>

                        <?php if($inscricao['status'] === 'ATIVA'): ?>

                            <a href="inscricoes.php?cancelar=<?= $inscricao['id_inscricao'] ?>"
                            class="btn btn-danger" onclick="return confirm('Deseja realmente cancelar está inscrição')">Cancelar</a>

                            <?php else:?>
                                <span class="text-muted">Cancelada</span>
                        </td>

                        <?php endif;?>
                    </tr>
                    </tbody>

                    <?php endforeach;?>
                </table>
            </div>
        </section>
    </main>

    <footer>
        Festival Experiência Viva
    </footer>

    <script src="js/script.js"></script>
</body>

</html>