<?php

    class controllerConsultas {
        public function listarConsultas() {
            try {
                $modelConsultas = new modelConsultas();
                return $modelConsultas->listarConsultas();
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function cadastrarConsulta($prontuario_id, $funcionario_id, $detalhes) {
            try {
                $modelConsultas = new modelConsultas();
                return $modelConsultas->cadastrarConsulta($prontuario_id, $funcionario_id, $detalhes);
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function atualizarConsulta($prontuario_id, $funcionario_id, $detalhes, $id_consulta) {
            try {
                $modelConsultas = new modelConsultas();
                return $modelConsultas->atualizarConsulta($prontuario_id, $funcionario_id, $detalhes, $id_consulta);
            } catch (\Throwable $th) {
                return false;
            }
        }
    }

?>