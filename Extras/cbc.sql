-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.19-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para cbc
CREATE DATABASE IF NOT EXISTS `cbc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cbc`;

-- Copiando estrutura para tabela cbc.cbc_clubes
CREATE TABLE IF NOT EXISTS `cbc_clubes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_clube` varchar(100) NOT NULL,
  `saldo_disponivel` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbc.cbc_clubes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cbc_clubes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cbc_clubes` ENABLE KEYS */;

-- Copiando estrutura para tabela cbc.cbc_recursos
CREATE TABLE IF NOT EXISTS `cbc_recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recurso` varchar(100) NOT NULL,
  `saldo_disponivel` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela cbc.cbc_recursos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cbc_recursos` DISABLE KEYS */;
INSERT INTO `cbc_recursos` (`id`, `recurso`, `saldo_disponivel`) VALUES
	(1, 'Recurso para passagens', 10000),
	(2, 'Recurso para hospedagens', 10000);
/*!40000 ALTER TABLE `cbc_recursos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
