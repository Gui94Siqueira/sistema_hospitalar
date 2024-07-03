<?php
include_once ("model/modelCargos.php");
class controllerCargos {

    public function listarCargos() {
        try {
            $modelCargos = new modelCargos();
            return $modelCargos->listarCargos();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function cadastrarCargo($descricao_cargo) {
        try {
            $modelCargos = new modelCargos();
            return $modelCargos->CadastrarCargo($descricao_cargo);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarCargo($id_cargo, $descricao_cargo) {
        try {
            $modelCargos = new modelCargos();
            return $modelCargos->atualizarCargo($id_cargo, $descricao_cargo);
        } catch (PDOException $e) {
            return false;
        }
    }
}