<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Participantes.php';
require_once __DIR__ . '/../services/ParticipanteService.php';

$service = new ParticipanteService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $participante = new Participante($nome, $email, $telefone);

    if(isset($_POST['id_participante'])){

    $id = (int) $_POST['id_participante'];
    $service->atualizar($id, $participante);
    }
    else{
        $service->cadastrar($participante);
    }
    header('Location: participantes.php');
    exit;

    
}
$participantes = $service->listar();

if (isset($_GET['excluir'])) {

    $id_participante = $_GET['excluir'];
    $service->excluir($id_participante);

    header('Location: participantes.php');
    exit;
}

if (isset($_GET['atualizar'])) {
    $id_participante = $_GET['atualizar'];

    $participante = $service->buscarPorId($id_participante);
}

$participanteEditar = null;

if (isset($_GET['atualizar'])) {

    $id_participante = (int) $_GET['atualizar'];
    $participanteEditar = $service->buscarPorId($id_participante);
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
    <title>Pagina de Participantes</title>
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
        <section class="mb-4 mt-4">
            <h2 class="text-center">Cadastro de Participantes</h2>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-4">

                    <form action="" method="post" class="formCadastro">

                        <?php if($participanteEditar): ?>
                            <input type="hidden" name="id_participante" value="<?= $participanteEditar['id_participante'] ?>">
                        <?php endif;?>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Maria" value="<?= htmlspecialchars($participanteEditar['nome'] ?? '')  ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ex: maria@gmail.com" value="<?= htmlspecialchars($participanteEditar['email'] ?? '')   ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Ex: (31)99999999" value="<?=htmlspecialchars($participanteEditar['telefone'] ?? '') ?>" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                Cadastrar
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </section>


        <section class="mb-4">
            <h2 class="text-center mt-5">Participantes cadastrados</h2>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                       
                        <?php foreach ($participantes as $participante): ?>
                            <tr>
                                <td><?= $participante['nome'] ?></td>
                                <td><?= $participante['email'] ?></td>
                                <td><?= $participante['telefone'] ?></td>

                                <td>
                                    <a href="participantes.php?atualizar=<?= $participante['id_participante'] ?>"
                                        class="btn btn-warning">Editar</a>
                                    <a href="participantes.php?excluir=<?= $participante['id_participante'] ?>"
                                        class="btn btn-danger" onclick="return confirmarExclusao()">Excluir</a>
                                </td>
                            </tr>


                        <?php endforeach ?>
                    </tbody>
                </table>
        </section>
    </main>


    <footer>Festival Experiência Viva</footer>

    <script src="js/script.js"></script>
</body>

</html>