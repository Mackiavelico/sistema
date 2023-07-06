create database intranet;

use intranet;

create table perfil
(codigo int primary key,
descripcion varchar(20));


create table usuario
(rut varchar(20) primary key,
nombres varchar(20),
apellido_p varchar(20),
apellido_m varchar(20),
direccion varchar(20),
telefono varchar(20),
clave varchar(20),
codigo_perfil int,
FOREIGN KEY (codigo_perfil) REFERENCES perfil(codigo));

insert into perfil (codigo, descripcion) values (1, 'Administrador');
insert into perfil (codigo, descripcion) values (2, 'Usuario');


insert into usuario (rut, nombres, apellido_p, apellido_m, direccion, telefono, clave, codigo_perfil) values ('123-4', 'Jose Miguel', 'Montecinos', 'Gonzalez', 'istria 1550', '912345678', '123', 1);
insert into usuario (rut, nombres, apellido_p, apellido_m, direccion, telefono, clave, codigo_perfil) values ('456-7', 'Usuario Normal', 'Mont', 'Gonz', 'Perez 123', '911111222', '456', 2);


select * from usuario;
select * from perfil;

drop table usuario;
drop table perfil;

