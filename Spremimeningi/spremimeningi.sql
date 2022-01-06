-- Progettazione Web 
DROP DATABASE if exists spremimeningi; 
CREATE DATABASE spremimeningi; 
USE spremimeningi; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: spremimeningi
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `score` (
  `username` varchar(50) NOT NULL,
  `gioco` varchar(50) NOT NULL,
  `difficolta` varchar(50) NOT NULL,
  `mosse` int(10) NOT NULL,
  `tempo` int(10) NOT NULL,
  `idscore` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idscore`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
INSERT INTO `score` VALUES ('Bicchie','TorreHanoi','Facile',20,27,8),('Bicchie','Gioco15','Facile',69,33,9),('Bicchie','Gioco15','Medio',226,101,10),('Nixon','TorreHanoi','Difficile',78,132,11),('Bicchie','Gioco15','Facile',67,96,12),('Roosevelt','Sudoku','Difficile',132,534,13),('Bicchie','TorreHanoi','Difficile',89,324,14),('Roosevelt','Gioco15','Medio',143,356,15),('Nixon','TorreHanoi','Facile',17,33,16),('Roosevelt','TorreHanoi','Facile',23,33,17),('Nixon','TorreHanoi','Facile',15,23,18),('Roosevelt','TorreHanoi','Facile',19,38,19),('Bicchie','TorreHanoi','Medio',31,123,20),('Roosevelt','TorreHanoi','Medio',45,139,21),('Nixon','TorreHanoi','Medio',87,111,22),('Nixon','TorreHanoi','Medio',66,125,23),('Bicchie','TorreHanoi','Medio',78,200,24),('Roosevelt','TorreHanoi','Difficile',67,154,25),('Bicchie','Sudoku','Facile',87,243,26),('Roosevelt','Sudoku','Facile',97,265,27),('Nixon','Sudoku','Facile',55,129,28),('Nixon','Sudoku','Facile',44,187,29),('Bicchie','Sudoku','Facile',88,253,30),('Nixon','Sudoku','Medio',87,243,31),('Roosevelt','Sudoku','Medio',99,287,32),('Bicchie','Sudoku','Medio',61,321,33),('Roosevelt','Sudoku','Medio',137,342,34),('Bicchie','Sudoku','Difficile',87,432,35),('Roosevelt','Sudoku','Difficile',121,500,36),('Nixon','Sudoku','Difficile',81,398,37),('Nixon','Gioco15','Facile',37,13,38),('Roosevelt','Gioco15','Facile',81,36,39),('Roosevelt','Gioco15','Medio',249,110,40),('Nixon','Gioco15','Medio',345,234,41),('Nixon','Gioco15','Medio',376,183,42),('Roosevelt','TorreHanoi','Facile',33,326,43),('Roosevelt','Gioco15','Facile',68,265,44),('Roosevelt','Gioco15','Medio',390,182,45),('Bicchie','Gioco15','Difficile',675,876,46),('Roosevelt','Gioco15','Difficile',597,765,47),('Nixon','Gioco15','Difficile',443,654,48),('Nixon','Gioco15','Difficile',865,1092,49);
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utenti` (
  `username` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES ('admin','admin','admin','bicchierini.iacopo@gmail.com','$2y$10$81jT8veS6IMoKL4ZVSl9n.FkGTfXL/Xmt9j2V.W6eJ7YSE3utgqXi'),('Bicchie','Iacopo','Bicchierini','bicchierini.iacopo@gmail.com','$2y$10$OeRjEvPXTCXnf95CZVQjp.bIEDSoWBPbTBV8y73PeprC.bvJZkvoi'),('Nixon','Richard','Nixon','richardnixon@whitehouse.gov','$2y$10$Ml5R.ZbzmSabdFgSdCHUpOHAxXERtwGJIYjgD3WDCI8H94NbaiEdy'),('Roosevelt','Franklin','Roosevelt','fdk@whitehouse.gov','$2y$10$fxNU0iK7tM6qMsUVmMVShO9lrN0.GF4PUvElSGFSDh03AUyHjKjV6');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-11 11:16:04
