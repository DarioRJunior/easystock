SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
    time_zone = "+00:00";

-- Database: `easystock`
-- Estrutura da tabela `clientes`
CREATE TABLE IF NOT EXISTS `clientes`(
    `id` int(2) NOT NULL AUTO_INCREMENT,
    `nome` varchar(45) NOT NULL,
    `nome_empresa` varchar(110) NOT NULL,
    `email` varchar(110) NOT NULL,
    `senha` varchar(15) NOT NULL,
    `nivel` varchar(4),
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = latin1;

-- Criando login ADM e um Cliente para testes
INSERT INTO
    `clientes`(
        `id`,
        `nome`,
        `nome_empresa`,
        `email`,
        `senha`,
        `nivel`
    )
VALUES
(
    1,
    'Dario Junior',
    'EasyStock',
    'dario@gmail.com',
    '123',
    'ADM'
),
(
    2,
    'Gabriel Muniz'
    'EasyStock',
    'gabriel@gmail.com',
    '123',
    'ADM'
),
(
     3,
    'Haroldo Portela',
    'Harry Pote',
    'harry@hotmail.com',
    '123',
    'USER'
);