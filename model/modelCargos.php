<?php

class modelCargos
{
    public function listarCargos()
    {
        try {
            $pdo = Database::conexao();
            $listar = $pdo->query("SELECT * FROM tbl_cargos");

            $retorno = $listar->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function cadastrarCargo($descricao_cargo)
    {
        try {
            $descricao_cargo_filter = htmlspecialchars($descricao_cargo, ENT_QUOTES);

            $pdo = Database::conexao();
            $cadastrar = $pdo->prepare("INSERT INTO tbl_cargos (descricao_cargo) VALUES (':descricao_cargo')");

            $cadastrar->bindParam(':descricao_cargo', $descricao_cargo_filter);
            $cadastrar->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarCargo($id_cargo, $descricao_cargo)
    {
        try {
            $id_cargo_filter = filter_var($id_cargo, FILTER_SANITIZE_NUMBER_INT);
            $descricao_cargo_filter = htmlspecialchars($descricao_cargo, ENT_QUOTES);

            $pdo = Database::conexao();
            $atualizar = $pdo->prepare("UPDATE tbl_cargos SET descricao_cargo = :descricao_cargo WHERE id_cargo = :id_cargo");

            $atualizar->bindParam(':descricao_cargo', $descricao_cargo_filter);
            $atualizar->bindParam('id_cargo', $id_cargo_filter);

            $atualizar->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
