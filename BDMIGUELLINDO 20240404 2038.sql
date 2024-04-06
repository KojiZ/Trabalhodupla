-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema trabalhodupla
--

CREATE DATABASE IF NOT EXISTS trabalhodupla;
USE trabalhodupla;

--
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`nome`,`email`,`senha`,`ativo`,`cadastro`,`alteracao`) VALUES 
 (1,'Miguel Salmen','mii@gmail.com',' $2y$12$zsA6N.LbmjYIHCv4o6/hOe9mRAkiDehzARU42RgyTOpWoK1rL75CG','A','2024-04-04 16:21:12','2024-04-04 16:21:12'),
 (2,'Koji','Koji@gmail.com','$2y$10$XtF0YIWgg0IJI2f2Utp7je9QGsabTq5HtCRH/l2OqIM/8vfpC41Hm','A','2024-04-05 22:51:06','2024-04-05 22:51:06');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idcliente`,`nome`,`sexo`,`cpf`,`ativo`,`cadastro`,`alteracao`) VALUES 
 (1,'Franciele Telles','Feminino','111.111.111-11','A','2024-04-04 20:22:33','2024-04-04 20:22:34'),
 (2,'Miguel Salmen','Masculino','222.222.222-22','A','2024-04-05 22:51:30','2024-04-05 22:51:30'),
 (3,'Rebeka','Feminino','333.333.333-33','A','2024-04-05 22:51:42','2024-04-05 22:51:42'),
 (4,'Luciano Pettersen','Masculino','444.444.444-44','A','2024-04-05 22:51:57','2024-04-05 22:51:57');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `formapagamento`
--

DROP TABLE IF EXISTS `formapagamento`;
CREATE TABLE `formapagamento` (
  `idformapagamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `formaPagamento` varchar(15) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idformapagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formapagamento`
--

/*!40000 ALTER TABLE `formapagamento` DISABLE KEYS */;
INSERT INTO `formapagamento` (`idformapagamento`,`formaPagamento`,`ativo`,`cadastro`,`alteracao`) VALUES 
 (1,'À Vista','A','2024-04-04 20:23:30','2024-04-04 20:23:30'),
 (2,'À Prazo','A','2024-04-04 20:23:30','2024-04-04 20:23:30');
/*!40000 ALTER TABLE `formapagamento` ENABLE KEYS */;


--
-- Definition of table `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE `registros` (
  `idregistros` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcliente` int(10) unsigned NOT NULL,
  `idformapagamento` int(10) unsigned NOT NULL,
  `idservico` int(10) unsigned NOT NULL,
  `idadm` int(10) unsigned NOT NULL,
  `prazoEntrega` date NOT NULL,
  `valorContratado` int(11) NOT NULL,
  `valorEntrada` int(11) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idregistros`),
  KEY `idcliente` (`idcliente`),
  KEY `idformapagamento` (`idformapagamento`),
  KEY `idservico` (`idservico`),
  KEY `idadm` (`idadm`),
  CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`idformapagamento`) REFERENCES `formapagamento` (`idformapagamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_ibfk_3` FOREIGN KEY (`idservico`) REFERENCES `servico` (`idservico`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `registros_ibfk_4` FOREIGN KEY (`idadm`) REFERENCES `adm` (`idadm`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registros`
--

/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;


--
-- Definition of table `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `idservico` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servico` varchar(40) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idservico`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servico`
--

/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` (`idservico`,`servico`,`ativo`,`cadastro`,`alteracao`) VALUES 
 (1,'Desenvolvimento de Sistemas','A','2024-04-04 20:24:00','2024-04-04 20:24:00'),
 (2,'Pedreiro','A','2024-04-05 22:55:09','2024-04-05 22:55:09'),
 (3,'Carpinteiro','A','2024-04-05 22:55:16','2024-04-05 22:55:16'),
 (4,'Médico Legista','A','2024-04-05 22:55:26','2024-04-05 22:55:26'),
 (5,'Marceneiro','A','2024-04-05 22:55:37','2024-04-05 22:55:37'),
 (6,'Investigador Criminal','A','2024-04-05 22:55:51','2024-04-05 22:55:51'),
 (7,'Perito Forense','A','2024-04-05 22:56:01','2024-04-05 22:56:01');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
