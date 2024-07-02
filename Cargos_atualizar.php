<?php 
include_once("services/conexao.php");
include_once("controller/controllerCargos.php");
include_once("model/modelCargos.php");

$data = json_decode(file_get_contents('php://input'), true);

$id_cargo = $data['id_cargo'];
$descricao_cargo = $data["descricao_cargo"];

$controllerCargos = new controllerCargos();
$resultado = $controllerCargos->atualizarCargo($id_cargo, $descricao_cargo);

if($resultado){
    $msg = array("msg" => "Atualizado Efetuado Com Sucesso!");
    echo json_encode($msg);
} else {
    $msg = array("erro" => "Erro ao Atualizar Tipo Procedimento");
    echo json_encode($msg);
}
?>