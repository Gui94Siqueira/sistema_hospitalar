<?php

class modelFuncionarios
{
    public function listarFuncionarios()
    {
        try {
            $pdo = Database::conexao();
            $listar = $pdo->query("SELECT * FROM tbl_funcionarios");
            $retorno = $listar->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function cadastrarFuncionaro($nome, $sobrenome, $id_cargo, $id_status)
    {
        try {
            $nome = htmlspecialchars($nome, ENT_QUOTES);
            $sobrenome = htmlspecialchars($sobrenome, ENT_QUOTES);
            $id_status = filter_var($id_status, FILTER_SANITIZE_NUMBER_INT);
            $id_cargo = filter_var($id_cargo, FILTER_SANITIZE_NUMBER_INT);
            
            $pdo = Database::conexao();

            $cadastrar = $pdo->prepare("INSERT INTO tbl_funcionarios (nome, sobrenome, id_cargo, id_status)
                                            VALUES (:nome, :sobrenome, :id_cargo, :id_status)");
            $cadastrar->bindParam(':nome', $nome);
            $cadastrar->bindParam(':sobrenome', $sobrenome);
            $cadastrar->bindParam(':id_cargo', $id_cargo);
            $cadastrar->bindParam(':id_status', $id_status);
            $cadastrar->execute();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function atualizarFunionario($nome, $sobrenome, $id_cargo, $id_status, $id_funcionario)
    {
        try {
            $nome = htmlspecialchars($nome, ENT_QUOTES);
            $sobrenome = htmlspecialchars($sobrenome, ENT_QUOTES);
            $id_status = filter_var($id_status, FILTER_SANITIZE_NUMBER_INT);
            $id_cargo = filter_var($id_cargo, FILTER_SANITIZE_NUMBER_INT);
            $id_funcionario = filter_var($id_funcionario, FILTER_SANITIZE_NUMBER_INT);

            $pdo = Database::conexao();
            $atualizar = $pdo->prepare("UPDATE tbl_funcionarios SET nome = :nome, sobrenome = :sobrenome, id_cargo = :id_cargo, id_status = :id_status WHERE id_funcionario = :id_funcionario");

            $atualizar->bindParam(':nome', $nome);
            $atualizar->bindParam(':sobrenome', $sobrenome);
            $atualizar->bindParam(':id_cargo', $id_cargo);
            $atualizar->bindParam(':id_status', $id_status);
            $atualizar->bindParam(':id_funcionario', $id_funcionario);
            $atualizar->execute();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
