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
        'A Fruta Filosofal',
        '20',
        '9,34'
    ),
    (
        2,
        3,
        'A Camada Secreta',
        '10',
        '9,34'
    ),
    (
        3,
        3,
        'O Prisioneiro de Askabanana',
        '20',
        '9,34'
    ),
    (
        4,
        3,
        'O Confete de Fogo',
        '20',
        '9,34'
    ),
    (
        5,
        3,
        'A Torta da Fenix',
        '20',
        '9,34'
    ),
    (
        6,
        3,
        'O Chocolate do principe',
        '20',
        '9,34'
    ),
    (
        7,
        3,
        'As delicias da morte',
        '20',
        '9,34'
    );

CREATE TABLE IF NOT EXISTS `vendas`(
    `id_venda` int(2) NOT NULL AUTO_INCREMENT,
    `id_clientes` int(2) NOT NULL,
    `nome` varchar(45) NOT NULL,
    `preco` DECIMAL(10, 2) NOT NULL,
    `quantidade` int NOT NULL,
    `dataVenda` date,
    PRIMARY KEY (`id_venda`),
    FOREIGN KEY (`id_clientes`) REFERENCES `clientes`(`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = latin1;

INSERT INTO
    `vendas`
VALUES
    (
        1,
        3,
        'A Fruta Filosofal',
        '18,68',
        '2',
        '2022-05-25'
    ),
    (
        2,
        3,
        'As delicias da morte',
        '37,36',
        '4',
        '2022-05-25'
    ),
    (
        3,
        3,
        'O Prisioneiro de Askabanana',
        '9,34',
        '1',
        '2022-05-26'
    ),
    (
        4,
        3,
        'A Fruta Filosofal',
        '9,34',
        '1',
        NOW()
    );