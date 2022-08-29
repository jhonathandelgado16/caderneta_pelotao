CREATE DATABASE caderneta_pelotao COLLATE 'utf8_unicode_ci';

CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `siplan`.`categorias`
(`id`,`categoria`)
VALUES
('8','Material de Construção') , ('10','Material de Expediente');

CREATE TABLE `secoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `secao` varchar(255) DEFAULT NULL,
  `serie_historica` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `siplan`.`secoes`
(`id`, `secao`, `serie_historica`)
VALUES
('1', '1ª Seção' , '30000.49') , ('2', 'Almoxarifado' , '10500.00'), ('4', 'Assessoria' , '1250.00');

CREATE TABLE `itens` (
  `id` int NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `estoque_min` int DEFAULT NULL,
  `categorias_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_item_idx` (`categorias_id`),
  CONSTRAINT `fk_categoria_item` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `siplan`.`itens`
(`id`, `descricao`, `status`, `estoque_min`, `categorias_id`)
VALUES
('1', 'PLACA DE PRÉ-MOLDADO 5mm', '1', '15', '8'), 
('2', 'PORTA DE MADEIRA', '1', '15', '8'), 
('3', 'PLACA DE PRÉ-MOLDADO', '1', '15', '8'), 
('4', 'CANETA BIC AZUL', '1', '15', '10'), 
('5', 'BLOCOS DE PAPEL', '1', '15', '10');

CREATE TABLE `estoques` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `itens_id` INT NOT NULL,
    `quantidade` FLOAT DEFAULT NULL,
    `valor_unitario` DECIMAL(10 , 2 ) DEFAULT '0.00',
    PRIMARY KEY (`id`),
    KEY `cad_item_idx` (`itens_id`),
    CONSTRAINT `fk_itens_estoque` FOREIGN KEY (`itens_id`)
        REFERENCES `itens` (`id`)
)  ENGINE=INNODB AUTO_INCREMENT=9 DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_0900_AI_CI;

INSERT INTO `siplan`.`estoques`
(`id`, `itens_id`, `quantidade`, `valor_unitario`)
VALUES
('3', '1', '11', '150.50'),
('5', '2', '12', '80.25'),
('6', '3', '15', '50.50'),
('7', '4', '50', '0.50'),
('8', '5', '75', '1.00');

CREATE TABLE `historico_estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estoques_id` int NOT NULL,
  `quantidade` varchar(255) DEFAULT NULL,
  `operacao` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historico_estoque_idx` (`estoques_id`),
  CONSTRAINT `fk_historico_estoque` FOREIGN KEY (`estoques_id`) REFERENCES `estoques` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `listas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `secoes_id` int DEFAULT NULL,
  `data_criacao` date NOT NULL,
  `ultima_modificacao` date DEFAULT NULL,
  `status` int DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_secoes_listas_idx` (`secoes_id`),
  CONSTRAINT `fk_secoes_listas` FOREIGN KEY (`secoes_id`) REFERENCES `secoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `siplan`.`listas`
(`id`, `secoes_id`, `data_criacao`, `ultima_modificacao`, `status`, `descricao`)
VALUES
('1', '1', '2021-11-04', '2021-11-04','Lista de Itens da 1ª Seção'),
('2', '2', '2021-11-04', '2021-11-04', NULL, 'Lista Almoxarifado 2021'),
('4', '4', '2021-11-04', '2021-11-04', NULL, 'Nova Lista'),
('5', '4', '2021-11-04', '2021-11-04', NULL, 'Lista 1º Semestre');

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `senha` char(60) NOT NULL,
  `secoes_id` int DEFAULT NULL,
  `perfil` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`login`),
  KEY `fk_secoes_usuarios_idx` (`secoes_id`),
  CONSTRAINT `fk_secoes_usuarios` FOREIGN KEY (`secoes_id`) REFERENCES `secoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `siplan`.`usuarios`
(`id`,`login`,`senha`,`secoes_id`,`perfil`,`status`)
VALUES
('1', 'admin', '$2y$10$zx0qXQJoIXsXEJgXyyVxCeZcNjlrsSpmudM3Gcov3OZD85QjYMgzC', '1', 'admin', '1');

