<?php
    include_once("services/conexao.php");
    include_once("controller/controllerCargos.php");
    include_once("model/modelCargos.php");
    
    $controllerCargos = new controllerCargos();
    $lista = $controllerCargos->listarCargos();
    
    if($lista) {
        $msg = array("cargos" => $lista);
        echo json_encode($msg);
    } else {
        $msg = array("cargos" => []);
        echo json_encode($msg);
    }

?>