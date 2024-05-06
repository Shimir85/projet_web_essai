-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 avr. 2024 à 13:50
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--
CREATE DATABASE IF NOT EXISTS `essai2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `essai2`;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `PkClas` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Niv` int NOT NULL,
  `Ident` varchar(2) NOT NULL,
  `Nbinsc` int NOT NULL,
  PRIMARY KEY (`PkClas`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `epr`
--

DROP TABLE IF EXISTS `epr`;
CREATE TABLE IF NOT EXISTS `epr` (
  `PkEpr` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Tstart` time NOT NULL,
  `Dist` int NOT NULL,
  `Ansco` varchar(15) NOT NULL,
  PRIMARY KEY (`PkEpr`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etud`
--

DROP TABLE IF EXISTS `etud`;
CREATE TABLE IF NOT EXISTS `etud` (
  `PkEtud` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `FkClas` int UNSIGNED NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Pren` varchar(25) NOT NULL,
  `Sexe` varchar(1) NOT NULL,
  `Nbinsc` int NOT NULL,
  PRIMARY KEY (`PkEtud`),
  KEY `foreign_key_Classe` (`FkClas`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscr`
--

DROP TABLE IF EXISTS `inscr`;
CREATE TABLE IF NOT EXISTS `inscr` (
  `PkInscr` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `FkEtud` int UNSIGNED NOT NULL,
  `FkEpr` int UNSIGNED NOT NULL,
  `NoDos` int NOT NULL,
  `Rw` tinyint(1) NOT NULL,
  `Tstart` time NOT NULL,
  `Tend` time NOT NULL,
  `Temps` time NOT NULL,
  PRIMARY KEY (`PkInscr`),
  UNIQUE KEY `FkEtud_2` (`FkEtud`,`FkEpr`),
  KEY `FkEtud` (`FkEtud`),
  KEY `FkEpr` (`FkEpr`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `PkUser` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Login` varchar(25) NOT NULL,
  `Pswd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`PkUser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etud`
--
ALTER TABLE `etud`
  ADD CONSTRAINT `foreign_key_Classe` FOREIGN KEY (`FkClas`) REFERENCES `classe` (`PkClas`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscr`
--
ALTER TABLE `inscr`
  ADD CONSTRAINT `inscr_ibfk_1` FOREIGN KEY (`FkEtud`) REFERENCES `etud` (`PkEtud`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `inscr_ibfk_2` FOREIGN KEY (`FkEpr`) REFERENCES `epr` (`PkEpr`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
