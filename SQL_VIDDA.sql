/*Banco de dados - Vidda*/

create database db_vidda;
use db_vidda;

/*create table tb_paciente (
	id_paciente int auto_increment,
    nome_paciente varchar(80) not null,
    cpf_paciente char(11) unique not null,
    sexo_paciente enum("F","M") not null,
    data_nascimento_paciente datetime not null,
    email_paciente varchar(100) not null,
    telefone_paciente char(11) not null,
    nome_responsavel_paciente varchar(80),
    constraint pk_id_paciente primary key (id_paciente)
);*/

create table tb_paciente ( 
    id_paciente int auto_increment, 
    nome_paciente varchar(80) not null, 
    sexo_paciente enum("F","M") not null, 
    email_paciente varchar(255) not null, 
    telefone_paciente char(11) not null, 
    data_nascimento_paciente date not null, 
    senha_paciente varchar(6) CHECK (senha_paciente REGEXP '^[0-9]{6}$'), 
    cpf_paciente char(11) unique not null, 
    constraint pk_id_paciente primary key (id_paciente) 
);

/*
create table tb_especialista (
	id_especialista int auto_increment,
    nome_especialista varchar(80) not null,
    cpf_especialista char(11) unique not null,
    sexo_especialista enum("F","M") not null,
    registro_especialista char(6) unique,
    constraint pk_id_especialista primary key (id_especialista)
);*/

create table tb_especialista (
	id_especialista int auto_increment,
    nome_especialista varchar(80) not null,
    sexo_especialista enum("F","M") not null,
    email_especialista varchar(255) not null,
    especialidade_especialista enum("Nutrição","Serviço social","Psicologia","Neurologia","Educação física","Pedagogia","Fonoaudiologia","Enfermagem") not null,
    registro_especialista char(6) unique,
    senha_especialista varchar(6) CHECK (senha_especialista REGEXP '^[0-9]{6}$'),
    cpf_especialista char(11) unique not null,
    constraint pk_id_especialista primary key (id_especialista)
);

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

