<?php

require_once 'controller/controllerFuncionarios.php';
require_once 'model/modelFuncionarios.php';
require_once 'services/conexao.php';

class RouteFuncionarios
{
    public static function handleRequest($action)
    {
        switch ($action) {
            case 'listar':
                self::listarFuncionarios();
                break;

            case 'cadastrar':
                self::cadastrarFuncionario();
                break;

            case 'atualizar':
                self::updateFuncionario();
                break;

            default:
                http_response_code(400); // Requisição inválida
                echo json_encode(['error' => 'Ação inválida']);
                break;
        }
    }

    public static function listarFuncionarios()
    {
        $controllerFuncionarios = new controllerFuncionarios();
        $retorno = $controllerFuncionarios->listarFuncionarios();
        echo json_encode(['success' => $retorno]);
    }



    public static function cadastrarFuncionario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $nome = $data['nome'];
            $sobrenome = $data['sobrenome'];
            $id_status = $data['id_status'];
            $id_cargo = $data['id_cargo'];

            $controllerFuncionarios = new controllerFuncionarios();
            $retorno = $controllerFuncionarios->cadastrarFuncionario($nome, $sobrenome, $id_cargo, $id_status);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

    public static function updateFuncionario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $nome = $data['nome'];
            $sobrenome = $data['sobrenome'];
            $id_status = $data['id_status'];
            $id_cargo = $data['id_cargo'];
            $id_funcionario = $data['id_funcionario'];

            $controllerFuncionarios = new controllerFuncionarios();
            $retorno = $controllerFuncionarios->atualizarFunionario($nome, $sobrenome, $id_cargo, $id_status, $id_funcionario);

            echo json_encode(['success' => $retorno]);

        } else {
            http_response_code(405);
        }
    }

}
