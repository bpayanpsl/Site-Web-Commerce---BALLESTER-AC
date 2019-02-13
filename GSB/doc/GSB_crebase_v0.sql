-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 02 Septembre 2014 à 14:53
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gsb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

DROP TABLE IF EXISTS `visiteurs`;
CREATE TABLE IF NOT EXISTS `visiteurs` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(40) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` varchar(30) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `hashvalidation` char(32) DEFAULT NULL,
  `dateinscription` varchar(30) DEFAULT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adresse_email` (`email`),
  KEY `mot_de_passe` (`mdp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `email`, `hashvalidation`, `dateinscription`, `avatar`) VALUES
('admin', 'admin01', 'admin01', 'a', '5531185c651ca6ec4045a1a54fd96b7229cab236', 'Adresse de admin', '88000', 'Ville de admin', NULL, 'admin@monsite.com', 'OK', '2011-12-31', 'images/avatar/admin.tmp'),
('comptable', 'user103', 'user103', 'c', '5531185c651ca6ec4045a1a54fd96b7229cab236', 'Adresse user103', '05000', 'Gap', '2010-01-01', 'user103@swiss.priv', 'OK', '4-12-2012', 'images/avatar/uuser103.tmp'),
('gsb', 'user101', 'user101', 'c', '5531185c651ca6ec4045a1a54fd96b7229cab236', 'Adresse1', '05000', 'Ville1', '2014-10-05', 'gsb@gsb.priv', 'OK', '29-08-2014', NULL),
('visiteur', 'user102', 'user102', 'v', '5531185c651ca6ec4045a1a54fd96b7229cab236', 'Adresse user102', '99000', 'Ville de user102', NULL, 'user102@monsite.com', 'OK', '2011-12-31', 'images/avatar/user102.tmp');

--------------------TEST---------------------------
--
-- Structure de la table `fichefrais`
--

DROP TABLE IF EXISTS `fichefrais`;
CREATE TABLE IF NOT EXISTS `fichefrais` (
  `id` int(11) NOT NULL DEFAULT '',
  `etat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mois` date() DEFAULT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` char(10,2) DEFAULT NULL,
  `dateModif` date() DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY 
	REFERENCES etat(`etat_id`),
  FOREIGN KEY 
  REFERENCES visiteurs(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
