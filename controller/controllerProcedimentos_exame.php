<?php

    class controllerProcedimento_exame {
        public function listarProcedimentos_exame() {
            try {
                $modelProcedimentos_exame = new modalProcedimentos_exame();
                return $modelProcedimentos_exame->listarProcedimentos_exame();
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function cadastrarProcedimentos_exame($id_tipo_procedimento) {
            try {
                $modelProcedimentos_exame = new modalProcedimentos_exame();
                return $modelProcedimentos_exame->cadastrarProcedimentos_exame($id_tipo_procedimento);
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function updateProcedimento_exame($id_tipos_procedimento, $id_procedimentos_exame) {
            try {
                $modelProcedimentos_exame = new modalProcedimentos_exame();
                return $modelProcedimentos_exame->updateProcedimento_exame($id_tipos_procedimento, $id_procedimentos_exame);
            } catch (\Throwable $th) {
                return false;
            }
        }

    }

?>