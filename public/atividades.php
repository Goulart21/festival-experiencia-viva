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

                <div class="mb-3">
                    <label for="nome_atividade" class="form-label">Nome da Atividade</label>
                    <input type="text" name="nome_atividade" id="nome_atividade" class="form-control" required>
                </div>

                <div class="mb-3">

                    <label for="descricao" class="form-label">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" required>
                </div>

                <div class="mb-3">
                    <label for="data_atividade" class="form-label">Data Atividade:</label>
                    <input type="date" class="form-control" id="data_atividade" name="data_atividade" required>
                </div>

                <div class="mb-3">
                    <label for="hora_inicio" class="form-label">Hora de inicio: </label>
                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
                </div>

                <div class="mb-3">
                    <label for="hora_termino">Hora de término:</label>
                    <input type="time" class="form-control" id="hora_termino" name="hora_termino" required>
                </div>

                <div class="mb-3">
                    <label for="local_atividade">Local:</label>
                    <input type="text" class="form-control" id="local_atividade" name="local_atividade" required>
                </div>

                <div class="mb-3">
                    <label for="capacidade" class="form-label">Capacidade:</label>
                    <input type="number" class="form-control" id="capacidade" name="capacidade" min=1 required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
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
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Local</th>
                    <th>Capacidade</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>

                <>
            </tbody>
        </table>
        </div>
        </section>
    </main>

    <footer>Festival Experiência Viva</footer>
</body>
</html>