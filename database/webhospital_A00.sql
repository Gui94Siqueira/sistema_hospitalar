CREATE DATABASE IF NOT EXISTS webhospital;

USE webhospital;

CREATE TABLE IF NOT EXISTS tbl_pacientes(
    id_paciente INT AUTO_INCREMENT PRIMARY KEY,
    id_prontuario INT,
    nome VARCHAR(30),
    sobrenome VARCHAR(30),
    email VARCHAR(150),
    cep INT,
    logradouro VARCHAR(150),
    numero INT,
    bairro VARCHAR(50),
    cidade VARCHAR(100),
    uf VARCHAR(2),
    id_status INT,
    CONSTRAINT fk_id_status FOREIGN KEY (id_status) REFERENCES tbl_status(id_status),
    CONSTRAINT fk_id_prontuario FOREIGN KEY (id_prontuario) REFERENCES tbl_prontuarios(id_prontuario)
);

CREATE TABLE IF NOT EXISTS tbl_cargos(
    id_cargo INT AUTO_INCREMENT PRIMARY KEY,
    descricao_cargo VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS tbl_prontuarios(
    id_prontuario INT AUTO_INCREMENT PRIMARY KEY,
    data_cadastro DATETIME
);

CREATE TABLE IF NOT EXISTS tbl_status(
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS tbl_funcionarios(
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30),
    sobrenome VARCHAR(30),
    id_cargo INT,
    id_status INT,
    CONSTRAINT fk_id_cargo FOREIGN KEY (id_cargo) REFERENCES tbl_cargos(id_cargo),
    CONSTRAINT fk_id_status FOREIGN KEY (id_status) REFERENCES tbl_status(id_status)
);


CREATE TABLE IF NOT EXISTS tbl_consultas(
    id_consulta  INT AUTO_INCREMENT PRIMARY KEY,
    prontuario_id INT,
    funcionario_id INT,
    CONSTRAINT fk_prontuario_id FOREIGN KEY (prontuario_id) REFERENCES tbl_prontuarios(id_prontuario),
    CONSTRAINT fk_funcionario_id FOREIGN KEY (funcionario_id) REFERENCES tbl_funcionarios(id_funcionario),
    detalhes VARCHAR(255)
);


CREATE TABLE IF NOT EXISTS tbl_procedimentos_exame(
    id_procedimentos_exame INT AUTO_INCREMENT PRIMARY KEY,
    id_tipos_procedimento INT,
    CONSTRAINT fk_id_tipos_procedimento FOREIGN KEY (id_tipos_procedimento) REFERENCES tbl_tipos_procedimentos(id_tipos_procedimento)
);

CREATE TABLE IF NOT EXISTS tbl_tipos_procedimentos(
    id_tipos_procedimento INT AUTO_INCREMENT PRIMARY KEY,
    descricao_procedimento VARCHAR(50) 
);

CREATE TABLE IF NOT EXISTS tbl_exames (
    id_exame INT AUTO_INCREMENT PRIMARY KEY,
    prontuarioId INT,
    funcionario_solicitante INT,
    procedimentos_id INT,
    CONSTRAINT fk_prontuarioId FOREIGN KEY (prontuarioId) REFERENCES tbl_prontuarios(id_prontuario),
    CONSTRAINT fk_funcionario_solicitante FOREIGN KEY (funcionario_solicitante) REFERENCES tbl_funcionarios(id_funcionario),
    CONSTRAINT fk_procedimentos_id FOREIGN KEY (procedimentos_id) REFERENCES tbl_tipos_procedimentos(id_tipos_procedimento),
    data_solicitacao DATETIME


);

