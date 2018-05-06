
CREATE TABLE tb_regioes (
                codigo INT NOT NULL,
                descricao VARCHAR(50) NOT NULL,
                PRIMARY KEY (codigo)
);


CREATE TABLE tb_territorios (
                codigo INT NOT NULL,
                descricao VARCHAR(50) NOT NULL,
                codigo_regiao INT NOT NULL,
                PRIMARY KEY (codigo)
);


CREATE TABLE tb_funcionarios (
                codigo BIGINT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                sobrenome VARCHAR(100) NOT NULL,
                titulo VARCHAR(50) NOT NULL,
                cortesia VARCHAR(20) NOT NULL,
                endereco VARCHAR(100) NOT NULL,
                pais VARCHAR(50) NOT NULL,
                cidade VARCHAR(50) NOT NULL,
                cep CHAR(8) NOT NULL,
                fone VARCHAR(15) NOT NULL,
                regiao VARCHAR(15) NOT NULL,
                PRIMARY KEY (codigo)
);


CREATE TABLE tb_funcionario_territorio (
                codigo_territorio INT NOT NULL,
                codigo_funcionario BIGINT NOT NULL,
                PRIMARY KEY (codigo_territorio, codigo_funcionario)
);


ALTER TABLE tb_territorios ADD CONSTRAINT tb_regioes_tb_territorios_fk
FOREIGN KEY (codigo_regiao)
REFERENCES tb_regioes (codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tb_funcionario_territorio ADD CONSTRAINT tb_territorios_tb_funcionario_territorio_fk
FOREIGN KEY (codigo_territorio)
REFERENCES tb_territorios (codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tb_funcionario_territorio ADD CONSTRAINT tb_funcionarios_tb_funcionario_territorio_fk
FOREIGN KEY (codigo_funcionario)
REFERENCES tb_funcionarios (codigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION;