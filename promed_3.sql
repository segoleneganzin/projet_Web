-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2023 at 12:12 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promed`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `rue` varchar(45) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  PRIMARY KEY (`id_adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `id_consultation` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `duree` timestamp NOT NULL,
  `tarif` decimal(10,0) NOT NULL,
  `id_rdv` int(11) NOT NULL,
  PRIMARY KEY (`id_consultation`),
  KEY `fk_Consultation_Rendez_vous1` (`id_rdv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `identite`
--

DROP TABLE IF EXISTS `identite`;
CREATE TABLE IF NOT EXISTS `identite` (
  `id_identite` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `mdp` varchar(16) NOT NULL,
  `role` varchar(16) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  PRIMARY KEY (`id_identite`),
  KEY `fk_Identite_Adress1` (`id_adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `date_de_naissance` date NOT NULL,
  `id_identite` int(11) NOT NULL,
  PRIMARY KEY (`id_patient`),
  KEY `fk_Patient_Identite1` (`id_identite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `praticien`
--

DROP TABLE IF EXISTS `praticien`;
CREATE TABLE IF NOT EXISTS `praticien` (
  `id_praticien` int(11) NOT NULL AUTO_INCREMENT,
  `specialiste` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `id_identite` int(11) NOT NULL,
  PRIMARY KEY (`id_praticien`),
  KEY `fk_Praticien_Identite` (`id_identite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
  `date_rdv` timestamp NOT NULL,
  `id_praticien` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  PRIMARY KEY (`id_rdv`),
  KEY `fk_Rendez_vous_Praticien1` (`id_praticien`),
  KEY `id_patient` (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `fk_Consultation_Rendez_vous1` FOREIGN KEY (`id_rdv`) REFERENCES `rdv` (`id_rdv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `identite`
--
ALTER TABLE `identite`
  ADD CONSTRAINT `fk_Identite_Adress1` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_Patient_Identite1` FOREIGN KEY (`id_identite`) REFERENCES `identite` (`id_identite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `praticien`
--
ALTER TABLE `praticien`
  ADD CONSTRAINT `fk_Praticien_Identite` FOREIGN KEY (`id_identite`) REFERENCES `identite` (`id_identite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `fk_Rendez_vous_Praticien1` FOREIGN KEY (`id_praticien`) REFERENCES `praticien` (`id_praticien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
