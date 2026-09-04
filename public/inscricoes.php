<?php

require_once __DIR__ . '/../config/config.php'


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

                                <!-- PHP vai gerar os participantes aq-->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_atividade" class="form-label">Atividade:</label>

                            <select name="id_atividade" id="id_atividade" class="form-select" required>
                                <option value="">
                                    Selecione uma Atividade
                                </option>

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
                        <!-- PHP vai gerar as inscrições aqui -->
                    </tbody>
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