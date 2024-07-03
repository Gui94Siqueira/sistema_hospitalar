<?php

require_once 'controller/controller_tipos_procedimentos.php';

class RouteTipo_Procedimentos
{
    public static function handleRequest($action)
    {
        switch ($action) {
            case 'listar':
                self::listarProcedimentos();
                break;

            case 'cadastrar':
                self::cadastrarProcedimento();
                break;

            case 'atualizar':
                self::atualizarProcedimento();
                break;

            default:
                http_response_code(400); // Requisição inválida
                echo json_encode(['error' => 'Ação inválida']);
                break;
        }
    }

    public static function listarProcedimentos()
    {
        $modelProcedimentos = new modelProcedimentos();
        $retorno = $modelProcedimentos->listarProcedimentos(); 
        echo json_encode(['success' => $retorno]);
    }



    public static function cadastrarProcedimento()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $descricao_procedimento = $data['descricao_procedimento'];
        
            $modelProcedimentos = new modelProcedimentos();
            $retorno = $modelProcedimentos->cadastarProcedimento($descricao_procedimento);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

    public static function atualizarProcedimento()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $descricao_procedimento = $data['descricao_procedimento'];
            $id_tipos_procedimento = $data['id_tipos_procedimento'];
         
            $modelProcedimentos = new modelProcedimentos();
            $retorno = $modelProcedimentos->atualizarProcedimento($descricao_procedimento, $id_tipos_procedimento);

            echo json_encode(['success' => $retorno]);

        } else {
            http_response_code(405);
        }
    }

}
