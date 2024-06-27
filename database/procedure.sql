DELIMITER //

CREATE PROCEDURE cadastrarPaciente(
IN nome VARCHAR(30), 
IN sobrenome VARCHAR(30),
IN email VARCHAR(150),
IN cep INT,
IN logradouro VARCHAR(150),
IN numero INT,
IN bairro VARCHAR(50),
IN cidade VARCHAR(100),
IN uf VARCHAR(2) 
)
BEGIN
	#Criando variavel para armazenar ID do prontuario criado
    DECLARE id INT DEFAULT 0;
    
    #Criando o prontuario
    INSERT INTO tbl_prontuarios (data_cadastro) VALUES (now());
    
    #Buscando e armazenando o ID desta Criação
    SET id = (SELECT LAST_INSERT_ID());
    
    INSERT INTO tbl_pacientes (id_prontuario, id_status, nome, sobrenome, email, cep, logradouro, numero, bairro, cidade, uf) 
    VALUES (id, 1, nome, sobrenome, email, cep, logradouro, numero, bairro, cidade, uf);
END
//

DELIMITER ;