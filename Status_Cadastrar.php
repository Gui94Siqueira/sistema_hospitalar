<?php
include_once("services/conexao.php");
include_once("controller/cotrollerStatus.php");
include_once("model/modelStatus.php");

$data = json_decode(file_get_contents("php://input"), true);

$descricao = $data["descricao"];

$controllerStatus = new controllerStatus();
$cadastrar = $controllerStatus->cadastrarStatus($descricao);

if($cadastrar) {
    $msg = array("msg" => "Cadastro de status efetuado com sucesso!");
    echo  json_encode($msg);
} else {
    $msg = array("msg" => "Erro ao cadastrar o status.");
    echo json_encode($msg);
}
?>