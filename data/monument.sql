-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 31 juil. 2024 à 17:01
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cours_pdo`
--

-- --------------------------------------------------------

--
-- Structure de la table `monument`
--

DROP TABLE IF EXISTS `monument`;
CREATE TABLE IF NOT EXISTS `monument` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(180) NOT NULL,
  `pays` varchar(60) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `nbVisitesAn` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `monument`
--

INSERT INTO `monument` (`id`, `nom`, `pays`, `ville`, `nbVisitesAn`) VALUES
(1, 'Cité interdite2', 'Chine', 'Pékin', 17000000),
(2, 'Château de Versailles', 'France', 'Versailles', 8100000),
(3, 'Memorial de Lincoln', 'Etats-Unis', 'Washington', 7800000),
(6, 'BigBen', 'UK', 'Londres', 1800000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
