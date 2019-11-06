use TPSIP1118_recrutamento
go

CREATE TABLE Sexo (
	id_sexo integer Primary Key,
	valor_sexo varchar(50)
	)
GO

INSERT INTO Sexo VALUES
	(1, 'feminino'),
	(2, 'masculino')
GO

CREATE TABLE Estado_Inscricao (
	id_estado_inscricao integer Primary Key,
	valor_estado_inscricao varchar (50)
	)
GO

CREATE TABLE Situacao_Desemprego (
	id_situacao_desemprego integer Primary Key,
	valor_situacao_desemprego varchar(50)
	)
GO

CREATE TABLE Habilitacoes_Literarias (
	id_habilitacoes_literarias integer Primary Key,
	valor_habilitacoes_literarias varchar(50)
	)
GO

CREATE TABLE Distrito (
	id_distrito integer Primary Key,
	valor_distrito varchar(50)
	)
GO

CREATE TABLE Curso_1a_Opcao (
	id_curso_1a_opcao integer Primary Key,
	valor_curso_1a_opcao varchar(50)
	)
GO

CREATE TABLE Curso_2a_Opcao (
	id_curso_2a_opcao integer Primary Key,
	valor_curso_2a_opcao varchar(50)
	)
GO

--CREATE TABLE Inventario_Vocacional (
--	id_candidato integer



CREATE TABLE Testes_Psicotecnicos (
	id_candidato varchar(20),
	data datetime,
	resultado1 integer,
	resultado2 integer,
	resultado3 integer,
	resultado4 integer
	)
GO

CREATE TABLE Assistente_Formacao (
	id_assistente_formacao varchar(50),
	nome_assistente_formacao varchar(100)
	)
GO

CREATE TABLE Estado_Turma (
	id_estado_turma varchar(20),
	valor_estado_turma varchar(20)
	)
GO

CREATE TABLE Turma_RS (
	id_turma varchar (20),
	id_assistente_formacao varchar(50),
	id_estado_turma varchar(20)

	)
GO



CREATE TABLE Entrevistador (
	id_entrevistador varchar(20),
	nome_entrevistador varchar(100)
	)
GO



