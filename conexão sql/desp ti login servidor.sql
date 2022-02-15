CREATE DATABASE desp;

use desp;

create table usuarios(
   id_usuario INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
   nome varchar (30),
   telefone varchar(30),
   email varchar(40),
   senha varchar(32)
);
