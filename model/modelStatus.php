<?php

class modelStatus{

    public function listarStatus(){
        try {
            $pdo = Database::conexao();
            $consulta = $pdo->query("SELECT * FROM tbl_status");
            $lista = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function cadastrarStatus($descricao) {
        try {

            $descricao_filtro = htmlspecialchars($descricao, ENT_QUOTES);

            $pdo = Database::conexao();
            $cadastrar = $pdo->prepare("INSERT INTO tbl_status(descricao) VALUES (:descricao)");
            $cadastrar->bindParam(":descricao", $descricao_filtro);

            $cadastrar->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}