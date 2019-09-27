-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u815255986_bac
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `CategorieProduit`
--

DROP TABLE IF EXISTS `CategorieProduit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CategorieProduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idType` int(11) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CategorieProduit`
--

/*!40000 ALTER TABLE `CategorieProduit` DISABLE KEYS */;
INSERT INTO `CategorieProduit` VALUES (1,1,'Radiateur à inertie'),(2,1,'Radiateur rayonnant'),(3,1,'Convecteur'),(4,1,' Radiateurs à fluide caloporte'),(5,1,'Sèche serviettes'),(6,1,'Radiateurs Chauffage Central'),(7,1,'Accumulateurs'),(8,1,'Radiateurs en pierre'),(9,1,'Radiateur électrique à fort po'),(10,1,'Radiateur électrique à inertie'),(11,2,'Climatiseurs Mono Split'),(12,2,'Climatiseurs Bi-splits'),(13,2,'Climatiseurs Tri-splits'),(14,2,'Climatiseurs Quadri-splits'),(15,2,'Unites Interieures pour Climat'),(17,2,'Unites Exterieures pour Climat'),(18,2,'Climatiseurs mobiles'),(19,2,'Climatisation gainable'),(20,3,'Planchers et plafonds chauffan'),(21,3,'Plancher chauffant hydraulique'),(22,4,'Pompe à chaleur air/eau'),(23,4,'Pompes à chaleur de piscines');
/*!40000 ALTER TABLE `CategorieProduit` ENABLE KEYS */;

--
-- Table structure for table `Commande`
--

DROP TABLE IF EXISTS `Commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Commande`
--

/*!40000 ALTER TABLE `Commande` DISABLE KEYS */;
INSERT INTO `Commande` VALUES (13,1,'nq542zfkjsedulwy9xt681cbia0gomv7prh3',4500,'ANN'),(14,0,'i3jcdm6ot98s14kqg2nbe5zxwvyur0ahlfp7',0,'ATT');
/*!40000 ALTER TABLE `Commande` ENABLE KEYS */;

--
-- Table structure for table `Contient`
--

DROP TABLE IF EXISTS `Contient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contient`
--

/*!40000 ALTER TABLE `Contient` DISABLE KEYS */;
INSERT INTO `Contient` VALUES (2,13,1,3);
/*!40000 ALTER TABLE `Contient` ENABLE KEYS */;

--
-- Table structure for table `Produit`
--

DROP TABLE IF EXISTS `Produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `idType` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produit`
--

/*!40000 ALTER TABLE `Produit` DISABLE KEYS */;
INSERT INTO `Produit` VALUES (1,'img1','nom1',1500,1,1),(2,'img2','nom2',2000,1,3),(3,'img3','nom3',1000,2,11),(4,'img4','nom4',2500,2,13);
/*!40000 ALTER TABLE `Produit` ENABLE KEYS */;

--
-- Table structure for table `TypeProduit`
--

DROP TABLE IF EXISTS `TypeProduit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TypeProduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TypeProduit`
--

/*!40000 ALTER TABLE `TypeProduit` DISABLE KEYS */;
INSERT INTO `TypeProduit` VALUES (1,'Radiateur'),(2,'Climatisation'),(3,'Plancher chauffant'),(4,'Pompe à chaleur');
/*!40000 ALTER TABLE `TypeProduit` ENABLE KEYS */;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `mdp` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'admin','admin','admin','admin','admin','admin','admin','root','ini01'),(2,'Payan','Benjamin','5 Bis Rue Carnot','05000','Gap','0616358962','bpayanpsl@gmail.com','bpayan','Zmcub2');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;

--
-- Dumping events for database 'u815255986_bac'
--

--
-- Dumping routines for database 'u815255986_bac'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-21 14:10:31
