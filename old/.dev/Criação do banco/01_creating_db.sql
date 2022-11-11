create database mydb
default character set utf8
default collate utf8_general_ci;

use mydb;

create table cadastro_animal (
c_id int not null auto_increment,
c_nomeanimal varchar (250),
c_foto varchar (250),
c_descricao text,
c_usuario int,
c_raca int,
c_tamanho int,
c_situiacao int,
c_data datetime,
c_finalizado int,
primary key (c_id)
) default charset utf8;

create table cadastro_situacao (
s_id int not null,
s_nome varchar (250),
primary key (s_id)
) default charset utf8;

create table cadastro_raca (
r_id int not null,
r_nome varchar (250),
primary key (r_id)
) default charset utf8;

create table cadastro_tamanho (
t_id int not null,
t_nome varchar (250),
primary key (t_id)
) default charset utf8;

create table cadastro_parcerias (
p_id int not null,
p_nome varchar (250),
p_foto varchar (250),
p_link varchar (250),
p_descricao text,
p_usuario int,
primary key (p_id)
) default charset utf8;

create table cadastro_usuario (
u_id int not null,
u_email varchar (250),
u_senha varchar (250),
u_nomecompleto varchar (250),
u_endereco varchar (250),
u_telefone varchar (250),
u_data datetime,
primary key (u_id)
) default charset utf8;

create table cadastro_gerenciador (
g_id int not null,
g_email varchar (250),
g_senha varchar (250),
g_nivel int,
g_nome varchar (250),
primary key (g_id)
) default charset utf8;

create table cadastro_tipo (
t_id int not null,
t_nome varchar (250),
primary key (t_id)
) default charset utf8;
