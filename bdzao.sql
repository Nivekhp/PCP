
#
# Criação da Tabela : esquadrias
#

CREATE TABLE `esquadrias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `linha` varchar(50) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `peso` float NOT NULL,
  `largura` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projeto` (`id_projeto`),
  CONSTRAINT `fk_projeto` FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ;

#
# Dados a serem incluídos na tabela
#

INSERT INTO esquadrias VALUES ( '1', '', '', '', '0', '160', '150', '1');
INSERT INTO esquadrias VALUES ( '17', '1', '2', '3', '4', '5', '6', '6');
INSERT INTO esquadrias VALUES ( '18', '1', '2', '3', '4', '5', '6', '4');
INSERT INTO esquadrias VALUES ( '19', '1', '1', '1', '1', '1', '1', '7');

#
# Criação da Tabela : projetos
#

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ;

#
# Dados a serem incluídos na tabela
#

INSERT INTO projetos VALUES ( '1', 'aaa', '13');
INSERT INTO projetos VALUES ( '2', 'teste', 'esete');
INSERT INTO projetos VALUES ( '3', 'teste', 'esete');
INSERT INTO projetos VALUES ( '4', 'aa', 'aaa');
INSERT INTO projetos VALUES ( '5', 'aa', 'aaa');
INSERT INTO projetos VALUES ( '6', 'aaaaa', 'aaaaa');
INSERT INTO projetos VALUES ( '7', 'Teste pelo celular', 'K6');

#
# Criação da Tabela : usuarios
#

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 ;

#
# Dados a serem incluídos na tabela
#

INSERT INTO usuarios VALUES ( '1', 'aaa', '123', 'Teste', '1');
INSERT INTO usuarios VALUES ( '2', 'bbb', '123', 'NivelAbaixo', '2');
INSERT INTO usuarios VALUES ( '21', 'a', 'a', 'a', '0');
