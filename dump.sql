-- MySQL dump 10.13  Distrib 5.5.24, for Win64 (x86)
--
-- Host: localhost    Database: personalmaps
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authassignment`
--

LOCK TABLES `authassignment` WRITE;
/*!40000 ALTER TABLE `authassignment` DISABLE KEYS */;
INSERT INTO `authassignment` VALUES ('admin','1',NULL,'N;'),('user','2',NULL,'N;'),('user','3',NULL,'N;'),('user','4',NULL,'N;'),('user','5',NULL,'N;'),('user','6',NULL,'N;');
/*!40000 ALTER TABLE `authassignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authitem`
--

DROP TABLE IF EXISTS `authitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authitem`
--

LOCK TABLES `authitem` WRITE;
/*!40000 ALTER TABLE `authitem` DISABLE KEYS */;
INSERT INTO `authitem` VALUES ('addPlace',0,'create place',NULL,'N;'),('addUser',0,'create user',NULL,'N;'),('admin',2,'',NULL,'N;'),('deleteOwnPlace',1,'delete own place','return Yii::app()->user->id==$params[\"place\"]->p_user_id;','N;'),('deletePlace',0,'delete place',NULL,'N;'),('deleteUser',0,'delete user',NULL,'N;'),('updateOwnPlace',1,'edit own place','return Yii::app()->user->id==$params[\"place\"]->p_user_id;','N;'),('updatePlace',0,'update place',NULL,'N;'),('updateUser',0,'update user',NULL,'N;'),('user',2,'',NULL,'N;'),('viewOwnPlace',1,'view own place','return Yii::app()->user->id==$params[\"place\"]->p_user_id;','N;'),('viewPlace',0,'view place',NULL,'N;'),('viewPlaces',0,'view places',NULL,'N;'),('viewUser',0,'view user',NULL,'N;'),('viewUsers',0,'view users',NULL,'N;');
/*!40000 ALTER TABLE `authitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authitemchild`
--

LOCK TABLES `authitemchild` WRITE;
/*!40000 ALTER TABLE `authitemchild` DISABLE KEYS */;
INSERT INTO `authitemchild` VALUES ('user','addPlace'),('admin','addUser'),('user','deleteOwnPlace'),('deleteOwnPlace','deletePlace'),('admin','deleteUser'),('user','updateOwnPlace'),('updateOwnPlace','updatePlace'),('admin','updateUser'),('admin','user'),('user','viewOwnPlace'),('viewOwnPlace','viewPlace'),('user','viewPlaces'),('admin','viewUser'),('admin','viewUsers');
/*!40000 ALTER TABLE `authitemchild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pm_places`
--

DROP TABLE IF EXISTS `pm_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) NOT NULL,
  `p_description` varchar(255) NOT NULL,
  `p_lng` float NOT NULL,
  `p_lat` float NOT NULL,
  `p_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`p_user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`p_user_id`) REFERENCES `pm_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pm_places`
--

LOCK TABLES `pm_places` WRITE;
/*!40000 ALTER TABLE `pm_places` DISABLE KEYS */;
INSERT INTO `pm_places` VALUES (1,'Алжир','Страна в Африке',2.81,27.84,1),(2,'Киев','Столица Украины',30.54,50.43,1),(3,'Москва','Столица РФ',37.66,55.73,1),(4,'Таллин','Столица Эстонии',24.72,59.43,4),(5,'Рига','Столица Латвии',24.13,56.94,4);
/*!40000 ALTER TABLE `pm_places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pm_users`
--

DROP TABLE IF EXISTS `pm_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pm_users`
--

LOCK TABLES `pm_users` WRITE;
/*!40000 ALTER TABLE `pm_users` DISABLE KEYS */;
INSERT INTO `pm_users` VALUES (1,'admin','admin@site.loc','$2a$13$t2w8Lv.sUcr6IhStIeQX3.tn6wbJbKzaKEKIlZqyHUpB0mVI9BGUO','admin'),(4,'user1','user1@mail.ru','$2a$13$K/ktUm8qbO8Z9glPoD/OK.qj90cH7nFUxthh29MdL/9YbQB/G35rK','user'),(5,'user2','user2@mail.ru','$2a$13$pfEUym8fSiYMLy/mirjXVOB0GKjyuiPcp8xAMiq40.AB9Dh06Ocxu','user'),(6,'user3','user3@mail.ru','$2a$13$JdTIszORsNqK8PbzZwXDA.RDNCRfkki4Hlnvnxz/GD9InC9KP3iIi','user');
/*!40000 ALTER TABLE `pm_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_migration`
--

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` VALUES ('m000000_000000_base',1375549110),('m130713_190802_create_users_table',1375549113),('m130713_193329_create_places_table',1375549114);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-10 17:25:29
