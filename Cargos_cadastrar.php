<?php

include_once ("services/conexao.php");
include_once ("controller/controllerCargos.php");
include_once ("model/modelCargos.php");

$data = json_decode(file_get_contents('php://input'), true);

$descricao_cargo = $data['descricao_cargo'];

$controllerCargos = new controllerCargos();
$retorno = $controllerCargos->cadastrarCargo($descricao_cargo);

if($retorno) {
    $msg = array("msg" => "Cadastro realizado");
    echo  json_encode($msg);
} else {
    $msg = array("msg" => "Erro ao cadastrar cargo.");
    echo json_encode($msg);
}