<?php

    class modalProcedimentos_exame {
        public function listarProcedimentos_exame() {
            try {
                $pdo =Database::conexao();
                $listar = $pdo->query("SELECT * FROM tbl_procedimento_exame");

                $resultado = $listar->fetchAll(PDO::FETCH_ASSOC);

                return $resultado;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function cadastrarProcedimentos_exame($id_tipo_procedimento) {
            try {
                $pdo = Database::conexao();
                $cadastrar = $pdo->prepare("INSERT INTO tbl_procedimentos_exame (id_tipos_procedimento) VALUES (:id_tipo_procedimento)");
                $cadastrar->bindParam(':id_tipo_procedimento', $id_tipo_procedimento);
                $cadastrar->execute();

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function updateProcedimento_exame($id_tipos_procedimento, $id_procedimentos_exame) {
            try {
                $pdo = Database::conexao();
                $atualizar = $pdo->prepare("UPDATE tbl_procedimentos_exame SET id_tipos_procedimento = :id_tipos_procedimento WHERE id_procedimento_exame = :id_procedimento_exame");

                $atualizar->bindParam(':id_tipos_procedimento', $id_tipos_procedimento);
                $atualizar->bindParam(':id_procedimento_exame', $id_procedimento_exame);

                $atualizar->execute();

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }
?>