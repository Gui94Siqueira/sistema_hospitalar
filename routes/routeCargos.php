<?php

require_once 'controller/controllerCargos.php';
require_once 'model/modelCargos.php';
require_once 'services/conexao.php';

class RouteCargos
{
    public static function handleRequest($action)
    {
        switch ($action) {
            case 'listar':
                self::listarCargos();
                break;

            case 'cadastrar':
                self::cadastrarCargo();
                break;

            case 'atualizar':
                self::updateCargo();
                break;

            default:
                http_response_code(400); // Requisição inválida
                echo json_encode(['error' => 'Ação inválida']);
                break;
        }
    }

    public static function listarCargos()
    {
        $controllerCargos = new controllerCargos();
        $retorno = $controllerCargos->listarCargos();
        echo json_encode(['success' => $retorno]);
    }



    public static function cadastrarCargo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $descricao_cargo = $data['descricao_cargo'];
        
            $controllerCargos = new controllerCargos();
            $retorno = $controllerCargos->cadastrarCargo($descricao_cargo);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

    public static function updateCargo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $descricao_cargo = $data['descricao_cargo'];
            $id_cargo = $data['id_cargo'];
        
            $controllerCargos = new controllerCargos();
            $retorno = $controllerCargos->atualizarCargo($id_cargo, $descricao_cargo);

            echo json_encode(['success' => $retorno]);

        } else {
            http_response_code(405);
        }
    }

}
