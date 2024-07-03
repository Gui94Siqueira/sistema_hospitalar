<?php

require_once 'controller/controllerExames.php';
require_once 'model/modelExames.php';
require_once 'services/conexao.php';

class RouteExames
{
    public static function handleRequest($action)
    {
        switch ($action) {
            case 'listar':
                self::listarExames();
                break;

            case 'cadastrar':
                self::cadastrarExame();
                break;

            case 'atualizar':
                self::updateExame();
                break;

            default:
                http_response_code(400); // Requisição inválida
                echo json_encode(['error' => 'Ação inválida']);
                break;
        }
    }

    public static function listarExames()
    {
        $controllerExames = new controllerExames();
        $retorno = $controllerExames->listarExames();
        echo json_encode(['success' => $retorno]);
    }



    public static function cadastrarExame()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $prontuarioId = $data['prontuarioId'];
            $funcionario_solicitante = $data['funcionario_solicitante'];
            $procedimento_id = $data['procedimento_id'];

            $controllerExames = new controllerExames();
            $retorno = $controllerExames->cadastrarExame($prontuarioId, $funcionario_solicitante, $procedimento_id);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

    public static function updateExame()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $prontuarioId = $data['prontuarioId'];
            $funcionario_solicitante = $data['funcionario_solicitante'];
            $procedimento_id = $data['procedimento_id'];
            $id_exame = $data['id_exame'];

            $controllerExames = new controllerExames();
            $retorno = $controllerExames->updateExame($prontuarioId, $funcionario_solicitante, $procedimento_id, $id_exame);

            echo json_encode(['success' => $retorno]);

        } else {
            http_response_code(405);
        }
    }

}
