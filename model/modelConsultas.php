<?php

    class modelConsultas {
        public function listarConsultas() {
            try {
                $pdo = Database::conexao();
                $listar = $pdo->query("SELECT * FROM tbl_consultas");
                $retorno = $listar->fetchAll(PDO::FETCH_ASSOC);

                return $retorno;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function cadastrarConsulta($prontuario_id, $funcionario_id, $detalhes){
            try {
                $pdo = Database::conexao();
                $cadastrar = $pdo->prepare("INSERT INTO tbl_consultas (prontuario_id, funcionario_id, detalhes) VALUES (:prontuario_id, :funcionario_id, :detalhes)");
                
                $cadastrar->bindParam(':prontuario_id', $prontuario_id);
                $cadastrar->bindParam(':funcionario_id', $funcionario_id);
                $cadastrar->bindParam(':detalhes', $detalhes);

                $cadastrar->execute();

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function atualizarConsulta($prontuario_id, $funcionario_id, $detalhes, $id_consulta) {
            try {
                $pdo = Database::conexao();
                $cadastrar = $pdo->prepare("UPDATE tbl_consultas SET prontuario_id = :prontuario_id, funcionario_id = :funcionario_id, detalhes = :detalhes WHERE id_consulta = :id_consulta");

                $cadastrar->bindParam(':prontuario_id', $prontuario_id);
                $cadastrar->bindParam(':funcionario_id', $funcionario_id);
                $cadastrar->bindParam(':detalhes', $detalhes);
                $cadastrar->bindParam(':id_consulta', $id_consulta);


                $cadastrar->execute();

                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }
?>