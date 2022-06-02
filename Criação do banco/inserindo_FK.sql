alter table cadastro_raca 
add column r_tipos int;

alter table cadastro_animal
add column id_cor int;

create table cadastro_cor (
c_id int,
c_cor varchar (250),
primary key (c_id)
) default charset = utf8;

alter table cadastro_parcerias
add foreign key (p_usuario)
references cadastro_usuario (u_id);

alter table cadastro_animal
drop column c_situiacao;

alter table cadastro_animal
add column c_situacao int;

alter table cadastro_animal
add foreign key (c_usuario)
references cadastro_usuario (u_id),
add foreign key (c_raca)
references cadastro_raca (r_id),
add foreign key (c_tamanho)
references cadastro_tamanho (t_id),
add foreign key (c_situacao)
references cadastro_situacao (s_id);

alter table cadastro_raca
add foreign key (r_tipos)
references cadastro_tipo (t_id);
