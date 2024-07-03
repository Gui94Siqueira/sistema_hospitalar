<?php
class modelProcedimentos {
    
    public function listarProcedimentos() {
        try {
            $pdo = Database::conexao();
            $consulta = $pdo->query("SELECT * FROM tbl_tipos_procedimentos");
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;            
        } catch (PDOException $e) {
            return false;
        }
    }

    public function cadastarProcedimento($descricao_procedimento) {
        try {
            $pdo = Database::conexao();
            $cadastrar = $pdo->prepare("INSERT INTO tbl_tipos_procedimentos (descricao_procedimento) VALUES (:descricao_procedimento)");
            $cadastrar->bindParam(":descricao_procedimento", $descricao_procedimento);

            $cadastrar->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarProcedimento($descricao_procedimento, $id_tipos_procedimento) {
        try {
            $pdo = Database::conexao();
            $atualizar = $pdo->prepare("UPDATE tbl_tipos_procedimentos SET descricao_procedimento=:descricao_procedimento WHERE id_tipos_procedimento=:id_tipos_procedimento");
            $atualizar->bindParam(":descricao_procedimento", $descricao_procedimento);
            $atualizar->bindParam(":id_tipos_procedimento", $id_tipos_procedimento);
            $atualizar->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

//CREATE TABLE IF NOT EXISTS tbl_tipos_procedimentos(
//    id_tipos_procedimento INT AUTO_INCREMENT PRIMARY KEY,
//    descricao_procedimento VARCHAR(50) 
//);
?>
