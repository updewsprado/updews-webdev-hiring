-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: dews_training
-- ------------------------------------------------------
-- Server version	5.7.14-log

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
-- Table structure for table `accel`
--

DROP TABLE IF EXISTS `accel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accel` (
  `idaccel` int(11) NOT NULL AUTO_INCREMENT,
  `time_stamp` varchar(45) DEFAULT NULL,
  `node` varchar(45) DEFAULT NULL,
  `xval` varchar(45) DEFAULT NULL,
  `yval` varchar(45) DEFAULT NULL,
  `zval` varchar(45) DEFAULT NULL,
  `mval` varchar(45) DEFAULT NULL,
  `purged` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idaccel`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accel`
--

LOCK TABLES `accel` WRITE;
/*!40000 ALTER TABLE `accel` DISABLE KEYS */;
INSERT INTO `accel` VALUES (1,'2014-03-25 09:44:00','1','993','-112','14','2373','F'),(2,'2014-03-25 09:44:00','2','1016','-36','-17','1369','F'),(3,'2014-03-25 09:44:00','3','1019','23','-117','2324','F'),(4,'2014-03-25 09:44:00','4','971','-28','70','0','F'),(5,'2014-03-25 09:44:00','5','982','-42','11','2567','F'),(6,'2014-03-25 09:44:00','6','990','-6','-41','2820','F'),(7,'2014-03-25 09:44:00','7','981','-26','107','2500','F'),(8,'2014-03-25 09:44:00','8','986','23','-19','1753','F'),(9,'2014-03-25 09:44:00','9','1017','-9','-89','1842','F'),(10,'2014-03-25 09:44:00','10','1005','-2','-40','2056','F'),(11,'2014-03-25 09:44:00','11','919','-73','3','2863','F'),(12,'2014-03-25 09:44:00','12','867','-8','503','2172','F'),(13,'2014-03-25 09:44:00','13','993','26','-30','1460','F'),(14,'2014-03-25 09:44:00','14','986','-24','18','1521','F'),(15,'2014-03-25 09:44:00','15','995','-16','-49','2588','F'),(16,'2014-03-25 09:44:00','16','1013','15','-39','1982','F'),(17,'2014-03-25 09:44:00','17','-3070','33','27','1912','F'),(18,'2014-03-25 09:51:00','1','993','-112','14','2932','F'),(19,'2014-03-25 09:51:00','2','1016','-36','-18','1925','F'),(20,'2014-03-25 09:51:00','3','1019','23','-115','2955','F'),(21,'2014-03-25 09:51:00','4','971','-28','69','0','F'),(22,'2014-03-25 09:51:00','5','982','-42','12','2772','F'),(23,'2014-03-25 09:51:00','6','990','-6','-40','2883','F'),(24,'2014-03-25 09:51:00','7','981','-26','108','2862','F'),(25,'2014-03-25 09:51:00','8','986','23','-21','2903','F'),(26,'2014-03-25 09:51:00','9','1017','-10','-88','3248','F'),(27,'2014-03-25 09:51:00','10','1004','-2','-41','3294','F'),(28,'2014-03-25 09:51:00','11','918','-73','2','3191','F'),(29,'2014-03-25 09:51:00','12','867','-8','503','3643','F'),(30,'2014-03-25 09:51:00','13','993','26','-30','1521','F'),(31,'2014-03-25 09:51:00','14','986','-24','18','1482','F'),(32,'2014-03-25 09:51:00','15','995','-16','-49','1965','F'),(33,'2014-03-25 09:51:00','16','1013','14','-38','1715','F'),(34,'2014-03-25 09:51:00','17','-3069','32','29','1926','F'),(35,'2014-03-25 10:00:00','1','993','-113','13','2932','F'),(36,'2014-03-25 10:00:00','2','1016','-36','-17','1925','F'),(37,'2014-03-25 10:00:00','3','1019','23','-116','2955','F'),(38,'2014-03-25 10:00:00','4','971','-28','70','0','F'),(39,'2014-03-25 10:00:00','5','982','-42','11','2772','F'),(40,'2014-03-25 10:00:00','6','990','-6','-40','2883','F'),(41,'2014-03-25 10:00:00','7','981','-26','108','2862','F'),(42,'2014-03-25 10:00:00','8','986','23','-21','2903','F'),(43,'2014-03-25 10:00:00','9','1017','-10','-88','3277','F'),(44,'2014-03-25 10:00:00','10','1004','-2','-40','3294','F'),(45,'2014-03-25 10:00:00','11','919','-73','2','3140','F'),(46,'2014-03-25 10:00:00','12','867','-8','503','3643','F'),(47,'2014-03-25 10:00:00','13','993','26','-31','1521','F'),(48,'2014-03-25 10:00:00','14','986','-24','18','2903','F'),(49,'2014-03-25 10:00:00','15','995','-16','-50','1912','F'),(50,'2014-03-25 10:00:00','16','1013','15','-39','1831','F'),(51,'2014-03-25 10:00:00','17','-3067','32','29','2759','F'),(52,'2014-03-25 10:30:00','1','992','-113','14','2932','F'),(53,'2014-03-25 10:30:00','2','1016','-36','-17','1925','F'),(54,'2014-03-25 10:30:00','3','1019','23','-117','2955','F'),(55,'2014-03-25 10:30:00','4','971','-28','69','0','F'),(56,'2014-03-25 10:30:00','5','982','-42','12','2772','F'),(57,'2014-03-25 10:30:00','6','990','-6','-40','2935','F'),(58,'2014-03-25 10:30:00','7','981','-26','108','2833','F'),(59,'2014-03-25 10:30:00','8','986','23','-19','2873','F'),(60,'2014-03-25 10:30:00','9','1017','-10','-89','3277','F'),(61,'2014-03-25 10:30:00','10','1004','-2','-40','3294','F'),(62,'2014-03-25 10:30:00','11','919','-73','3','3169','F'),(63,'2014-03-25 10:30:00','12','867','-8','503','3588','F'),(64,'2014-03-25 10:30:00','13','993','26','-30','1470','F'),(65,'2014-03-25 10:30:00','14','986','-24','18','2903','F'),(66,'2014-03-25 10:30:00','15','996','-16','-50','1912','F'),(67,'2014-03-25 10:30:00','16','1013','15','-39','1754','F'),(68,'2014-03-25 10:30:00','17','1022','32','28','2304','F'),(69,'2014-03-25 11:00:00','1','992','-113','14','2876','F'),(70,'2014-03-25 11:00:00','2','1016','-36','-18','1925','F'),(71,'2014-03-25 11:00:00','3','1019','23','-116','2955','F'),(72,'2014-03-25 11:00:00','4','971','-28','69','0','F'),(73,'2014-03-25 11:00:00','5','982','-42','11','2772','F'),(74,'2014-03-25 11:00:00','6','990','-6','-40','2935','F'),(75,'2014-03-25 11:00:00','7','980','-26','108','2833','F'),(76,'2014-03-25 11:00:00','8','986','23','-20','2873','F'),(77,'2014-03-25 11:00:00','9','1017','-10','-88','3277','F'),(78,'2014-03-25 11:00:00','10','1005','-2','-40','3265','F'),(79,'2014-03-25 11:00:00','11','919','-73','3','3140','F'),(80,'2014-03-25 11:00:00','12','867','-8','503','3614','F'),(81,'2014-03-25 11:00:00','13','993','26','-30','1470','F'),(82,'2014-03-25 11:00:00','14','986','-24','18','2903','F'),(83,'2014-03-25 11:00:00','15','995','-16','-50','1950','F'),(84,'2014-03-25 11:00:00','16','1013','15','-39','1806','F'),(85,'2014-03-25 11:00:00','17','1020','32','27','1926','F'),(86,'2014-03-25 11:30:00','1','992','-113','17','2910','F'),(87,'2014-03-25 11:30:00','2','1016','-36','-17','1960','F'),(88,'2014-03-25 11:30:00','3','1019','23','-116','2955','F'),(89,'2014-03-25 11:30:00','4','971','-28','70','0','F'),(90,'2014-03-25 11:30:00','5','982','-42','11','2772','F'),(91,'2014-03-25 11:30:00','6','990','-5','-40','2935','F'),(92,'2014-03-25 11:30:00','7','980','-26','108','2833','F'),(93,'2014-03-25 11:30:00','8','986','23','-20','2873','F'),(94,'2014-03-25 11:30:00','9','1018','-9','-90','3248','F'),(95,'2014-03-25 11:30:00','10','1004','-2','-40','3294','F'),(96,'2014-03-25 11:30:00','11','919','-73','3','3140','F'),(97,'2014-03-25 11:30:00','12','867','-8','503','3614','F'),(98,'2014-03-25 11:30:00','13','993','26','-29','1521','F'),(99,'2014-03-25 11:30:00','14','986','-24','19','1482','F'),(100,'2014-03-25 11:30:00','15','995','-16','-49','1912','F');
/*!40000 ALTER TABLE `accel` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-01 16:25:49
