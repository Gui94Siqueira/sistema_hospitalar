<?php

include_once("services/conexao.php");
include_once("model/modelPacientes.php");
include_once("controller/controllerPacientes.php");

$controllerPacientes = new controllerPacientes();
$lista = $controllerPacientes->listarPacientes();

if($lista) {
    $msg = array("msg" => $lista);
    echo  json_encode($msg);
} else {
    $msg = array("msg" => "Erro ao cadastrar paciente.");
    echo json_encode($msg);
}