<?php
class modelPacientes{

    public function listarPacientes() {
        try {
            $pdo = Database::conexao();
            $listar = $pdo->query("SELECT * FROM tbl_pacientes");
            $resultado = $listar->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (\Throwable $th) {
            return false;
        }
    }


    public function cadastrarPaciente($nome, $sobrenome, $email, $cep, $logradouro,
                                        $numero, $bairro, $cidade, $uf){
        try {
            //$nome = filter_var($nome, FILTER_SANITIZE_STRING);
            $nome = htmlspecialchars($nome, ENT_QUOTES);
            $sobrenome = htmlspecialchars($sobrenome, ENT_QUOTES);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $cep = filter_var($cep, FILTER_SANITIZE_NUMBER_INT);
            $logradouro = htmlspecialchars($logradouro, ENT_QUOTES);
            $numero = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
            $bairro = htmlspecialchars($bairro, ENT_QUOTES);
            $cidade = htmlspecialchars($cidade, ENT_QUOTES);
            $uf = htmlspecialchars($uf, ENT_QUOTES);

            $pdo = Database::conexao();
            $cadastrar = $pdo->prepare("CALL cadastrarPaciente(:nome, :sobrenome, :email, :cep,
                                        :logradouro, :numero, :bairro, :cidade, :uf)");
            $cadastrar->bindParam(":nome", $nome);
            $cadastrar->bindParam(":sobrenome", $sobrenome);
            $cadastrar->bindParam(":email", $email);
            $cadastrar->bindParam(":cep", $cep);
            $cadastrar->bindParam(":logradouro", $logradouro);
            $cadastrar->bindParam(":numero", $numero);
            $cadastrar->bindParam(":bairro", $bairro);
            $cadastrar->bindParam(":cidade", $cidade);
            $cadastrar->bindParam(":uf", $uf);
            $cadastrar->execute();

            return true;

        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
}
?>