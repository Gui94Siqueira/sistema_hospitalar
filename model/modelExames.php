<?php

    class modelExames {
        public function listarExames() {
            try {
                $pdo = Database::conexao();
                $listar = $pdo->query("SELECT * FROM tbl_exames");

                $resultado = $listar->fetchAll(PDO::FETCH_ASSOC);

                return $resultado;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function cadastrarExame($prontuarioId, $funcionario_solicitante, $procedimento_id) {
            try {
                $pdo = Database::conexao();
                $sql = "INSERT INTO tbl_exames (prontuarioId, funcionario_solicitante, procedimentos_id, data_solicitacao) VALUES (:prontuarioId, :funcionario_solicitante, :proncedimento_id, now())";
                $cadastrar = $pdo->prepare($sql);
                $cadastrar->bindParam(':prontuarioId', $prontuarioId);
                $cadastrar->bindParam(':funcionario_solicitante', $funcionario_solicitante);
                $cadastrar->bindParam(':procedimento_id', $procedimento_id);

                $cadastrar->execute();

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function updateExame($prontuarioId, $funcionario_solicitante, $procedimento_id, $id_exame) {
            try {
                $pdo = Database::conexao();
                $sql = "UPDATE tbl_exame SET prontuarioId = :prontuarioId, funcionario_solicitante = :funcionario_solicitante, procedimento_id = :procedimento_id, data_solicitacao = now(), WHERE id_exame = :id_exame";
                $atualizar = $pdo->prepare($sql);
                $atualizar->bindParam(':prontuarioId', $prontuarioId);
                $atualizar->bindParam(':funcionario_solicitante', $funcionario_solicitante);
                $atualizar->bindParam(':procedimento_id', $procedimento_id);
                $atualizar->bindParam(':id_exame', $id_exame);

                $atualizar->execute();

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }

?>