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

DROP TABLE IF EXISTS `lignefraishorsforfait`;
DROP TABLE IF EXISTS `fichefrais`;
DROP TABLE IF EXISTS `visiteurs`;
DROP TABLE IF EXISTS `etat`;
DROP TABLE IF EXISTS `lignefraisforfait`;
DROP TABLE IF EXISTS `fraisforfait`;
-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--


CREATE TABLE IF NOT EXISTS `visiteurs` (
	`id` varchar(30) NOT NULL DEFAULT '',
	`nom` varchar(30) DEFAULT NULL,
	`prenom` varchar(30) DEFAULT NULL,
	`login` varchar(20) DEFAULT NULL,
	`mdp` varchar(40) DEFAULT NULL,
	`adresse` varchar(30) DEFAULT NULL,
	`cp` varchar(5) DEFAULT NULL,
	`ville` varchar(30) DEFAULT NULL,
	`dateEmbauche` varchar(30) DEFAULT NULL,
	`poste` varchar(20) DEFAULT NULL,
	`username` VARCHAR(255),
	`username_canonical` VARCHAR(255),
	`email` VARCHAR(255),
	`email_canonical` VARCHAR(255),
	`enabled` TINYINT(1),
	`salt` VARCHAR(255),
	`password` VARCHAR(255),
	`last_login` DATETIME,
	`locked` TINYINT(1),
	`expired` TINYINT(1),
	`expires_at` DATETIME,
	`confirmation_token` VARCHAR(255),
	`password_requested_at` DATETIME,
	`roles` LONGTEXT,
	`credentials_expired` TINYINT(1),
	`credentials_expire_at` DATETIME,
	`hashvalidation` char(32) DEFAULT NULL,
	`dateinscription` varchar(30) DEFAULT NULL,
	`avatar` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adresse_email` (`email`),
  KEY `mot_de_passe` (`mdp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `etat` (
	`id` INT(11),
	`libelle` VARCHAR(30),
PRIMARY KEY (`id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `lignefraisforfait` (
	`quantite` INT(11),
	`ficheFrais_id` INT(11),
	`fraisForfait_id` INT(11),
PRIMARY KEY(`ficheFrais_id`,`fraisForfait_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `fraisforfait` (
	`id` INT(11),
	`libelle` VARCHAR(20),
	`montant` DECIMAL(5,2),
PRIMARY KEY (`id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `fichefrais` (
	`id` INT(11),
	`etat_id` INT(11),
	`user_id` varchar(30),
	`mois` DATE,
	`nbJustificatifs` INT(11),
	`montantValide` DECIMAL(10,2),
	`dateModif` DATE,
PRIMARY KEY (`id`),
FOREIGN KEY (`etat_id`) REFERENCES etat(`id`),
FOREIGN KEY (`user_id`) REFERENCES visiteurs(`id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `lignefraishorsforfait` (
	`id` INT(11),
	`libelle` VARCHAR(100),
	`date` DATE,
	`montant` DECIMAL(10,2),
	`ficheFrais_id` INT(11),
	`refus` TINYINT(1),
PRIMARY KEY (`id`),
FOREIGN KEY (`ficheFrais_id`) REFERENCES fichefrais(`id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `email`, `hashvalidation`, `dateinscription`, `avatar`) VALUES
('admin', 'admin01', 'admin01', 'a', '5531185c651ca6ec4045a1a54fd96b7229cab236', 'Adresse de admin', '88000', 'Ville de admin', NULL, 'admin@monsite.com', 'OK', '2011-12-31', 'images/avatar/admin.tmp'),
('comptable', 'user103', 'user103', 'c', '5531185c651ca6ec4045a1a54fd96b7229cab236', 'Adresse user103', '05000', 'Gap', '2010-01-01', 'user103@swiss.priv', 'OK', '4-12-2012', 'images/avatar/uuser103.tmp'),
('gsb', 'user101', 'user101', 'c', '5531185c651ca6ec4045a1a54fd96b7229cab236', 'Adresse1', '05000', 'Ville1', '2014-10-05', 'gsb@gsb.priv', 'OK', '29-08-2014', NULL),
('visiteur', 'user102', 'user102', 'v', '5531185c651ca6ec4045a1a54fd96b7229cab236', 'Adresse user102', '99000', 'Ville de user102', NULL, 'user102@monsite.com', 'OK', '2011-12-31', 'images/avatar/user102.tmp');
