<?php

require_once 'controller/controllerConsultas.php';
require_once 'model/modelConsultas.php';
require_once 'services/conexao.php';

class RouteConsultas
{
    public static function handleRequest($action)
    {
        switch ($action) {
            case 'listar':
                self::listarConsultas();
                break;

            case 'cadastrar':
                self::cadastrarConsulta();
                break;

            case 'atualizar':
                self::atualizarConsulta();
                break;

            default:
                http_response_code(400); // Requisição inválida
                echo json_encode(['error' => 'Ação inválida']);
                break;
        }
    }

    public static function listarConsultas()
    {
        $controllerConsultas = new controllerConsultas();
        $retorno = $controllerConsultas->listarConsultas();
        echo json_encode(['success' => $retorno]);
    }



    public static function cadastrarConsulta()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $prontuario_id = $data['prontuario_id'];
            $funcionario_id = $data['funcionario_id'];
            $detalhes = $data['detalhes'];
        
            $controllerConsultas = new controllerConsultas();
            $retorno = $controllerConsultas->cadastrarConsulta($prontuario_id, $funcionario_id, $detalhes);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

    public static function atualizarConsulta()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $prontuario_id = $data['prontuario_id'];
            $funcionario_id = $data['funcionario_id'];
            $detalhes = $data['detalhes'];
            $id_consulta = $data['id_consulta'];
        
            $controllerConsultas = new controllerConsultas();
            $retorno = $controllerConsultas->atualizarConsulta($prontuario_id, $funcionario_id, $detalhes, $id_consulta);

            echo json_encode(['success' => $retorno]);

        } else {
            http_response_code(405);
        }
    }

}
