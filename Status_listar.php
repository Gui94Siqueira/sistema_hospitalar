<?php
include_once("services/conexao.php");
include_once("controller/controllerStatus.php");
include_once("model/modelStatus.php");

$controllerStatus = new controllerStatus();
$lista = $controllerStatus->listarStatus();

if($lista) {
    $msg = array("status" => $lista);
    echo json_encode($msg);
} else {
    $msg = array("status" => []);
    echo json_encode($msg);
}
?>