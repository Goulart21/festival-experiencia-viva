
<?php


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../models/Atividade.php';
require_once __DIR__ . '/../services/AtividadeService.php';


$service = new AtividadeService($pdo);

/*
$atividade = new Atividade(
    'Teste Atividade',
    'teste descricao',
    '2026-02-02',
    '12:00',
    '13:00',
    'palacio',
    12
);

if($service->cadastrarAtividade($atividade)){
    echo "Atividade cadastrado com sucesso";
}
else{
    echo "Erro ao cadastrar ativiade";
}
    */

$atividade = $service->listarAtividade();
echo "<pre>";
print_r($atividade);
echo "</prep>";

$atividade = $service->buscarAtividadePorId(2);
echo "<pre>";
print_r($atividade);
echo "<pre>";

$atividadeAtualizada = new Atividade(
    'Atividade Atualizada',
    'Descricao Atualizada',
    '2026-02-02',
    '14:00',
    '18:00',
    'algum lugar',
    67

);

if($service->atualizarAtividade(1,$atividadeAtualizada)){
    echo "Atividadte atualizada";
}

if($service->excluir(2)){
    echo "Atividade excluida";
}







?>