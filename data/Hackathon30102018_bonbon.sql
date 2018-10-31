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
-- Table structure for table `bonbon`
--

DROP TABLE IF EXISTS `bonbon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bonbon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `code_barre` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bonbon_categorie` (`categorie_id`),
  CONSTRAINT `FK_bonbon_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonbon`
--

LOCK TABLES `bonbon` WRITE;
/*!40000 ALTER TABLE `bonbon` DISABLE KEYS */;
INSERT INTO `bonbon` VALUES (79,'Tagada L\'originale','https://static.openfoodfacts.org/images/products/310/322/000/9574/front_fr.77.200.jpg','3103220009574',1),(80,'Ferrero Rocher Boîte De 30','https://static.openfoodfacts.org/images/products/800/050/016/7113/front_fr.18.200.jpg','8000500167113',1),(81,'M&ms Peanut','https://static.openfoodfacts.org/images/products/500/015/945/2595/front_fr.26.200.jpg','5000159452595',1),(82,'M&m\'s','https://static.openfoodfacts.org/images/products/40111445/front_fr.17.200.jpg','40111445',1),(83,'Schoko-bons','https://static.openfoodfacts.org/images/products/541/354/828/0677/front_fr.17.200.jpg','5413548280677',1),(84,'Tic Tac','https://static.openfoodfacts.org/images/products/80050124/front_fr.39.200.jpg','80050124',1),(85,'M&m\'s','https://static.openfoodfacts.org/images/products/500/015/938/6821/front_fr.6.200.jpg','5000159386821',1),(86,'Ricola Menthol Extra Fort','https://static.openfoodfacts.org/images/products/761/070/061/2064/front_fr.13.200.jpg','7610700612064',1),(87,'Ricola Citron Melisse','https://static.openfoodfacts.org/images/products/761/070/060/7046/front_fr.26.200.jpg','7610700607046',1),(88,'Tagada Pink Qui P!k','https://static.openfoodfacts.org/images/products/310/322/003/2008/front_fr.16.200.jpg','3103220032008',1),(89,'Fraises Tagada','https://static.openfoodfacts.org/images/products/310/322/000/9406/front_fr.39.200.jpg','3103220009406',1),(90,'Tagada Purple Intense','https://static.openfoodfacts.org/images/products/310/322/003/7577/front_fr.21.200.jpg','3103220037577',1),(91,'Maltesers','https://static.openfoodfacts.org/images/products/500/015/903/1103/front_fr.36.200.jpg','5000159031103',1),(92,'Polka','https://static.openfoodfacts.org/images/products/310/322/000/9062/front_fr.17.200.jpg','3103220009062',1),(93,'Bonbon Haribo Hari Croco','https://static.openfoodfacts.org/images/products/310/322/000/9413/front_fr.20.200.jpg','3103220009413',1),(94,'Maltesers (maxi Pack)','https://static.openfoodfacts.org/images/products/500/015/943/7967/front_fr.8.200.jpg','5000159437967',1),(95,'Régal\'ad','https://static.openfoodfacts.org/images/products/350/914/000/8824/front_fr.15.200.jpg','3509140008824',1),(96,'Haribo Tagada Originale','https://static.openfoodfacts.org/images/products/310/322/003/1599/front_fr.20.200.jpg','3103220031599',1),(97,'Smarties Mini','https://static.openfoodfacts.org/images/products/400/550/000/3816/front_fr.21.200.jpg','4005500003816',1),(98,'Arlequin Original','https://static.openfoodfacts.org/images/products/311/674/001/7332/front_fr.28.200.jpg','3116740017332',1),(99,'Chamallows','https://static.openfoodfacts.org/images/products/310/322/000/9512/front_fr.37.200.jpg','3103220009512',1),(100,'Tic Tac Menthe','https://static.openfoodfacts.org/images/products/80052043/front_fr.16.200.jpg','80052043',1),(101,'Koala','https://static.openfoodfacts.org/images/products/311/674/001/1248/front_fr.8.200.jpg','3116740011248',1),(102,'Pastilles Parfum Menthe','https://static.openfoodfacts.org/images/products/316/187/907/2400/front_fr.33.200.jpg','3161879072400',1),(103,'Bubblizz Original','https://static.openfoodfacts.org/images/products/541/005/716/9110/front_fr.16.200.jpg','5410057169110',1),(104,'Ricola Cranberry Bonbons Suisses Aux Plantes','https://static.openfoodfacts.org/images/products/761/070/061/4914/front_fr.53.200.jpg','7610700614914',1),(105,'Smarties X5','https://static.openfoodfacts.org/images/products/40056470/front_fr.17.200.jpg','40056470',1),(106,'Daim','https://static.openfoodfacts.org/images/products/762/230/056/7606/front_fr.52.200.jpg','7622300567606',1),(107,'Sensation Fruit Framboise & Cranberry','https://static.openfoodfacts.org/images/products/304/692/004/5315/front_fr.35.200.jpg','3046920045315',1),(108,'Tirlibibi','https://static.openfoodfacts.org/images/products/310/322/000/9956/front_fr.6.200.jpg','3103220009956',1),(109,'Celebrations','https://static.openfoodfacts.org/images/products/500/015/936/4560/front_fr.9.200.jpg','5000159364560',1),(110,'Sensation Fruit Myrtille & Açaï','https://static.openfoodfacts.org/images/products/304/692/004/5308/front_fr.10.200.jpg','3046920045308',1),(111,'Têtes Brûlées Fraise/framboise','https://static.openfoodfacts.org/images/products/350/127/111/3033/front_fr.15.200.jpg','3501271113033',1),(112,'Dragibus','https://static.openfoodfacts.org/images/products/310/322/002/5338/front_fr.29.200.jpg','3103220025338',1),(113,'Têtes Brûlées : Le Kysmache Goût Cola','https://static.openfoodfacts.org/images/products/350/127/112/6040/front_fr.6.200.jpg','3501271126040',1),(114,'Bonbons Goût Fruit','https://static.openfoodfacts.org/images/products/356/007/031/9169/front_fr.8.200.jpg','3560070319169',1),(115,'Werther\'s Original','https://static.openfoodfacts.org/images/products/40144283/front_fr.36.200.jpg','40144283',1),(116,'Mini Chupa Chups','https://static.openfoodfacts.org/images/products/460/179/803/0055/front_fr.3.200.jpg','4601798030055',1),(117,'Carensac','https://static.openfoodfacts.org/images/products/310/322/003/0424/front_fr.9.200.jpg','3103220030424',1),(118,'Batna','https://static.openfoodfacts.org/images/products/350/914/000/8916/front_fr.16.200.jpg','3509140008916',1),(119,'Skittles Fruits','https://static.openfoodfacts.org/images/products/500/015/902/1692/front_fr.3.200.jpg','5000159021692',1),(120,'M&m\'s Peanut','https://static.openfoodfacts.org/images/products/500/015/949/2874/front_fr.7.200.jpg','5000159492874',1),(121,'After Eight','https://static.openfoodfacts.org/images/products/500/042/617/1518/front_fr.32.200.jpg','5000426171518',1),(122,'Bonbons Suisses Aux Plantes Citron - Mélisse','https://static.openfoodfacts.org/images/products/761/070/094/6961/front_fr.32.200.jpg','7610700946961',1),(123,'Mao Croqui','https://static.openfoodfacts.org/images/products/310/322/000/6658/front_fr.4.200.jpg','3103220006658',1),(124,'Rotella L\'original','https://static.openfoodfacts.org/images/products/310/322/000/9635/front_fr.7.200.jpg','3103220009635',1),(125,'Têtes Brûlées Star Effet Rose à Lèvres','https://static.openfoodfacts.org/images/products/350/127/112/0024/front_fr.9.200.jpg','3501271120024',1),(126,'Flexi-fizz','https://static.openfoodfacts.org/images/products/541/005/718/7039/front_fr.6.200.jpg','5410057187039',1),(127,'Bonbons Eucalyptus','https://static.openfoodfacts.org/images/products/761/070/062/6382/front_fr.45.200.jpg','7610700626382',1),(128,'Haribo Zanzigliss','https://static.openfoodfacts.org/images/products/310/322/002/5956/front_fr.16.200.jpg','3103220025956',1),(129,'Longfizz','https://static.openfoodfacts.org/images/products/311/674/003/0393/front_fr.3.200.jpg','3116740030393',1),(130,'Mon Chéri','https://static.openfoodfacts.org/images/products/400/840/081/1727/front_fr.23.200.jpg','4008400811727',1),(131,'Orange-menthe','https://static.openfoodfacts.org/images/products/761/070/060/7077/front_fr.26.200.jpg','7610700607077',1),(132,'Régal\'ad','https://static.openfoodfacts.org/images/products/762/221/042/9056/front_fr.8.200.jpg','7622210429056',1),(133,'Les Pyrénéens Lait','https://static.openfoodfacts.org/images/products/304/692/000/7009/front_fr.21.200.jpg','3046920007009',1),(134,'Bonbons Lutti Scoubidou','https://static.openfoodfacts.org/images/products/311/674/002/7317/front_fr.6.200.jpg','3116740027317',1),(135,'L\'authentique Petit Ourson Guimauve','https://static.openfoodfacts.org/images/products/317/328/920/9598/front_fr.11.200.jpg','3173289209598',1),(136,'Ricola Menthol','https://static.openfoodfacts.org/images/products/761/070/062/6405/front_fr.22.200.jpg','7610700626405',1),(137,'Les Pyrénéens Lait Noir','https://static.openfoodfacts.org/images/products/304/692/000/7672/front_fr.7.200.jpg','3046920007672',1),(138,'Dragibus Color Pops','https://static.openfoodfacts.org/images/products/310/322/003/8321/front_fr.7.200.jpg','3103220038321',1),(139,'Lutti Noir Intense Koala','https://static.openfoodfacts.org/images/products/311/674/003/0997/front_fr.13.200.jpg','3116740030997',1),(140,'Ricola Aux Plantes','https://static.openfoodfacts.org/images/products/761/070/060/1624/front_fr.3.200.jpg','7610700601624',1),(141,'Ricola Argousier','https://static.openfoodfacts.org/images/products/761/070/062/4234/front_fr.35.200.jpg','7610700624234',1),(142,'Intense Mint Menthe Extra-fraiche','https://static.openfoodfacts.org/images/products/800/050/011/9358/front_fr.25.200.jpg','8000500119358',1),(143,'Surffizz Goûts Fruits Extra Acide','https://static.openfoodfacts.org/images/products/871/380/011/0146/front_fr.15.200.jpg','8713800110146',1);
/*!40000 ALTER TABLE `bonbon` ENABLE KEYS */;
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
