-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2018 at 12:23 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parque`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CadastrarClienteDiario` (IN `_matricula` VARCHAR(15), IN `_marca` VARCHAR(15), IN `_modelo` VARCHAR(15), IN `_dataEntrada` DATE, IN `_dataSaida` DATE, IN `_funcid` INT, IN `_espacoid` INT)  BEGIN DECLARE _totalClienteDiario INT; SELECT COUNT(*) INTO _totalClienteDiario FROM cliente_diario WHERE cliente_diario.matricula = _matricula; if(_totalClienteDiario = 0) then begin INSERT INTO cliente_diario VALUES(_matricula, _marca, _modelo, _dataEntrada, _dataSaida, _funcid); UPDATE espaco SET iddiario=_matricula, estado="ocupado" WHERE id = _espacoid; end; else SELECT "O Cliente ja esta cadastrado"; end if; END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CadastrarClienteMensal` (IN `_bi` VARCHAR(15), IN `_nome` VARCHAR(50), IN `_sexo` VARCHAR(10), IN `_dataNasc` DATE, IN `_idade` INT, IN `_endereco` VARCHAR(50), IN `_funcid` INT)  BEGIN
DECLARE _totalIndividuo INT;
DECLARE _totalClienteMensal INT;
DECLARE _idIndividuo INT;

SELECT COUNT(*) INTO _totalIndividuo FROM individuo WHERE individuo.bi = _bi;

if(_totalIndividuo = 0) then	
begin
	INSERT INTO individuo(bi, nome, dataNasc, idade, sexo) VALUES(_bi, _nome, _dataNasc, _idade, _sexo);
	SELECT id INTO _idIndividuo FROM individuo WHERE individuo.bi = _bi;
    INSERT INTO cliente_mensal(id, endereco, funcid) VALUES(_idIndividuo, _endereco, _funcid);
end;
else
	
   	SELECT id INTO _idIndividuo FROM individuo WHERE individuo.bi = _bi;
    
	SELECT COUNT(*) INTO _totalClienteMensal FROM cliente_mensal WHERE cliente.id = _idIndividuo;
	
	if(_totalClienteMensal = 0) then
    	INSERT INTO cliente_mensal(id, endereco, funcid) VALUES(_idIndividuo, _endereco, _funcid);
    else
    	SELECT "O Cliente ja esta cadastrado"; 
    end if;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CadastrarFuncionario` (IN `_bi` VARCHAR(15), IN `_nome` VARCHAR(50), IN `_sexo` VARCHAR(10), IN `_dataNasc` DATE, IN `_idade` INT(10), IN `_nuit` INT(10), IN `_funcao` VARCHAR(15))  BEGIN
DECLARE _totalIndividuo INT;
DECLARE _totalFuncionario INT;
DECLARE _idIndividuo INT;

SELECT COUNT(*) INTO _totalIndividuo FROM individuo WHERE individuo.bi = _bi;
SELECT COUNT(*) INTO _totalFuncionario FROM funcionario WHERE funcionario.nuit = _nuit;


if(_totalIndividuo = 0) then	
begin
	INSERT INTO individuo(bi, nome, dataNasc, idade, sexo) VALUES(_bi, _nome, _dataNasc, _idade, _sexo);
	SELECT id INTO _idIndividuo FROM individuo WHERE individuo.bi = _bi;
    INSERT INTO funcionario(id, nuit, funcao) VALUES(_idIndividuo, _nuit, _funcao);
end;
else
	
	if(_totalFuncionario = 0) then
    	SELECT id INTO _idIndividuo FROM individuo WHERE individuo.bi = _bi;
    	INSERT INTO funcionario(id, nuit, funcao) VALUES(_idIndividuo, _nuit, _funcao);
    else
    	SELECT "O Funionario ja esta cadastrado"; 
    end if;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarClientesDiarios` ()  begin
	SELECT * FROM cliente_diario WHERE dataSaida is null;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarClientesMensais` ()  begin
	select * from cliente_mensal where cliente_mensal.id = individui.id and individuo.dataSaida is null;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SaidaClienteDiario` (IN `_matricula` VARCHAR(15))  BEGIN  
    DECLARE _espacoid INT; 
     
    SELECT id INTO _espacoid FROM espaco E WHERE E.iddiario = _matricula;
    UPDATE espaco E SET E.iddiario = null, E.estado = 'desocupado' WHERE E.atribuicao = 'diario' AND E.iddiario = _matricula; 
    UPDATE cliente_diario C SET C.dataSaida = now() WHERE C.matricula = _matricula; 
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calcProfit` (`cost` FLOAT, `price` FLOAT) RETURNS DECIMAL(9,2) BEGIN
  DECLARE profit DECIMAL(9,2);
  SET profit = price-cost;
  RETURN profit;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `pagaDiario` (`_valor` DECIMAL(6,2)) RETURNS DECIMAL(6,2) NO SQL
