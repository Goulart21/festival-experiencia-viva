<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Inscricao.php';
require_once __DIR__ . '/../services/InscricaoService.php';

$service = new InscricaoService($pdo);






$inscricao = new Inscricao(
    4, 
    1  
);

if ($service->cadastrarInscricao($inscricao)) {
    echo "Inscrição realizada";
} else {
    echo "Não foi possível realizar a inscrição";
}




$inscricoes = $service->listarInscricoes();

echo "<pre>";
print_r($inscricoes);
echo "</pre>";



$inscricaoEncontrada = $service->buscarInscricaoPorId(1);

echo "<pre>";
print_r($inscricaoEncontrada);
echo "</pre>";


$participantes = $service->listarPorAtividade(1);

echo "<pre>";
print_r($participantes);
echo "</pre>";




$inscricaoDuplicada = new Inscricao(
    4,
    1
);

if ($service->cadastrarInscricao($inscricaoDuplicada)) {
    echo "Inscrição já realizada. ERRO";
} else {
    echo "Inscrição duplicada foi impedida";
}




if ($service->cancelarInscricao(1)) {
    echo "Inscrição cancelada com sucesso";
} else {
    echo "Erro";
}


?>