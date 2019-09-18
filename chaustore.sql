
--
-- Host: 164.132.110.233    Database: simplon_chaustore
-- ------------------------------------------------------
-- Server version	5.5.62-0+deb8u1

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
-- Table structure for table `brand`
--
DROP database IF EXISTS `simplon_chaustore`;
create Database simplon_chaustore;
USE simplon_chaustore;


DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Converse',NULL),(2,'Adidas',NULL),(3,'Nike',NULL),(4,'Les P\'tites Bombes',NULL),(5,'I Love Shoes',NULL),(6,'New Balance',NULL),(7,'Georgia Rose',NULL),(8,'Clarks Unstructured',NULL),(9,'Puma',NULL),(10,'Marvin&Co',NULL),(11,'Mr SARENZA',NULL),(12,'Clarks',NULL),(13,'Pier One',NULL);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Baskets'),(3,'Chaussures à lacets'),(4,'Escarpins'),(2,'Sandales et nu-pieds');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (12,'Beige'),(1,'Blanc'),(3,'Bleu'),(8,'Gris'),(5,'Jaune'),(11,'Marron'),(2,'Noir'),(9,'Orange'),(7,'Rose'),(4,'Rouge'),(6,'Vert'),(10,'Violet');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `category_id` int(11) unsigned NOT NULL,
  `brand_id` int(11) unsigned NOT NULL,
  `color_id` int(11) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `price` decimal(5,2) unsigned NOT NULL DEFAULT '0.00',
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  PRIMARY KEY (`id`),
  KEY `name` (`name`(191)),
  KEY `product_brand` (`brand_id`),
  KEY `product_color` (`color_id`),
  KEY `product_category` (`category_id`),
  CONSTRAINT `product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'All Star Dainty Canvas Ox W Blanc Optical',1,1,1,'',52.00,'F'),(2,'Superstar W Blanc Noir',1,2,1,'',99.99,'F'),(3,'Wmns Air Huarache Run White White',1,3,1,'',119.99,'F'),(4,'Gazelle W Rose Blanc',1,2,7,'',99.99,'F'),(5,'Wmns Classic Cortez Leather Blanc Rouge Bleu',1,3,1,'',85.00,'F'),(6,'Kaylin Alba Burgundy',4,12,4,'',99.95,'F'),(7,'Calla Rose Black',4,12,2,'',99.95,'F'),(8,'Petunia Noir',2,4,2,'',29.90,'F'),(9,'Benino Gold',2,5,11,'',39.00,'F'),(10,'W996 Light Cashmere',1,6,7,'',70.00,'F'),(11,'Gazelle W Gris Blanc',1,2,8,'',94.99,'F'),(12,'Inof Vaqueta Noir',2,7,2,'',89.00,'F'),(13,'Ipona Noir',2,7,2,'',59.00,'F'),(14,'Un Reisel Mara Black Leather',2,8,2,'',89.99,'F'),(15,'Suede Hyper Embelished Wn\'s Black White',1,9,2,'',90.00,'F'),(16,'Benino Black',2,5,2,'',39.00,'F'),(17,'Stan Smith Noir',1,2,2,'',94.99,'H'),(18,'Stan Smith Blanc Vert',1,2,1,'',81.00,'H'),(19,'Superstar Blanc Noir',1,2,1,'',99.99,'H'),(20,'Suede Classic+ Peacoat White',1,9,3,'',80.00,'H'),(21,'Chuck Taylor All Star Hi M Blanc Optical',1,1,1,'',69.99,'M'),(22,'Star Player Ev Canvas Ox M Marine Blanc',1,1,3,'',58.50,'H'),(23,'Classic Cortez Nylon Obsidian White',1,3,3,'',80.00,'H'),(24,'Satingh Brown',3,10,11,'',79.00,'H'),(25,'Southampton Bleu',3,11,3,'',109.00,'H'),(26,'Suttino Beige',3,10,12,'',79.00,'H'),(27,'Nastie Bruciato',3,11,11,'',149.00,'H'),(28,'Stall Brown',3,11,11,'',119.00,'H'),(29,'Rilmot',3,11,11,'',99.00,'H');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,'35'),(2,'35 1/2'),(3,'36'),(4,'36 1/2'),(5,'37'),(6,'37 1/2'),(7,'38'),(8,'38 1/2'),(9,'39'),(10,'39 1/2'),(11,'40'),(12,'40 1/2'),(13,'41'),(14,'41 1/2'),(15,'42'),(16,'42 1/2'),(17,'43'),(18,'43 1/2'),(19,'44'),(20,'44 1/2'),(21,'45'),(22,'45 1/2'),(23,'46'),(24,'46 1/2'),(25,'47'),(26,'47 1/2'),(27,'48');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `product_id` int(11) unsigned NOT NULL,
  `size_id` int(11) unsigned NOT NULL,
  `stock` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`,`size_id`),
  KEY `size_product` (`size_id`),
  CONSTRAINT `product_size` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `size_product` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,2,2),(1,3,8),(1,4,0),(1,5,9),(1,7,4),(1,8,8),(1,10,3),(1,11,10),(1,12,8),(1,13,0),(1,14,5),(1,15,5),(1,16,3),(2,1,5),(2,5,7),(2,6,4),(2,7,0),(2,8,3),(2,9,9),(2,10,8),(2,11,3),(2,12,8),(2,13,10),(2,14,10),(2,15,8),(3,1,0),(3,4,1),(3,5,9),(3,6,7),(3,7,1),(3,8,7),(3,9,9),(3,10,10),(3,12,7),(3,14,2),(3,15,4),(3,16,7),(4,1,6),(4,2,7),(4,4,8),(4,6,10),(4,8,5),(4,9,5),(4,10,3),(4,11,2),(4,12,9),(4,15,6),(4,16,8),(5,1,7),(5,2,7),(5,3,5),(5,4,5),(5,5,3),(5,6,5),(5,7,6),(5,8,9),(5,9,8),(5,12,1),(5,14,6),(5,15,3),(5,16,3),(6,1,10),(6,2,2),(6,3,5),(6,4,2),(6,5,3),(6,6,7),(6,7,9),(6,8,10),(6,9,5),(6,10,10),(6,11,7),(6,13,1),(6,15,6),(7,2,3),(7,3,2),(7,4,5),(7,5,5),(7,6,6),(7,7,0),(7,8,6),(7,9,2),(7,13,8),(7,16,1),(8,1,3),(8,2,0),(8,3,9),(8,4,7),(8,5,3),(8,9,2),(8,10,0),(8,11,2),(8,12,0),(8,13,8),(8,15,8),(8,16,4),(9,2,0),(9,3,2),(9,4,8),(9,6,3),(9,8,9),(9,9,9),(9,10,9),(9,11,2),(9,12,1),(9,14,1),(9,15,0),(9,16,8),(10,1,10),(10,4,8),(10,5,8),(10,6,0),(10,7,3),(10,8,0),(10,9,10),(10,10,7),(10,13,1),(10,16,9),(11,2,8),(11,3,5),(11,4,4),(11,8,3),(11,10,10),(11,11,2),(11,12,6),(11,14,7),(11,15,10),(11,16,0),(12,1,6),(12,2,7),(12,3,8),(12,5,4),(12,7,9),(12,8,2),(12,9,9),(12,10,2),(12,11,4),(12,12,3),(12,13,5),(12,14,4),(12,15,9),(13,2,6),(13,3,9),(13,4,8),(13,7,2),(13,8,4),(13,9,3),(13,10,10),(13,11,0),(13,12,4),(13,13,8),(13,14,4),(13,15,9),(14,1,2),(14,2,3),(14,4,9),(14,5,5),(14,6,9),(14,7,8),(14,9,3),(14,10,3),(14,11,8),(14,12,4),(15,1,5),(15,2,0),(15,4,2),(15,5,2),(15,6,0),(15,7,3),(15,8,5),(15,9,2),(15,10,10),(15,11,6),(15,12,3),(15,13,1),(15,16,0),(16,3,8),(16,6,7),(16,7,3),(16,9,6),(16,10,4),(16,11,5),(16,12,5),(16,13,9),(16,15,8),(17,7,9),(17,8,10),(17,9,7),(17,10,3),(17,11,5),(17,12,10),(17,13,10),(17,14,6),(17,15,10),(17,16,8),(17,17,7),(17,18,10),(17,19,6),(17,20,9),(17,23,3),(17,25,7),(17,26,10),(17,27,3),(18,8,10),(18,9,5),(18,10,1),(18,11,6),(18,12,3),(18,14,5),(18,15,1),(18,18,5),(18,19,0),(18,20,7),(18,23,8),(18,25,4),(18,26,0),(18,27,7),(19,9,4),(19,10,2),(19,12,2),(19,14,5),(19,17,4),(19,18,9),(19,19,5),(19,20,5),(19,21,9),(19,22,9),(19,24,2),(19,26,7),(19,27,6),(20,7,4),(20,8,5),(20,9,9),(20,10,3),(20,11,4),(20,13,1),(20,14,3),(20,15,10),(20,16,3),(20,17,6),(20,18,8),(20,21,2),(20,22,10),(20,23,0),(20,26,3),(20,27,2),(21,9,1),(21,11,10),(21,12,4),(21,13,2),(21,14,7),(21,16,4),(21,17,9),(21,18,4),(21,19,1),(21,20,1),(21,21,7),(21,22,9),(21,24,2),(21,26,8),(21,27,10),(22,9,1),(22,10,8),(22,13,1),(22,14,5),(22,17,9),(22,18,7),(22,19,4),(22,20,5),(22,21,7),(22,23,2),(22,25,2),(22,26,4),(22,27,10),(23,7,3),(23,8,8),(23,9,3),(23,12,7),(23,13,1),(23,14,8),(23,16,7),(23,17,5),(23,18,2),(23,21,7),(23,22,0),(23,23,3),(23,24,6),(23,25,9),(23,26,0),(23,27,7),(24,7,10),(24,8,5),(24,10,2),(24,11,0),(24,12,0),(24,13,6),(24,14,1),(24,15,7),(24,16,4),(24,17,8),(24,18,3),(24,19,3),(24,20,2),(24,22,4),(24,23,1),(24,24,1),(24,25,9),(24,26,5),(24,27,2),(25,7,6),(25,12,6),(25,13,3),(25,14,8),(25,15,0),(25,16,8),(25,17,6),(25,18,4),(25,20,1),(25,21,4),(25,22,1),(25,24,6),(25,25,3),(25,26,8),(26,7,3),(26,8,8),(26,10,10),(26,11,9),(26,12,6),(26,13,8),(26,14,2),(26,16,10),(26,17,0),(26,18,6),(26,19,2),(26,20,8),(26,21,4),(26,22,3),(26,23,4),(26,24,5),(26,25,6),(26,26,0),(26,27,5),(27,7,9),(27,8,0),(27,9,5),(27,10,9),(27,13,10),(27,15,4),(27,17,8),(27,19,4),(27,21,10),(27,22,2),(27,23,9),(27,24,0),(27,25,2),(27,26,6),(27,27,1),(28,8,8),(28,9,0),(28,10,6),(28,11,5),(28,12,7),(28,14,1),(28,15,0),(28,16,1),(28,17,0),(28,18,0),(28,19,2),(28,20,3),(28,22,5),(28,23,1),(28,24,0),(28,25,3),(28,26,7),(29,7,3),(29,8,1),(29,10,10),(29,11,9),(29,12,8),(29,13,8),(29,14,0),(29,15,7),(29,16,6),(29,17,2),(29,18,9),(29,19,0),(29,21,7),(29,22,9),(29,23,4),(29,24,4),(29,25,2),(29,26,1);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-18 14:18:03
