-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: shopclother
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
-- Table structure for table `Bill`
--

DROP TABLE IF EXISTS `Bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bill` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(20) NOT NULL,
  `total_price` double NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Bill_ibfk_1` (`id_user`),
  CONSTRAINT `Bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bill`
--

LOCK TABLES `Bill` WRITE;
/*!40000 ALTER TABLE `Bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `Bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Categorys`
--

DROP TABLE IF EXISTS `Categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categorys` (
  `id_category` int(20) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categorys`
--

LOCK TABLES `Categorys` WRITE;
/*!40000 ALTER TABLE `Categorys` DISABLE KEYS */;
INSERT INTO `Categorys` VALUES (1,'men'),(2,'women');
/*!40000 ALTER TABLE `Categorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Feedback`
--

DROP TABLE IF EXISTS `Feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Feedback` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `number_phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Feedback`
--

LOCK TABLES `Feedback` WRITE;
/*!40000 ALTER TABLE `Feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `Feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orderdetail`
--

DROP TABLE IF EXISTS `Orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orderdetail` (
  `id` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `id_order` int(20) NOT NULL,
  `quality` int(20) NOT NULL,
  KEY `Orderdetail_ibfk_1` (`id_product`),
  KEY `Orderdetail_ibfk_2` (`id_order`),
  CONSTRAINT `Orderdetail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `Products` (`id_product`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Orderdetail_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `Bill` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orderdetail`
--

LOCK TABLES `Orderdetail` WRITE;
/*!40000 ALTER TABLE `Orderdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `Orderdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Productimage`
--

DROP TABLE IF EXISTS `Productimage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Productimage` (
  `id_product_img` int(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id_product_img`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Productimage`
--

LOCK TABLES `Productimage` WRITE;
/*!40000 ALTER TABLE `Productimage` DISABLE KEYS */;
INSERT INTO `Productimage` VALUES (1,'tuiview.jpg');
/*!40000 ALTER TABLE `Productimage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Products` (
  `id_product` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `quality` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `id_category` int(20) NOT NULL,
  `id_product_img` int(20) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_product_img` (`id_product_img`),
  KEY `id_product_img_2` (`id_product_img`),
  KEY `id_product_img_3` (`id_product_img`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`id_product_img`) REFERENCES `Productimage` (`id_product_img`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `Products_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `Categorys` (`id_category`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES (1,'ao nam','dep roi',2,100,1,1,'2018-10-03'),(2,'ao nu','dep rooi',3,3,2,1,'2018-10-03');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_feedback` int(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_confirm` varchar(100) NOT NULL,
  `rule` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `User_ibfk_1` (`id_feedback`),
  CONSTRAINT `User_ibfk_1` FOREIGN KEY (`id_feedback`) REFERENCES `Feedback` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-20 10:23:52
