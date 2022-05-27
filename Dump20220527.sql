-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: user_data
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `user_data`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `user_data` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `user_data`;

--
-- Table structure for table `user_cart`
--

DROP TABLE IF EXISTS `user_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `goods_id` varchar(100) NOT NULL,
  `goods_size` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_cart`
--

LOCK TABLES `user_cart` WRITE;
/*!40000 ALTER TABLE `user_cart` DISABLE KEYS */;
INSERT INTO `user_cart` VALUES (37,'12','2','XS'),(38,'12','3','L'),(65,'11','48','2XS'),(66,'11','47','2XL');
/*!40000 ALTER TABLE `user_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_order`
--

DROP TABLE IF EXISTS `user_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `recipient` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address_opt` varchar(100) DEFAULT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `goods_info` varchar(100) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `goods_size` varchar(100) NOT NULL,
  `merchant_uid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_order`
--

LOCK TABLES `user_order` WRITE;
/*!40000 ALTER TABLE `user_order` DISABLE KEYS */;
INSERT INTO `user_order` VALUES (67,'11','김성범','01073563375','07018','서울 동작구 사당동 294-1','202호','','[\"47\",\"48\"]','2020-12-06 19:51:36','[\"2XS\",\"S\"]',''),(70,'11','김성범','01073563375','07018','서울 동작구 사당동 294-1','202호','','[\"1\",\"2\"]','2020-12-07 19:14:38','[\"2XS\",\"2XS\"]','1607336040328'),(72,'11','김성범','01073563375','07018','서울 동작구 사당동 294-1','202호','','[\"47\"]','2021-03-12 09:17:21','[\"2XS\"]','1615508204498');
/*!40000 ALTER TABLE `user_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address_detail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` VALUES (1,'관리자','root@root.com','123','','','',NULL),(11,'김성범','test@test.com','123','01073563375','07018','서울 동작구 사당동 294-1','402호'),(12,'팀노바','team@team.com','123','01012345678','07004','서울 동작구 사당로17길 21',''),(13,'홍길이','test1@test.com','1234qwer!','01073563375','07031','서울 동작구 관악로30길 27','202호');
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'user_data'
--

--
-- Dumping routines for database 'user_data'
--

--
-- Current Database: `goods_data`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `goods_data` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `goods_data`;

--
-- Table structure for table `goods_detail`
--

DROP TABLE IF EXISTS `goods_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goods_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(100) NOT NULL,
  `prod_cate` varchar(100) NOT NULL,
  `prod_price` varchar(100) NOT NULL,
  `prod_com` varchar(1000) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `goods_image_1` varchar(100) NOT NULL,
  `goods_image_2` varchar(100) NOT NULL,
  `goods_image_3` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_detail`
--

LOCK TABLES `goods_detail` WRITE;
/*!40000 ALTER TABLE `goods_detail` DISABLE KEYS */;
INSERT INTO `goods_detail` VALUES (1,'S-WORKS','road_bikes','16000000','로드 제품입니다.','road_goods_1-1.jpg','road_goods_1-1.jpg','road_goods_1-2.jpg','road_goods_1-3.jpg'),(2,'S-WORKS TURBO LEVO SL','mtb_bikes','14900000','엠티비 제품입니다.','mtb_goods_1-1.jpg','mtb_goods_1-1.jpg','mtb_goods_1-3.jpg','mtb_goods_1-3.jpg'),(3,'SIRRUS 1.0','fitness_bikes','490000','피트니스 제품입니다.','fitness_goods_1-1.jpg','fitness_goods_1-1.jpg','mtb_goods_1-3.jpg','fitness_goods_1-3.jpg'),(43,'테스트제품1','mtb_bikes','600000','테스트제품1','road_goods_1-2.jpg','road_goods_1-3.jpg','fitness_goods_1-1.jpg',''),(44,'테스트제품3','mtb_bikes','550000','테스트제품3','mtb_goods_1-3.jpg','','',''),(45,'테스트제품','mtb_bikes','200000','페이징','mtb_goods_1-2.jpg','mtb_goods_1-2.jpg','mtb_goods_1-2.jpg','mtb_goods_1-2.jpg'),(47,'테스트결제제품1','road_bikes','500','테스트결제 제품입니다.','road_goods_1-3.jpg','road_goods_1-2.jpg','road_goods_1-1.jpg',''),(48,'테스트결제제품2','road_bikes','400','테스트결제제품2 입니다.','road_goods_1-1.jpg','road_goods_1-1.jpg','road_goods_1-2.jpg','');
/*!40000 ALTER TABLE `goods_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `imgurl` varchar(512) NOT NULL,
  `size` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'goods_data'
--

--
-- Dumping routines for database 'goods_data'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-27 22:35:50
