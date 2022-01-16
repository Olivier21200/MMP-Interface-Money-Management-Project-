-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 16 jan. 2022 à 19:56
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mmp-interface`
--

-- --------------------------------------------------------

--
-- Structure de la table `actioncompt`
--

DROP TABLE IF EXISTS `actioncompt`;
CREATE TABLE IF NOT EXISTS `actioncompt` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `compt` int(255) NOT NULL,
  `user` int(255) NOT NULL,
  `montant` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `actioncompt`
--

INSERT INTO `actioncompt` (`id`, `compt`, `user`, `montant`) VALUES
(1, 1, 1, 100),
(2, 1, 1, -20);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `age` int(3) DEFAULT '18',
  `sexe` varchar(255) COLLATE utf8_bin DEFAULT 'M',
  `telephone` int(12) DEFAULT NULL,
  `rue` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `codePostal` int(10) DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `metier` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nb_compts` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='table pour représenté un client';

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `prenom`, `nom`, `age`, `sexe`, `telephone`, `rue`, `ville`, `codePostal`, `mail`, `metier`, `nb_compts`) VALUES
(1, 'olivier', 'sirugue', 19, 'Homme', 771887112, '16c rue du general charle de nansouty', 'Dijon', 2100, 'olivier21.gonzalez@gmail.com', 'Etudiant Informatique', 3),
(16, 'Emma', 'girard', 20, '0', 109073904, '8c rue du chateau', 'Beaune', 21200, 'emma123@gmail.com', 'etudiante', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compts`
--

DROP TABLE IF EXISTS `compts`;
CREATE TABLE IF NOT EXISTS `compts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `proprietaire` int(255) NOT NULL,
  `typeCompt` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'A',
  `plafond` int(255) NOT NULL DEFAULT '25000',
  `interet` int(255) NOT NULL DEFAULT '1',
  `solde` int(255) NOT NULL DEFAULT '0',
  `dateOuverture` date DEFAULT NULL,
  `dateFermeture` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `proprietaire` (`proprietaire`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `compts`
--

INSERT INTO `compts` (`id`, `proprietaire`, `typeCompt`, `plafond`, `interet`, `solde`, `dateOuverture`, `dateFermeture`) VALUES
(1, 16, 'B', 999, 2, 1000, '2019-12-05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `soldsemaine`
--

DROP TABLE IF EXISTS `soldsemaine`;
CREATE TABLE IF NOT EXISTS `soldsemaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comptID` int(11) NOT NULL,
  `sold` int(11) DEFAULT '0',
  `dateSemaineMoyenne` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `soldsemaine`
--

INSERT INTO `soldsemaine` (`id`, `comptID`, `sold`, `dateSemaineMoyenne`) VALUES
(1, 1, 100, '2022-01-14');

-- --------------------------------------------------------

--
-- Structure de la table `typecompt`
--

DROP TABLE IF EXISTS `typecompt`;
CREATE TABLE IF NOT EXISTS `typecompt` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'A',
  `plafond` int(11) DEFAULT '25000',
  `interet` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `typecompt`
--

INSERT INTO `typecompt` (`id`, `nom`, `plafond`, `interet`) VALUES
(1, 'A', 25000, 1),
(2, 'Jeune', 25000, 1),
(3, 'Courant', 25000, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
