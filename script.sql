
create schema cadastro default charset utf8;

use cadastro;

create table usuario(
	id int not null primary key auto_increment,
    nome VARCHAR(50) not null,
    email VARCHAR(80) not null, 
    senha VARCHAR(30) not null
); 
select * from usuario;

create table filme(
	id int not null primary key auto_increment,
    nome VARCHAR(100) not null
);

create table comentar(
	idFilme int not null,
    idUsuario int not null,
    coment varchar(250),
    primary key(idFilme, idUsuario),
    foreign key(idFilme) references filme(id),
    foreign key(idUsuario) references usuario(id)
);

insert into filme(nome)
	value('Justice League');

