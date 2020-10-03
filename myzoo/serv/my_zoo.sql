-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 03 oct. 2020 à 00:50
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_zoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(45) NOT NULL,
  `pwd_admin` varchar(255) NOT NULL,
  `deleted_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `nom_admin`, `pwd_admin`, `deleted_admin`) VALUES
(1, 'myzoo', '$2y$10$kCPwvuBS3MlEJXy9.ntg3OvZMnnQ7Bd4nW5QfYRPCFUss5T.zS4zq', 0);

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

DROP TABLE IF EXISTS `animaux`;
CREATE TABLE IF NOT EXISTS `animaux` (
  `id_animal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_animal` varchar(45) NOT NULL,
  `description_animal` text NOT NULL,
  `image_animal` varchar(255) NOT NULL,
  `id_famille` int(10) UNSIGNED NOT NULL,
  `deleted_animal` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_animal`),
  KEY `fk_id_famille` (`id_famille`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id_animal`, `type_animal`, `description_animal`, `image_animal`, `id_famille`, `deleted_animal`) VALUES
(1, 'chien', 'un animal domestique', 'chien.png', 1, 0),
(2, 'cochon', 'un animal de la ferme', '5247.png', 1, 0),
(3, 'serpent', 'un animal dangereux', 'serpent.png', 2, 0),
(4, 'crocodile', 'un animal très dangereux', 'crocodile.png', 2, 0),
(5, 'requin', 'un animal marin très dangereux', 'requin.png', 3, 0),
(7, 'ours', 'un gros animal', '471582.png', 1, 0),
(8, 'gorille', 'Un très gros singe', '17643.png', 1, 0),
(9, 'poulet', 'un animal de la ferme', '324121.png', 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `animaux_continents`
--

DROP TABLE IF EXISTS `animaux_continents`;
CREATE TABLE IF NOT EXISTS `animaux_continents` (
  `id_animal` int(10) UNSIGNED NOT NULL,
  `id_continent` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_animal`,`id_continent`),
  KEY `fk_id_continent` (`id_continent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animaux_continents`
--

INSERT INTO `animaux_continents` (`id_animal`, `id_continent`) VALUES
(1, 1),
(2, 1),
(3, 1),
(7, 1),
(9, 1),
(1, 2),
(2, 2),
(5, 2),
(8, 2),
(9, 2),
(1, 3),
(3, 3),
(4, 3),
(7, 3),
(8, 3),
(1, 4),
(3, 4),
(4, 4),
(9, 4),
(1, 5),
(9, 5);

-- --------------------------------------------------------

--
-- Structure de la table `continents`
--

DROP TABLE IF EXISTS `continents`;
CREATE TABLE IF NOT EXISTS `continents` (
  `id_continent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_continent` varchar(45) NOT NULL,
  `deleted_continent` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_continent`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `continents`
--

INSERT INTO `continents` (`id_continent`, `nom_continent`, `deleted_continent`) VALUES
(1, 'Europe', 0),
(2, 'Asie', 0),
(3, 'Afrique', 0),
(4, 'Océanie', 0),
(5, 'Amérique', 0);

-- --------------------------------------------------------

--
-- Structure de la table `familles`
--

DROP TABLE IF EXISTS `familles`;
CREATE TABLE IF NOT EXISTS `familles` (
  `id_famille` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_famille` varchar(45) NOT NULL,
  `description_famille` text NOT NULL,
  `deleted_famille` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_famille`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `familles`
--

INSERT INTO `familles` (`id_famille`, `nom_famille`, `description_famille`, `deleted_famille`) VALUES
(1, 'mamifères', 'Animaux vertébrés nourrissant leurs petits avec du lait', 0),
(2, 'reptiles', 'Animaux vertébrés qui rampent', 0),
(3, 'poissons', 'Animaux invertébrés du monde aquatique', 0),
(4, 'test 2', 'test 2\r\n        ', 1),
(5, 'test 3 ', 'test 3', 0),
(6, '', '', 1),
(7, 'oiseaux', 'Animaux volant', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `fk_id_famille` FOREIGN KEY (`id_famille`) REFERENCES `familles` (`id_famille`);

--
-- Contraintes pour la table `animaux_continents`
--
ALTER TABLE `animaux_continents`
  ADD CONSTRAINT `fk_id_animall` FOREIGN KEY (`id_animal`) REFERENCES `animaux` (`id_animal`),
  ADD CONSTRAINT `fk_id_continent` FOREIGN KEY (`id_continent`) REFERENCES `continents` (`id_continent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
