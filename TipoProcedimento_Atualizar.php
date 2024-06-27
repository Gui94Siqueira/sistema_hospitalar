<?php 
include_once("services/conexao.php");
include_once("controller/controller_tipos_procedimentos.php");
include_once("model/model_tipos_procedimentos.php");

$data = json_decode(file_get_contents('php://input'), true);

$id_tipo_procedimento = $data['id_tipos_procedimento'];
$descricao_procedimento = $data["descricao_procedimento"];

$controllerProcedimentos = new controllerProcedimentos();
$resultado = $controllerProcedimentos->atualizarProcedimentos($descricao_procedimento, $id_tipo_procedimento);

if($resultado){
    $msg = array("msg" => "Atualizado Efetuado Com Sucesso!");
    echo json_encode($msg);
} else {
    $msg = array("erro" => "Erro ao Atualizar Tipo Procedimento");
    echo json_encode($msg);
}
?>