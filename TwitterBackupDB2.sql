-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: Twitter
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(60) DEFAULT NULL,
  `Tweet_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `creationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Comment_Tweet1_idx` (`Tweet_id`),
  KEY `fk_Comment_User1_idx` (`User_id`),
  CONSTRAINT `fk_Comment_Tweet1` FOREIGN KEY (`Tweet_id`) REFERENCES `Tweet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comment`
--

LOCK TABLES `Comment` WRITE;
/*!40000 ALTER TABLE `Comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `Comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id_from` int(11) NOT NULL,
  `User_id_to` int(11) NOT NULL,
  `content` text NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_Message_User1_idx` (`User_id_from`),
  KEY `fk_Message_User2_idx` (`User_id_to`),
  CONSTRAINT `fk_Message_User1` FOREIGN KEY (`User_id_from`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Message_User2` FOREIGN KEY (`User_id_to`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tweet`
--

DROP TABLE IF EXISTS `Tweet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `message` varchar(140) NOT NULL,
  `creationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Tweet_User_idx` (`User_id`),
  CONSTRAINT `fk_Tweet_User` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tweet`
--

LOCK TABLES `Tweet` WRITE;
/*!40000 ALTER TABLE `Tweet` DISABLE KEYS */;
INSERT INTO `Tweet` VALUES (1,48,'Lubie placki','2016-11-11 00:00:01'),(2,49,'Lubie ciasto','2016-11-11 00:00:02'),(3,50,'Nie lubie plackow','2016-11-11 00:00:03'),(4,50,'pozdrowienia z nad morza!','2016-11-12 13:29:51'),(5,50,'Åeba to jest to!','2016-11-12 15:21:36'),(6,50,'idziemy do zoo!','2016-11-12 16:51:47'),(7,50,'czy pokaze sie?','2016-11-12 19:22:11'),(8,50,'test it now','2016-11-12 19:22:53'),(9,50,'testowosdsd','2016-11-12 19:34:34'),(10,50,'testowosdsd','2016-11-12 19:35:46'),(11,50,'testowosdsd','2016-11-12 19:36:58'),(12,50,'testowosdsd','2016-11-12 19:39:25'),(13,50,'testowosdsd','2016-11-12 19:40:37'),(14,50,'testowosdsd','2016-11-12 19:41:36'),(15,50,'testowosdsd','2016-11-12 19:44:43'),(16,50,'testowosdsd','2016-11-12 19:45:27'),(17,50,'asdasdadasdasdasd','2016-11-12 20:59:41'),(18,50,'a to dziwne','2016-11-13 18:38:49'),(19,50,'pisze duzo losowych tekstÃ³w','2016-11-13 18:39:16'),(20,50,'a to dziwne','2016-11-13 18:39:25'),(21,50,'zaÅ¼Ã³Å‚Ä‡ gÄ™Å›lÄ… jaÅºÅ„','2016-11-13 18:39:37'),(22,50,'zaÅ¼Ã³Å‚Ä‡ gÄ™Å›lÄ… jaÅºÅ„','2016-11-13 18:45:31'),(23,50,'zaÅ¼Ã³Å‚Ä‡ gÄ™Å›lÄ… jaÅºÅ„','2016-11-13 18:50:59'),(24,50,'zaÅ¼Ã³Å‚Ä‡ gÄ™Å›lÄ… jaÅºÅ„','2016-11-13 18:52:02'),(25,50,'zaÅ¼Ã³Å‚Ä‡ gÄ™Å›lÄ… jaÅºÅ„','2016-11-13 18:52:50'),(26,50,'zaÅ¼Ã³Å‚Ä‡ gÄ™Å›lÄ… jaÅºÅ„','2016-11-13 18:53:21');
/*!40000 ALTER TABLE `Tweet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (48,'ala','$2y$10$yT/Pg8xiz7c2WJYqxNI7s.02cTLnumlx9OsyncKGA4lwPL3WUl3w.','ala@ala.pl'),(49,'a','$2y$11$6vNFTHK/7bPeVmjN6khYd.Sv37hI6lnu1N35gFc8K/1U.0CyS82xm','ada@ada.pl'),(50,'piotr','$2y$10$u4wb4IYZiMPl13C7ZZTnfeTB58yCPXZPgEkeP6o2VS/bwvUUhT/au','piotr@piotr.pl');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'Twitter'
--

--
-- Dumping routines for database 'Twitter'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-13 23:30:15
