<?php

require_once 'controller/controllerProcedimentos_exame.php';

class RouteProcedimentos_exame
{
    public static function handleRequest($action)
    {
        switch ($action) {
            case 'listar':
                self::listarProcedimentos_exame();
                break;

            case 'cadastrar':
                self::cadastrarProcedimentos_exame();
                break;

            case 'atualizar':
                self::updateProcedimento_exame();
                break;

            default:
                http_response_code(400); // Requisição inválida
                echo json_encode(['error' => 'Ação inválida']);
                break;
        }
    }

    public static function listarProcedimentos_exame()
    {
        $controllerProcedimentos_exame = new controllerProcedimento_exame();
        $retorno =  $controllerProcedimentos_exame->listarProcedimentos_exame();
        echo json_encode(['success' => $retorno]);
    }



    public static function cadastrarProcedimentos_exame()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $id_tipos_procedimento = $data['id_tipos_procedimento'];
        
            $controllerProcedimentos_exame = new controllerProcedimento_exame();
            $retorno = $controllerProcedimentos_exame->cadastrarProcedimentos_exame($id_tipos_procedimento);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

    public static function  updateProcedimento_exame()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));

            $id_tipos_procedimento = $data['id_tipos_procedimento'];
            $id_procedimentos_exame = $data['id_procedimentos_exame'];
        
            $controllerProcedimentos_exame = new controllerProcedimento_exame();
            $retorno =  $controllerProcedimentos_exame-> updateProcedimento_exame($id_tipos_procedimento, $id_procedimentos_exame);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

}