return _valor$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cliente_diario`
--

CREATE TABLE `cliente_diario` (
  `matricula` varchar(15) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(15) NOT NULL,
  `dataEntrada` datetime NOT NULL,
  `dataSaida` datetime DEFAULT NULL,
  `funcid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente_diario`
--

INSERT INTO `cliente_diario` (`matricula`, `marca`, `modelo`, `dataEntrada`, `dataSaida`, `funcid`) VALUES
('MMA-112-MP', 'Honda', 'Accord', '2017-11-22 00:00:00', '2017-11-24 22:13:20', 10),
('MMA-113-MP', 'Honda', 'Accord', '2017-11-22 00:00:00', '2017-11-24 22:19:16', 10),
('MMA-940-MC', 'Toyota', 'Vitz', '2017-11-23 00:00:00', '2017-11-23 08:12:00', 10);

--
-- Triggers `cliente_diario`
--
DELIMITER $$
CREATE TRIGGER `ClienteDiarioSaida` AFTER UPDATE ON `cliente_diario` FOR EACH ROW UPDATE espaco SET espaco.estado='desocupado' AND espaco.iddiario=null
WHERE espaco.iddiario=@id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cliente_mensal`
--

CREATE TABLE `cliente_mensal` (
  `id` int(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `funcid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente_mensal`
--

INSERT INTO `cliente_mensal` (`id`, `endereco`, `funcid`) VALUES
(12, 'aaaaa', 10);

--
-- Triggers `cliente_mensal`
--
DELIMITER $$
CREATE TRIGGER `ClienteMensalSaida` AFTER UPDATE ON `cliente_mensal` FOR EACH ROW UPDATE espaco SET espaco.estado='desocupado' AND idmensal=null WHERE espaco.idmensal=@id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `espaco`
--

CREATE TABLE `espaco` (
  `id` int(11) NOT NULL,
  `atribuicao` enum('diario','mensal') NOT NULL DEFAULT 'diario',
  `estado` enum('ocupado','desocupado') NOT NULL DEFAULT 'desocupado',
  `iddiario` varchar(15) DEFAULT NULL,
  `idmensal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espaco`
--

INSERT INTO `espaco` (`id`, `atribuicao`, `estado`, `iddiario`, `idmensal`) VALUES
(1, 'diario', 'desocupado', NULL, NULL),
(2, 'diario', 'desocupado', NULL, NULL),
(3, 'mensal', 'desocupado', NULL, NULL),
(4, 'diario', 'desocupado', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nuit` int(10) NOT NULL,
  `funcao` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`id`, `nuit`, `funcao`, `username`, `senha`, `remember_token`) VALUES
(10, 1234567890, 'admin', '', '0', ''),
(13, 122121, 'parquador', '', '0', ''),
(14, 111114, 'Informatic', '', '0', ''),
(16, 1111, '26', '', '0', ''),
(17, 0, '123456', '', '0', ''),
(18, 123456, 'Designer', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `individuo`
--

CREATE TABLE `individuo` (
  `id` int(11) NOT NULL,
  `bi` varchar(15) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` enum('Masculino','Femenino') NOT NULL,
  `dataNasc` date NOT NULL,
  `idade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `individuo`
--

INSERT INTO `individuo` (`id`, `bi`, `nome`, `sexo`, `dataNasc`, `idade`) VALUES
(10, '1112456789124ac', 'Djamal dos Santos', 'Masculino', '1995-08-01', 22),
(11, '12345', 'A', 'Femenino', '1999-01-10', 22),
(12, '5555', 'aa', 'Femenino', '2000-12-12', 20),
(13, '444444', 'Joan', 'Femenino', '1994-01-12', 23),
(14, '1111111a', 'Djamal Francisco', 'Masculino', '1995-08-01', 22),
(16, '2111111a', 'Antonio Alberto', 'Masculino', '1995-09-01', 26),
(17, '2111111aba', 'Alberto Antonio', 'Masculino', '1995-10-01', 29),
(18, '2111111abac', 'Alberto Antonio', 'Masculino', '1995-10-01', 29);

-- --------------------------------------------------------

--
-- Table structure for table `recibo_diario`
--

CREATE TABLE `recibo_diario` (
  `id` int(11) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `funcid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recibo_mensal`
--

CREATE TABLE `recibo_mensal` (
  `id` int(11) NOT NULL,
  `idmensal` int(11) NOT NULL,
  `numviaturas` int(2) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `funcid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Djamal', '$2y$10$gVwYaL3.FnR.xKL6zs5IXeuycDNE4H/ZP0hS9A.k1.mZUCo3s.0Fy', 'djamal.dos.santos@gmail.com', 'pFOhHoTzSxlXpl4CiKKT8WDNVU4OzpW2v2TcAnnCtOQwzi9V9QnHbbA3O62L', '2018-10-15 11:06:36', '2018-10-15 11:06:36'),
(2, 'Djamal', '$2y$10$Df9hJx/512BNjxVLF7Ye/u9Oq7WoyKEKuIBqebP814gSn15.KxaN2', 'a@gmail.com', 'pl4rqtzJOyN43Hb0y83LDlNq8GYTyXBAEbFmfh2Dw3Q6NDMhY94sBPBozJvL', '2018-10-15 11:14:06', '2018-10-15 11:14:06'),
(3, 'Utilizador', '$2y$10$H9pWryks.S0T3CU4BwbFsOLPPgdIPId0shnMrEIoX3v6Tsvs6L5cu', 'normal@email.com', 'f9eoRujFb5qXnrz7FNjVN23hj8r8YsQIVgQvCKSVpq5WCwI4bgbckp6IIBB0', '2018-12-17 20:18:50', '2018-12-17 20:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `viatura`
--

CREATE TABLE `viatura` (
  `matricula` varchar(15) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `dataEntrada` datetime NOT NULL,
  `dataSaida` datetime DEFAULT NULL,
  `clientid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viatura`
--

INSERT INTO `viatura` (`matricula`, `marca`, `modelo`, `dataEntrada`, `dataSaida`, `clientid`) VALUES
('Ford', 'MMA-160-MC', 'Cortina', '2018-10-01 00:00:00', NULL, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente_diario`
--
ALTER TABLE `cliente_diario`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `funcid` (`funcid`);

--
-- Indexes for table `cliente_mensal`
--
ALTER TABLE `cliente_mensal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcid` (`funcid`);

--
-- Indexes for table `espaco`
--
ALTER TABLE `espaco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddiario` (`iddiario`,`idmensal`),
  ADD KEY `idmensal` (`idmensal`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individuo`
--
ALTER TABLE `individuo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bi` (`bi`);

--
-- Indexes for table `recibo_diario`
--
ALTER TABLE `recibo_diario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcid` (`funcid`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `funcid_2` (`funcid`);

--
-- Indexes for table `recibo_mensal`
--
ALTER TABLE `recibo_mensal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcid` (`funcid`),
  ADD KEY `funcid_2` (`funcid`),
  ADD KEY `idmensal` (`idmensal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viatura`
--
ALTER TABLE `viatura`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `clientid_2` (`clientid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `espaco`
--
ALTER TABLE `espaco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `individuo`
--
ALTER TABLE `individuo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cliente_diario`
--
ALTER TABLE `cliente_diario`
  ADD CONSTRAINT `funcid` FOREIGN KEY (`funcid`) REFERENCES `funcionario` (`id`);

--
-- Constraints for table `cliente_mensal`
--
ALTER TABLE `cliente_mensal`
  ADD CONSTRAINT `funcionarioid` FOREIGN KEY (`funcid`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `mensalid` FOREIGN KEY (`id`) REFERENCES `individuo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `espaco`
--
ALTER TABLE `espaco`
  ADD CONSTRAINT `iddiario` FOREIGN KEY (`iddiario`) REFERENCES `cliente_diario` (`matricula`),
  ADD CONSTRAINT `idmensal` FOREIGN KEY (`idmensal`) REFERENCES `cliente_mensal` (`id`);

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `idfuncionario` FOREIGN KEY (`id`) REFERENCES `individuo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recibo_diario`
--
ALTER TABLE `recibo_diario`
  ADD CONSTRAINT `diario` FOREIGN KEY (`matricula`) REFERENCES `cliente_diario` (`matricula`),
  ADD CONSTRAINT `funcionario` FOREIGN KEY (`funcid`) REFERENCES `funcionario` (`id`);

--
-- Constraints for table `recibo_mensal`
--
ALTER TABLE `recibo_mensal`
  ADD CONSTRAINT `func` FOREIGN KEY (`funcid`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `mes` FOREIGN KEY (`idmensal`) REFERENCES `cliente_mensal` (`id`);

--
-- Constraints for table `viatura`
--
ALTER TABLE `viatura`
  ADD CONSTRAINT `clientid` FOREIGN KEY (`clientid`) REFERENCES `cliente_mensal` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
