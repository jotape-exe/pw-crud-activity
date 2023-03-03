SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE empresa;

USE empresa;

CREATE TABLE `atividades` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_usuario` INT NOT NULL,
  `nome` VARCHAR(200) NOT NULL,
  `descricao` VARCHAR(250) NOT NULL,
  `data_atividade` DATE NOT NULL,
  `status` TINYINT(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(254) NOT NULL,
  `login` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE atividades ADD FOREIGN KEY (id_usuario) 
REFERENCES usuarios(id);