-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 nov. 2020 à 20:33
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdrestau`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `numero` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`nom`, `prenom`, `numero`, `adresse`, `id_client`) VALUES
('Client1', 'Client2', 987647489, '8 rue bla bla quartier bla bla', 25),
('Saadoune', 'Sanaa', 1234885995, '7 rue bla bla quartier bla bla', 24);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_plat` int(11) NOT NULL,
  `date_com` datetime NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_client` (`id_client`),
  KEY `id_plat` (`id_plat`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `id_plat`, `date_com`) VALUES
(15, 25, 5, '2020-11-23 20:32:57'),
(14, 24, 5, '2020-11-23 20:32:24');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `id_plat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_plat` varchar(50) NOT NULL,
  `prix_plat` int(11) NOT NULL,
  `image_plat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_plat`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `nom_plat`, `prix_plat`, `image_plat`) VALUES
(1, 'Pizza fruits de mer', 20, '1.jpg'),
(2, 'Plat de poissons variés', 30, '2.jpg'),
(3, 'Gratins', 25, '3.jpg'),
(4, 'Tajine marocain', 20, '4.jpg'),
(5, 'Plat asiatique', 30, '5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `plat_du_jour`
--

DROP TABLE IF EXISTS `plat_du_jour`;
CREATE TABLE IF NOT EXISTS `plat_du_jour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_plat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `plat_du_jour`
--

INSERT INTO `plat_du_jour` (`id`, `nom_plat`) VALUES
(1, 'Plat asiatique');

DELIMITER $$
--
-- Évènements
--
DROP EVENT `plat_du_jour`$$
CREATE DEFINER=`root`@`localhost` EVENT `plat_du_jour` ON SCHEDULE EVERY 1 DAY STARTS '2020-11-22 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `plat_du_jour` SET `nom_plat`=(SELECT `nom_plat` FROM `plat` ORDER BY RAND() LIMIT 1) WHERE id=1$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
