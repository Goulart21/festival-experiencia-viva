<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Atividade.php';
require_once __DIR__ . '/../services/AtividadeService.php';

$service = new AtividadeService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_atividade = $_POST['nome_atividade'];
    $descricao = $_POST['descricao'];
    $data_atividade = $_POST['data_atividade'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $local_atividade = $_POST['local_atividade'];
    $capacidade = $_POST['capacidade'];

    $atividade = new Atividade($nome_atividade, $descricao, $data_atividade, $hora_inicio, $hora_fim, $local_atividade, $capacidade);

    if (isset($_POST['id_atividade'])) {

        $id = (int) $_POST['id_atividade'];
        $service->atualizarAtividade($id, $atividade);
    } else {
        $service->cadastrarAtividade($atividade);
    }

    header('Location: atividades.php');
    exit;
}

$atividades = $service->listarAtividade();

if (isset($_GET['excluir'])) {

    $id_atividade = $_GET['excluir'];
    $service->excluir($id_atividade);

    header('Location: atividades.php');
    exit;
}

$atividadeEditar = null;

if (isset($_GET['atualizarAtividade'])) {

    $id_atividade = (int) $_GET['atualizarAtividade'];
    $atividadeEditar = $service->buscarAtividadePorId($id_atividade);
}

?>




<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Pagina de Atividades</title>
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
                        <a class="nav-link" href="participantes.php">
                            Participantes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="atividades.php">
                            Atividades
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="inscricoes.php">
                            Inscrições
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>

        <section class="mt-4 mb-5">
            <h2 class="text-center mb-4">Cadastro de Atividade</h2>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">

                    <form action="" method="post">

                        <?php if($atividadeEditar): ?>
                            <input type="hidden" name="id_atividade" value="<?= $atividadeEditar['id_atividade'] ?>">
                        <?php endif;?>
                        <div class="mb-3">
                            <label for="nome_atividade" class="form-label">Nome da Atividade</label>
                            <input type="text" name="nome_atividade" id="nome_atividade" class="form-control"  value="<?= htmlspecialchars($atividadeEditar['nome_atividade'] ?? '') ?>"
                        </div>

                        <div class="mb-3">

                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="<?= htmlspecialchars($atividadeEditar['descricao'] ?? '') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="data_atividade" class="form-label">Data Atividade:</label>
                            <input type="date" class="form-control" id="data_atividade" name="data_atividade" value="<?= $atividadeEditar['data_atividade']?? '' ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="hora_inicio" class="form-label">Hora de inicio: </label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="<?= $atividadeEditar['hora_inicio'] ?? '' ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="hora_fim">Hora de término:</label>
                            <input type="time" class="form-control" id="hora_fim" name="hora_fim" value="<?= $atividadeEditar['hora_fim'] ?? '' ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="local_atividade">Local:</label>
                            <input type="text" class="form-control" id="local_atividade" name="local_atividade" value="<?= $atividadeEditar['local_atividade'] ?? ''?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="capacidade" class="form-label">Capacidade:</label>
                            <input type="number" class="form-control" id="capacidade" name="capacidade" min=1 value="<?= $atividadeEditar['capacidade'] ?? '' ?>" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                <?= $atividadeEditar ? 'Atualizar' : 'Cadastrar' ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="mb-5">

            <h2 class="mb-4">Atividades Cadastradas</h2>

            <div class="table-responsive">
                <table class="table table-striped table-hover">

                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Horário inicio</th>
                            <th>Horario termino</th>
                            <th>Local Atividade</th>
                            <th>Capacidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($atividades as $atividade): ?>

                            <tr>
                                <td><?= $atividade['nome_atividade'] ?></td>
                                <td><?= $atividade['descricao'] ?></td>
                                <td><?= $atividade['data_atividade'] ?></td>
                                <td><?= $atividade['hora_inicio'] ?></td>
                                <td><?= $atividade['hora_fim'] ?></td>
                                <td><?= $atividade['local_atividade'] ?></td>
                                <td><?= $atividade['capacidade'] ?></td>

                                <td>
                                    <a href="atividades.php?atualizarAtividade=<?= $atividade['id_atividade'] ?>" class="btn btn-warning">Editar</a>
                                    <a href="atividades.php?excluir=<?= $atividade['id_atividade'] ?>" class="btn btn-danger">Excluir</a>

                                </td>
                        
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>Festival Experiência Viva</footer>

    <script src="js/script.js"></script>

</body>

</html>