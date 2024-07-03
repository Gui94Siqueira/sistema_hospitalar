<?php

require_once 'controller/controllerPacientes.php';

class RoutePacientes
{
    public static function handleRequest($action)
    {
        switch ($action) {
            case 'listar':
                self::listarPacientes();
                break;

            case 'cadastrar':
                self::cadastraPaciente();
                break;

            default:
                http_response_code(400); // Requisição inválida
                echo json_encode(['error' => 'Ação inválida']);
                break;
        }
    }

    public static function listarPacientes()
    {
        $modelPacientes = new modelPacientes();
        $retorno = $modelPacientes->listarPacientes();
        echo json_encode(['success' => $retorno]);
    }



    public static function cadastraPaciente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            $nome = $data['nome'];
            $sobrenome = $data['sobrenome'];
            $email = $data['email'];
            $cep = $data['cep'];
            $logradouro = $data['logradouro'];
            $numero = $data['numero'];
            $bairro = $data['bairro'];
            $cidade = $data['cidade'];
            $uf = $data['uf'];

            $modelPacientes = new modelPacientes();
            $retorno = $modelPacientes->cadastrarPaciente($nome, $sobrenome, $email, $cep, $logradouro, $numero, $bairro, $cidade, $uf);

            echo json_encode(['success' => $retorno]);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Ação inválida']);
        }
    }

}
