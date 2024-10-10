create database Usuario;
use Usuario;

create table cadastro(
    id_usuario int not null auto_increment, 
    nome varchar(255) not null,
    email varchar(255) not null,
    senha char(18) not null,

    primary key(id_usuario)
);

