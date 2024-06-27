<?php
include_once("services/conexao.php");
include_once("controller/controller_tipos_procedimentos.php");
include_once("model/model_tipos_procedimentos.php");

$controllerProcedimentos = new controllerProcedimentos();
$resultado = $controllerProcedimentos->listarProcedimentos();

if($resultado) {
    $msg = array("procedimentos" => $resultado);
    echo json_encode($msg);
} else {
    $msg = array("procedimento" => []);
    echo json_encode($msg);
}

?>