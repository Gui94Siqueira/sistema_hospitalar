<?php

    class controllerExames {
        public function listarExames() {
            try {
                $modelExames = new modelExames();
                return $modelExames->listarExames();
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function cadastrarExame($prontuarioId, $funcionario_solicitante, $procedimento_id) {
            try {
                $modelExames = new modelExames();
                return $modelExames->cadastrarExame($prontuarioId, $funcionario_solicitante, $procedimento_id);
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function updateExame($prontuarioId, $funcionario_solicitante, $procedimento_id, $id_exame) {
            try {
                $modelExames = new modelExames();
                return $modelExames->updateExame($prontuarioId, $funcionario_solicitante, $procedimento_id, $id_exame);
            } catch (\Throwable $th) {
                return false;
            }
        }
    }
?>