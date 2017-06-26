use pain_o_matic;

INSERT INTO `pain_o_matic`.`user` (`username`, `password`) VALUES ('dev', '$2y$15$.DzDNWhT13Lb6xUfrqHWQ.C8bpP4NUgtlUowaz5NhxXbF0mpooojy');

INSERT INTO `pain_o_matic`.`doctor` (`nome`, `user_id`) VALUES ('Celia', '1');

ALTER TABLE `pain_o_matic`.`patient` 
CHANGE COLUMN `cpf` `cpf` VARCHAR(14) NOT NULL ;

