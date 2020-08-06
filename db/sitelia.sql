-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: sitelia
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(50) DEFAULT NULL,
  `orderDetails` json DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `sum` int(50) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (18,'Baldones MEGO pakomÄts','[{\"id\": \"2\", \"color\": \"black\", \"quantity\": \"12\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"14\"}]','Completed',925,'31-07-2020 12:35'),(19,'Baldones MEGO pakomÄts','[{\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"13\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"14\"}]','Completed',950,'31-07-2020 12:37:37'),(20,'AknÄ«stes VESKO pakomÄts','[{\"id\": \"2\", \"color\": \"black\", \"quantity\": \"12\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"11\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"13\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"black\", \"quantity\": \"1\"}]','Pending',950,'01-08-2020 12:30:41'),(21,'BabÄ«tes ELVI pakomÄts','[{\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"white      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"yellow     \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"orange     \", \"quantity\": \"1\"}]','Pending',88,'02-08-2020 19:50:32'),(22,'Alojas Mini Top pakomÄts','[{\"id\": \"2\", \"color\": \"yellow7.png\", \"quantity\": \"24\"}, {\"id\": \"2\", \"color\": \"twitter (copy).png\", \"quantity\": \"24\"}, {\"id\": \"2\", \"color\": \"12 (copy).png\", \"quantity\": \"24\"}]','Pending',1584,'02-08-2020 21:49:52'),(23,'Aizkraukles T/C Iga pakomÄts','[{\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}]','Pending',44,'03-08-2020 13:43:52'),(24,'Baldones MEGO pakomÄts','false','Pending',81,'03-08-2020 14:06:12'),(25,'Aizkraukles T/C Iga pakomÄts','[{\"id\": \"3\", \"color\": \"black\", \"quantity\": \"24\"}]','Pending',648,'03-08-2020 14:12:01'),(26,'Aizkraukles T/C Iga pakomÄts','[{\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}]','Pending',22,'03-08-2020 14:17:26'),(27,'Aizkraukles T/C Iga pakomÄts','[{\"id\": \"3\", \"color\": \"black\", \"quantity\": \"1\"}, {\"id\": \"3\", \"color\": \"black\", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}]','Pending',98,'03-08-2020 14:21:12'),(28,'Aizkraukles T/C Iga pakomÄts','[{\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}]','Pending',22,'03-08-2020 14:24:04'),(29,'Aizkraukles T/C Iga pakomÄts','[{\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}]','Pending',66,'03-08-2020 15:11:04'),(30,'Aizkraukles T/C Iga pakomÄts','[{\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}]','Pending',66,'03-08-2020 15:12:19'),(31,'BaloÅ¾i Mego pakomÄts','[{\"id\": \"2\", \"color\": \"black      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"white      \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"yellow     \", \"quantity\": \"1\"}, {\"id\": \"2\", \"color\": \"orange     \", \"quantity\": \"1\"}]','Pending',88,'03-08-2020 18:11:35');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text,
  `defaultImg` varchar(50) DEFAULT NULL,
  `color` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (10,'PULL-ON Beanie Hat',21,'Material:Â 95% cotton/5% elastane.High density cotton microknit.Double layer knit.Overlock stitch detail.Tear out label.','15966650160hat.jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966650160hat.jpg\"}, {\"color\": \"Lime\", \"imgUrl\": \"15966650161lime.jpg\"}, {\"color\": \"Red\", \"imgUrl\": \"15966650162s-l1600.jpg\"}]'),(11,'Dome Cotton Sports T-Shirt',18,'The North Face Simple Dome T-ShirtÃ‚Â Branded logo on chest.High quality cotton provides proper moisture outflow and high breathability.Regular fit.100% Cotton.MachineÃ‚Â Washable','15966645770simpleTshirt.jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966645770simpleTshirt.jpg\"}, {\"color\": \"Navy\", \"imgUrl\": \"15966645771s-l500.jpg\"}]'),(12,'Massey Ferguson Hoodie',27,'Massey Ferguson HoodieSizes from Small to XXL (3XL up to 5XL are available on request for a +Â£3 surcharge)Ladies &amp; Childrens hoodies available upon request.Other colour logos can be made upon request, we also stock numerous colours of hoodies, ask for more info.High quality draw string front pocketed hoodieFree 2nd class UK postageLow cost international postage','15966647000hoodi.jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966647000hoodi.jpg\"}, {\"color\": \"White\", \"imgUrl\": \"15966647001hoodiWhite.jpg\"}]'),(13,'Mens Summer Plain T-shirt',12,'Classic T-shirt - sets the standard for fabric and production quality, durability and wearer comfort.Perfect combination of ring spun cotton, high quality fabric and top level finishing.','15966669600green.jpg','[{\"color\": \"Green\", \"imgUrl\": \"15966669600green.jpg\"}, {\"color\": \"Red\", \"imgUrl\": \"15966669601red7.png\"}, {\"color\": \"White\", \"imgUrl\": \"15966669602white.png\"}]'),(14,'10 Pairs Mens Sports Socks',15,'Mens Sports Socks , Simple and nice .','15966674580s-l1600.jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966674580s-l1600.jpg\"}, {\"color\": \"White\", \"imgUrl\": \"15966674581s-l1600 (1).jpg\"}]'),(15,'Mens Chino Shorts',23,'New Mens Chino Shorts Cotton Stretch Slim Fit Summer Colours Casual Half PantsÂ Stretch Cotton MaterialAbove Knee Length ShortsZip FlyTwo Back Button Pockets2 Front PocketsBelt Loops','15966677190s-l1600 (2).jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966677190s-l1600 (2).jpg\"}, {\"color\": \"Charcoal\", \"imgUrl\": \"15966677191s-l1600 (3).jpg\"}, {\"color\": \"Ice Blue\", \"imgUrl\": \"15966677192s-l1600 (3).jpg\"}, {\"color\": \"Ox BLOOD\", \"imgUrl\": \"15966677193s-l1600 (4).jpg\"}]'),(16,'Adidas Classic Backpacks',39,'Brand New with TagsLots of Adidas Backpacks, great for getting back to the gym, sports, uni, school, camping, flying, overnight etc now lockdown is over.Various colours','15966679530s-l1600 (6).jpg','[{\"color\": \"Blue\", \"imgUrl\": \"15966679530s-l1600 (6).jpg\"}, {\"color\": \"Black\", \"imgUrl\": \"15966679531s-l1600 (5).jpg\"}]'),(17,'Full Zip Micro Fleece Jacket',29,'Premium Unisex Classic Full Zip 100% Polyester Micro Fleece JacketÂ Â 100% Polyester Super Anti Pill Micro Fleece','1596668359033.jpg','[{\"color\": \"Maroon\", \"imgUrl\": \"1596668359033.jpg\"}, {\"color\": \"Blue\", \"imgUrl\": \"1596668359122.jpg\"}, {\"color\": \"Red\", \"imgUrl\": \"1596668359211.jpg\"}]'),(18,'Men Padded Two Colour Jacket Puffer',35,'Men Padded Two Colour Jacket Puffer Quilted Coat Hooded Casual Winter Brave Soul','15966686010s-l1600 (7).jpg','[{\"color\": \"Yellow\", \"imgUrl\": \"15966686010s-l1600 (7).jpg\"}, {\"color\": \"Orange\", \"imgUrl\": \"15966686011s-l1600 (8).jpg\"}]'),(19,'123124',124,'31234','15967169160red7.png','[{\"color\": \"ed12\", \"imgUrl\": \"15967169160red7.png\"}]'),(20,'123123',123,'123123','15967182370white.png','[{\"color\": \"123\", \"imgUrl\": \"15967182370white.png\"}]'),(21,'123',123,'123','15967183140white.png','[{\"color\": \"123\", \"imgUrl\": \"15967183140white.png\"}]'),(22,'1231234                   11111111111111',11,'2131224                       111111111111111','15967184140white.png','[{\"color\": \"123\", \"imgUrl\": \"15967184140white.png\"}, {\"color\": \"asd\", \"imgUrl\": \"15967184141red7.png\"}, {\"color\": \"11\", \"imgUrl\": \"15967185880red7.png\"}]');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'leoner','a9c534509f1f445fc489cfbe84b359eb','81f0bf9eed2253e80dcd02a6303fc559'),(2,'root','63a9f0ea7bb98050796b649e85481845','330a0182a84d85f64863bda12ad3c67e');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-06 18:05:05
