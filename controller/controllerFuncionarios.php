<?php

class controllerFuncionarios {

    public function listarFuncionarios() {
        try {
            $modelFuncionarios = new modelFuncionarios();
            return $modelFuncionarios->listarFuncionarios();
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function cadastrarFuncionario($nome, $sobrenome, $id_cargo, $id_status){
        try {
            $modelFuncionarios = new modelFuncionarios();
            return $modelFuncionarios->cadastrarFuncionaro($nome, $sobrenome, $id_cargo, $id_status);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarFunionario($nome, $sobrenome, $id_cargo, $id_status, $id_funcionario){
        try {
            $modelFuncionarios = new modelFuncionarios();
            return $modelFuncionarios->atualizarFunionario($nome, $sobrenome, $id_cargo, $id_status, $id_funcionario);
        } catch (PDOException $e) {
            return false;
        }
    }
}
