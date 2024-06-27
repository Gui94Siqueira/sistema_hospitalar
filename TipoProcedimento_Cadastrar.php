<?php
include_once("services/conexao.php");
include_once("controller/controller_tipos_procedimentos.php");
include_once("model/model_tipos_procedimentos.php");

$data = json_decode(file_get_contents('php://input'), true);

$descricao_procedimento = $data["descricao_procedimento"];

$controllerProcedimentos = new controllerProcedimentos();
$resultado = $controllerProcedimentos->cadastrarProcedimentos($descricao_procedimento);

if($resultado){
    $msg = array("msg" => "Cadastro Efetuado Com Sucesso!");
    echo json_encode($msg);
} else {
    $msg = array("erro" => "Erro ao cadastrar Status");
    echo json_encode($msg);
}

//CREATE TABLE IF NOT EXISTS tbl_tipos_procedimentos(
//    id_tipos_procedimento INT AUTO_INCREMENT PRIMARY KEY,
//    descricao_procedimento VARCHAR(50) 
//);


?>