<?php

require_once 'controller/controllerStatus.php';
require_once 'model/modelStatus.php';
require_once 'services/conexao.php';

class RouteStatus
{
    public static function handleRequest($action)
    {
        switch ($action) {
            case 'listar':
                self::listarStatus();
                break;

            case 'cadastrar':
                self::cadastrarStatus();
                break;

            default:
                http_response_code(400); // Requisição inválida
                echo json_encode(['error' => 'Ação inválida']);
                break;
        }
    }

    public static function listarStatus()
    {
        $modelStatus = new modelStatus();
        $retorno =  $modelStatus->listarStatus();
        echo json_encode(['success' => $retorno]);
    }



    public static function cadastrarStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $descricao = $data['descricao'];
        
            $modelStatus = new modelStatus();
        $retorno =  $modelStatus->cadastrarStatus($descricao);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

}
