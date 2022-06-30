use mydb;

ALTER TABLE `cadastro_animal` ADD `c_endereco` VARCHAR(200) NULL AFTER `c_situacao`, ADD `c_contato` VARCHAR(200) NULL AFTER `c_endereco`;

ALTER TABLE mydb.cadastro_animal DROP FOREIGN KEY `cadastro_animal_ibfk_1`;
ALTER TABLE mydb.cadastro_parcerias DROP FOREIGN KEY `cadastro_parcerias_ibfk_1`;
ALTER TABLE `cadastro_usuario` CHANGE `u_id` `u_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `cadastro_animal` ADD CONSTRAINT `cadastro_animal_ibfk_1` FOREIGN KEY (`c_usuario`) REFERENCES `cadastro_usuario`(`u_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `cadastro_parcerias` ADD CONSTRAINT `cadastro_parcerias_ibfk_1` FOREIGN KEY (`p_usuario`) REFERENCES `cadastro_usuario`(`u_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE mydb.cadastro_raca DROP FOREIGN KEY `cadastro_raca_ibfk_1`;
ALTER TABLE `cadastro_tipo` CHANGE `t_id` `t_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `cadastro_raca` ADD CONSTRAINT `cadastro_raca_ibfk_1` FOREIGN KEY (`r_tipos`) REFERENCES `cadastro_tipo`(`t_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE mydb.cadastro_animal DROP FOREIGN KEY `cadastro_animal_ibfk_3`;
ALTER TABLE `cadastro_tamanho` CHANGE `t_id` `t_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `cadastro_animal` ADD CONSTRAINT `cadastro_animal_ibfk_3` FOREIGN KEY (`c_tamanho`) REFERENCES `cadastro_tamanho`(`t_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE mydb.cadastro_animal DROP FOREIGN KEY `cadastro_animal_ibfk_4`;
ALTER TABLE `cadastro_situacao` CHANGE `s_id` `s_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `cadastro_animal` ADD CONSTRAINT `cadastro_animal_ibfk_4` FOREIGN KEY (`c_situacao`) REFERENCES `cadastro_situacao`(`s_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE mydb.cadastro_animal DROP FOREIGN KEY `cadastro_animal_ibfk_2`;
ALTER TABLE `cadastro_raca` CHANGE `r_id` `r_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `cadastro_animal` ADD CONSTRAINT `cadastro_animal_ibfk_2` FOREIGN KEY (`c_raca`) REFERENCES `cadastro_raca`(`r_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `cadastro_cor` CHANGE `c_id` `c_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `cadastro_animal` ADD  CONSTRAINT `cadastro_animal_ibfk_5` FOREIGN KEY (`id_cor`) REFERENCES `cadastro_cor`(`c_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `cadastro_gerenciador` CHANGE `g_id` `g_id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cadastro_parcerias` CHANGE `p_id` `p_id` INT(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `cadastro_situacao` (`s_id`, `s_nome`) VALUES
(1, 'Encontrado'),
(2, 'Perdido');