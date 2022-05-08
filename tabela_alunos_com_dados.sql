#
# TABLE STRUCTURE FOR: alunos
#

DROP TABLE IF EXISTS `alunos`;

CREATE TABLE `alunos` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (1, 'Al-Khwarizmi', 'al-khwarizmi@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (2, 'Alan Turing', 'alanturing@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (3, 'Arquimedes', 'arquimedes@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (4, 'Bernhard Riemann', 'bernhardriemann@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (5, 'Carl Gauss', 'carlgauss@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (6, 'Claude Shannon', 'claudeshannon@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (7, 'Euclides', 'euclides@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (8, 'Evariste Galois', 'evaristegalois@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (9, 'Gottfried Leibniz', 'gottfriedleibniz@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (10, 'Henri Poincare', 'henripoincare@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (11, 'Isaac Newton', 'isaacnewton@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (12, 'John Napier', 'johnnapier@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (13, 'Joseph Fourier', 'josephfourier@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (14, 'Katherine Johnson', 'katherinejohnson@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (15, 'Leonardo Fibonacci', 'leonardofibonacci@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (16, 'Leonhard Euler', 'leonhardeuler@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (17, 'Maryam Mirzakhani', 'maryammirzakhani@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (18, 'Pierre Laplace', 'pierrelaplace@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (19, 'Pitagoras', 'pitagoras@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (20, 'Rene Descartes', 'renedescartes@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (21, 'Sofia Kovalevskaya', 'sofiakovalevskaya@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (22, 'Sophie Germain', 'sophiegermain@example.net');
INSERT INTO `alunos` (`id`, `nome`, `email`) VALUES (23, 'Von Neumann', 'vonneumann@example.net');
