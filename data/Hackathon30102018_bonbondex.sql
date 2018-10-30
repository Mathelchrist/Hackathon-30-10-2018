-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: Hackathon30102018
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `bonbondex`
--

DROP TABLE IF EXISTS `bonbondex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bonbondex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joueur_id` int(11) NOT NULL,
  `bonbon_id` int(11) NOT NULL,
  `quantite` int(11) DEFAULT '1',
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_bonbon` (`bonbon_id`),
  KEY `FK_joueur` (`joueur_id`),
  CONSTRAINT `FK_joueur` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`id`),
  CONSTRAINT `Fk_bonbon` FOREIGN KEY (`bonbon_id`) REFERENCES `bonbon` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonbondex`
--

LOCK TABLES `bonbondex` WRITE;
/*!40000 ALTER TABLE `bonbondex` DISABLE KEYS */;
INSERT INTO `bonbondex` VALUES (1,1,79,1,1.92405,47.9202),(2,1,80,1,1.85125,47.8856),(3,2,84,1,1.90122,47.8957);
/*!40000 ALTER TABLE `bonbondex` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-30 23:55:26
