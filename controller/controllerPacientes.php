<?php

class controllerPacientes {

    public function listarPacientes() {
        try {
            $modelPacientes = new modelPacientes();
            return $modelPacientes->listarPacientes();
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function cadastrarPaciente($nome, $sobrenome, $email, $cep, $logradouro,
                                        $numero, $bairro, $cidade, $uf){
        try {
            $modelPacientes = new modelPacientes();
            return $modelPacientes->cadastrarPaciente($nome, $sobrenome, $email, $cep, $logradouro,
                                                        $numero, $bairro, $cidade, $uf);
        } catch (PDOException $e) {
            return false;
        }
    }
}
