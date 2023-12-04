/*Banco de dados - Vidda*/

create database db_vidda;
use db_vidda;

create table tb_paciente ( 
    id_paciente int auto_increment, 
    nome_paciente varchar(50) not null, 
    sexo_paciente enum("F","M","Outro") not null, 
    email_paciente varchar(255) unique not null, 
    telefone_paciente char(11) not null, 
    senha_paciente varchar(6) not null, 
    data_nascimento_paciente date not null,
    cpf_paciente char(11) unique not null, 
    constraint pk_id_paciente primary key (id_paciente)
);

create table tb_login_paciente(
    id_login_paciente int auto_increment,
    email_login_paciente varchar(255) unique not null,
    senha_login_paciente varchar(6) not null,
    constraint pk_id_login_paciente primary key (id_login_paciente)
);

CREATE TRIGGER trigger_insere_login_paciente
AFTER INSERT ON tb_paciente
FOR EACH ROW
INSERT INTO tb_login_paciente (email_login_paciente, senha_login_paciente )
VALUES (NEW.email_paciente, NEW.senha_paciente);

create table tb_especialista (
	id_especialista int auto_increment,
    nome_especialista varchar(50) not null,
    sexo_especialista enum("F","M","Outro") not null,
    email_especialista varchar(255) unique not null,
    especialidade_especialista enum("Nutrição","Serviço social","Psicologia","Neurologia","Educação física","Pedagogia","Fonoaudiologia","Enfermagem") not null,
    registro_especialista char(6) unique,
    senha_especialista varchar(6) CHECK (senha_especialista REGEXP '^[0-9]{6}$'),
    cpf_especialista char(11) unique not null,
    constraint pk_id_especialista primary key (id_especialista)
);

create table tb_login_especialista(
    id_login_especialista int auto_increment,
    email_especialista varchar(255) unique not null,
    senha_especialista varchar(6) not null,
    constraint pk_id_login_especialista primary key (id_login_especialista)
)

CREATE TRIGGER trigger_insere_login_especialista
AFTER INSERT ON tb_especialista
FOR EACH ROW
INSERT INTO login (email_login_especialista, senha_login_especialista)
VALUES (NEW.email_especialista, NEW.senha_especialista);

create table tb_consulta (
	id_consulta int auto_increment,
    localizacao_consulta varchar(100) not null default "Online",
    data_consulta datetime not null,
    id_paciente int not null,
    id_especialista int not null,
    constraint pk_id_consulta primary key (id_consulta),
    constraint fk_id_paciente foreign key (id_paciente) references tb_paciente (id_paciente),
    constraint fk_id_especialista foreign key (id_especialista) references tb_especialista (id_especialista)
);

create table tb_prescricao (
	id_prescricao int auto_increment,
    descricao_prescricao varchar(500) not null,
    validade_prescricao date not null,
    id_consulta int not null,
    constraint pk_id_prescricao primary key (id_prescricao),
    constraint fk_id_consulta foreign key (id_consulta) references tb_consulta (id_consulta)
);

