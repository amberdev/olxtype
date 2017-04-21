-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: pincare
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bid`
--

DROP TABLE IF EXISTS `tbl_bid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_amount` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bid`
--

LOCK TABLES `tbl_bid` WRITE;
/*!40000 ALTER TABLE `tbl_bid` DISABLE KEYS */;
INSERT INTO `tbl_bid` VALUES (1,42,5,'200','2017-04-14 05:48:50'),(2,150,12,'14','2017-04-14 04:14:06'),(3,150,12,'14','2017-04-14 05:26:04'),(4,14,5,'200','2017-04-14 05:27:40'),(5,14,5,'200','2017-04-14 05:28:31'),(6,14,5,'200','2017-04-14 05:28:38'),(7,120,12,'14','2017-04-14 05:30:13'),(8,120,12,'14','2017-04-14 05:32:38'),(9,22,12,'45','2017-04-17 01:39:33'),(10,22,12,'30','2017-04-17 01:44:34'),(11,22,12,'35','2017-04-17 01:45:52'),(12,22,12,'52','2017-04-17 02:57:17'),(13,22,15,'??','2017-04-17 06:22:05'),(14,22,15,'33','2017-04-17 06:25:46'),(15,22,12,'60','2017-04-18 05:48:28'),(16,22,15,'30','2017-04-18 08:39:18'),(17,28,12,'25','2017-04-19 07:03:28'),(18,28,12,'58','2017-04-19 08:01:08'),(19,28,12,'12','2017-04-20 02:07:06'),(20,29,12,'6','2017-04-20 03:43:05'),(21,29,15,'125','2017-04-20 06:33:34'),(22,29,15,'200','2017-04-20 06:50:07');
/*!40000 ALTER TABLE `tbl_bid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_image`
--

DROP TABLE IF EXISTS `tbl_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_image`
--

LOCK TABLES `tbl_image` WRITE;
/*!40000 ALTER TABLE `tbl_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_outlets`
--

DROP TABLE IF EXISTS `tbl_outlets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_outlets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `outlet_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `place_id` varchar(250) NOT NULL,
  `search_params` varchar(10) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `fb_place_id` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_outlets`
--

LOCK TABLES `tbl_outlets` WRITE;
/*!40000 ALTER TABLE `tbl_outlets` DISABLE KEYS */;
INSERT INTO `tbl_outlets` VALUES (1,'dipanshu','123456','American BBQ','A-212 Top Floor','','','','','','facebook.com/123456789','','logo','','2017-01-24 00:00:00','2017-01-25 00:00:00'),(2,'lkj','lkj','Nodia Sec - 63, National Voice','lj','lkj','lkj','lj','lkj','lkj','lkj','','asdfasf','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'12346','lkjlkj','asdfasdf','lkj','lkj','lkj','lkj','lkj','lkj','asdfasdf','','14958549_1150428621704111_441235011_n_png2.jpg','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'admin','admin','Innov8 ','Cannought Place','New Delhi','India','110001','28.631347',' 77.216578','1278155462204438','','dummylogo.png','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'innov8dummy','admin','Innov8','Cannought Place','New Delhi','India','110001','28.631347','77.216578','1278155462204438','','dummylogo1.png','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'dipa','dipa','dipa','delhi','lkj','lkj','lkj','lkj','lkj','lj','','a.jpg','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'lkj','lkj','lkj','lkj','lk','kj','jl','lkj','lkj','lk','','a1.jpg','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'lkj','lj','lkj','lj','l','lkj','kj','lkj','lkj','lkj','','pincare.in/public/upload/a2.jpg','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'Chaayos','Chaayos','Chaayos','Cannought Place','New Delhi','India','110001','28.631184','77.221023','https://www.facebook.com/Chaayos-1089537911080576/','delhi','pincare.in/public/upload/logo1.png','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'Chaayoscp','Chaayoscp','Chaayos','Cannought Place','New Delhi','India','110001','28.632088','77.225486','https://www.facebook.com/Chaayos-1666827136916394/','Delhi','pincare.in/public/upload/logo11.png','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'tonino','tonino','Cafe Tonino','CP','New Delhi','India','110001','28.635075','77.219851','https://www.facebook.com/caffetonino','Delhi','pincare.in/public/upload/logo2.png','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'flypcp','flypcp','FLYP at MTV','CP','New Delhi','India','110001','28.630406','77.220823','https://www.facebook.com/flypatmtv/','Delhi','pincare.in/public/upload/logo3.png','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'vaultcafe','vaultcafe','Vault Cafe','CP','New Delhi','India','110001','28.631084','77.220276','https://www.facebook.com/vaultcp/','Delhi','pincare.in/public/upload/logo31.png','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'abc','abc','Nodia Sec - 63, National Voice','N-96, 2nd Floor, Munshi Lal Building, Connaught Place','delhi','inda','110092','28.6303402','77.2205642','1450366765272902','100','pincare.in/public/upload/a7.jpg','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'abc','abc','The Ancient Barbeque','Noida','noida','India','110028','28.628454','77.376945','685303808171065','100','pincare.in/public/upload/outlet-logo.png','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'abc2','abc2','abc','Haldiram, Sector 63, Noida','Noida','India','110092','28.6272291','77.3748906','216673005015565','100','pincare.in/public/upload/outlet-logo1.png','','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_outlets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pins`
--

DROP TABLE IF EXISTS `tbl_pins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outlet_id` int(11) NOT NULL,
  `checkin_per_day` int(50) NOT NULL,
  `amount_checkin` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pins`
--

LOCK TABLES `tbl_pins` WRITE;
/*!40000 ALTER TABLE `tbl_pins` DISABLE KEYS */;
INSERT INTO `tbl_pins` VALUES (1,1,10,'10'),(2,1,10,'10'),(3,14,10,'10'),(4,15,50,'200'),(5,16,50,'20');
/*!40000 ALTER TABLE `tbl_pins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `product_type` varchar(255) CHARACTER SET latin1 NOT NULL,
  `packege_type` varchar(255) CHARACTER SET latin1 NOT NULL,
  `packege_weight` varchar(255) CHARACTER SET latin1 NOT NULL,
  `weight` varchar(255) CHARACTER SET latin1 NOT NULL,
  `quantity` varchar(255) CHARACTER SET latin1 NOT NULL,
  `current_price` varchar(255) CHARACTER SET latin1 NOT NULL,
  `degree_or_quality` varchar(255) CHARACTER SET latin1 NOT NULL,
  `source` varchar(255) CHARACTER SET latin1 NOT NULL,
  `location` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image5` text CHARACTER SET latin1 NOT NULL,
  `image4` text CHARACTER SET latin1 NOT NULL,
  `image3` text CHARACTER SET latin1 NOT NULL,
  `image2` text CHARACTER SET latin1 NOT NULL,
  `image1` text CHARACTER SET latin1 NOT NULL,
  `closed_bid` varchar(255) CHARACTER SET latin1 NOT NULL,
  `added_on` datetime NOT NULL,
  `product_desc` text CHARACTER SET latin1 NOT NULL,
  `status` enum('t','f') CHARACTER SET latin1 NOT NULL DEFAULT 'f',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_products`
--

LOCK TABLES `tbl_products` WRITE;
/*!40000 ALTER TABLE `tbl_products` DISABLE KEYS */;
INSERT INTO `tbl_products` VALUES (29,'testing','dsfsdfdsf','Plastic','2','KG','2','120','Very good','fsdfsdf','Abu','','','','image_2_testing.png','image_1_testing.png','2017-04-23','2017-04-20 03:06:22','testing	22','t'),(30,'?????  ??? ??','???? ','Plastic','?','KG','??','??','Excellent','???? ????','????? ????????? ','','','','image_2_?????  ??? ??.png','image_1_?????  ??? ??.png','????-??-??','2017-04-20 06:25:33','???? ???????? ???? ???? ????','t'),(31,'delemy','dfds','Plastic','4','Gram','2','342','Good','sdfdf','abu','','','','','','2017-04-27','2017-04-20 06:35:45','Delemy	','t'),(32,'?????? ??? 123','?????','Carton','900','Gram','12','100','Very good','????? ???????? ','???? ???? ','','','','image_2_?????? ??? 123.png','image_1_?????? ??? 123.png','????-??-??','2017-04-20 06:53:19','???? ???? ???? ?????? ???? ??????. ','t'),(33,'dfsdfsdf','dsfdsfdsf','Plastic','33','Gram','2','33','Very good','sfsdf','dsfsdfsdf','','','','image_2_dfsdfsdf.png','image_1_dfsdfsdf.png','2017-04-22','2017-04-20 07:11:55','Sdfdsf','f'),(34,'abcd','property','abc','abc','asdf','1','110','qty','src','india','','','','','image_1_abcd.png','2014-04-52','2017-04-21 12:19:17','abcdddd','f'),(51,'Ø§Ù?ØªÙ?Ø§Ù?Ù?Ù Ø£Ù? Ø­ØªÙ?, Ù?Ù?Ù? Ø®Ù?Ø§Ù','property','abc','abc','asdf','1','110','qty','src','india','','','','','image_1_???????? ?? ???, ??? ????.png','2014-04-52','2017-04-21 01:42:14','abcdddd','f');
/*!40000 ALTER TABLE `tbl_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_story`
--

DROP TABLE IF EXISTS `tbl_story`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_story` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `story_image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `imageurl` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_story`
--

LOCK TABLES `tbl_story` WRITE;
/*!40000 ALTER TABLE `tbl_story` DISABLE KEYS */;
INSERT INTO `tbl_story` VALUES (7,'pincare.in/public/upload/image.png','LiteracyLove;','https://facebook.com','How do you make a bright future? You don\'t,you build bright minds to make it! We are trying, through fun educative programs. We teach soft skills and exposes youth and students to opportunities that will help them become a better version of themselves and make the World a better place. India is struggling with high rates of unemployment (about 10%),youth violence and bad education quality among other problems. How do you make a bright future? You don\'t,you build bright minds to make it! We are trying, through fun educative programs.\r\n');
/*!40000 ALTER TABLE `tbl_story` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `createdon` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (5,'dipanshu','pwd','9560020152','7352','2017-04-08 12:18:55'),(6,'dipanshu','pwd','956002012','8168','2017-04-10 03:17:11'),(7,'dipanshu','pwd','956000152','6463','2017-04-10 03:20:50'),(8,'rick','rick','0789632145','7050','2017-04-10 04:49:34'),(9,'dads','asdsad','01452896452','9783','2017-04-10 04:53:12'),(10,'sass','asas','0148752693','2872','2017-04-10 04:54:20'),(11,'test','test','7458963210','4455','2017-04-10 04:57:12'),(12,'test','test','0123654789','7694','2017-04-10 05:04:28'),(13,'test','test','0987456321','2247','2017-04-10 08:00:29'),(14,'Rick','Test','9874563210','5476','2017-04-13 10:16:09'),(15,'abu karam','12345','0505287956','6046','2017-04-15 11:01:31'),(16,'Ricky','test','0987654321','6691','2017-04-18 06:05:14');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-21 13:55:08
