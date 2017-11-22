
create schema cadastro default charset utf8;

use cadastro;

create table usuario(
	id int not null primary key auto_increment,
    nome VARCHAR(50) not null,
    email VARCHAR(80) not null, 
    senha VARCHAR(30) not null
); 
select * from usuario;


