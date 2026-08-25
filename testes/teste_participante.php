
<?php

//importar as configurações
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Participantes.php';
require_once __DIR__ . '/../services/ParticipanteService.php';


//teste de inserção

/*
instanciar o service 
criar um usuario em formato de objeto
verificar ser o usuario foi cadastrado ou não
*/
$service = new ParticipanteService($pdo);


$participante = new Participante(
    'Teste Cancelar',
    'prets@w.com',
    '3199999999'
);

if($service->cadastrar($participante)){
    echo "Participante cadastrado com sucesso";
}
else{
    echo "Erro no cadastro";
}
    

//Buscar por ID
$participantes = $service->listar();
echo "<pre>";
print_r($participantes);
echo "</pre>";

$participante = $service->buscarPorId(4);
echo "<pre>";
print_r($participante);
echo "</pre>";


//Atualização

$participanteAtualizado = new Participante(
    'Pedro Atualizado',
    'atualizado@gmail.com',
    '312222222222'
);

if($service->atualizar(1,$participanteAtualizado)){
    echo "Participante atualizado";
}
else{
    echo "Erro ao atualizar";
}


if($service->excluir(1)){
    echo "Usuario excluido";
}




?>                                                                                                                                                                                      