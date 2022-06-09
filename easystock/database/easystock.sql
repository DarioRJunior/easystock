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
    `clientes` (
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
        'Gabriel Muniz',
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

--Estrutura da tabela produtos
CREATE TABLE IF NOT EXISTS `produtos`(
    `id_produto` int(2) NOT NULL AUTO_INCREMENT,
    `id_clientes` int(2) NOT NULL,
    `nome` varchar(45) NOT NULL,
    `quantidade` int NOT NULL,
    `preco` DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (`id_produto`),
    FOREIGN KEY (`id_clientes`) REFERENCES `clientes`(`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = latin1;

INSERT INTO
    `produtos`(
        `id_produto`,
        `id_clientes`,
        `nome`,
        `quantidade`,
        `preco`
    )
VALUES
    (
        1,
        3,
        'Bolo no Pote - Chocolate',
        '20',
        '15,00'
    ),
    (
        2,
        3,
        'Bolo no Pote - Chocolate com morango',
        '10',
        '20,00'
    );

CREATE TABLE IF NOT EXISTS `vendas`(
    `id_venda` int(2) NOT NULL AUTO_INCREMENT,
    `id_clientes` int(2) NOT NULL,
    `id_produto` int(2) NOT NULL,
    `nome` varchar(45) NOT NULL,
    `preco` DECIMAL(10, 2) NOT NULL,
    `quantidade` int NOT NULL,
    `dataVenda` date,
    PRIMARY KEY (`id_venda`),
    FOREIGN KEY (`id_clientes`) REFERENCES `clientes`(`id`),
    FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id_produto`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = latin1;

INSERT INTO
    `vendas`
VALUES
    (
        1,
        3,
        1,
        'Bolo no Pote - Chocolate',
        '30,00',
        '2',
        now()
    ),
    (
        2,
        3,
        2,
        'Bolo no Pote - Chocolate com morango',
        '80,00',
        '4',
        now()
    ),
    (
        3,
        3,
        1,
        'Bolo no Pote - Chocolate com morango',
        '20,00',
        '1',
        '2022-05-25'
    ),
    (
        4,
        3,
        2,
        'Bolo no Pote - Chocolate',
        '15,00',
        '1',
        '2022-05-25'
    );