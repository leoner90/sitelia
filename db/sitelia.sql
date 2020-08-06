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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (32,'BaloÅ¾i Mego pakomÄts','[{\"id\": \"16\", \"color\": \"Blue\", \"quantity\": \"1\"}, {\"id\": \"16\", \"color\": \"Black\", \"quantity\": \"11\"}]','Pending',468,'06-08-2020 20:29:45'),(33,'CÄ“su Maxima XX pakomÄts','[{\"id\": \"11\", \"color\": \"Navy\", \"quantity\": \"1\"}, {\"id\": \"11\", \"color\": \"Black\", \"quantity\": \"11\"}, {\"id\": \"11\", \"color\": \"Navy\", \"quantity\": \"1\"}]','Pending',234,'06-08-2020 20:30:18'),(34,'Baldones MEGO pakomÄts','[{\"id\": \"14\", \"color\": \"Black\", \"quantity\": \"2\"}, {\"id\": \"14\", \"color\": \"White\", \"quantity\": \"11\"}, {\"id\": \"17\", \"color\": \"Maroon\", \"quantity\": \"12\"}, {\"id\": \"17\", \"color\": \"Blue\", \"quantity\": \"1\"}]','Completed',572,'06-08-2020 20:30:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (10,'PULL-ON Beanie Hat',21,'Material:Â 95% cotton/5% elastane.High density cotton microknit.Double layer knit.Overlock stitch detail.Tear out label.','15966650160hat.jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966650160hat.jpg\"}, {\"color\": \"Lime\", \"imgUrl\": \"15966650161lime.jpg\"}, {\"color\": \"Red\", \"imgUrl\": \"15966650162s-l1600.jpg\"}]'),(11,'Dome Cotton Sports T-Shirt',18,'The North Face Simple Dome T-ShirtÃ‚Â Branded logo on chest.High quality cotton provides proper moisture outflow and high breathability.Regular fit.100% Cotton.MachineÃ‚Â Washable','15966645770simpleTshirt.jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966645770simpleTshirt.jpg\"}, {\"color\": \"Navy\", \"imgUrl\": \"15966645771s-l500.jpg\"}]'),(12,'Massey Ferguson Hoodie',27,'Massey Ferguson HoodieSizes from Small to XXL (3XL up to 5XL are available on request for a +Â£3 surcharge)Ladies &amp; Childrens hoodies available upon request.Other colour logos can be made upon request, we also stock numerous colours of hoodies, ask for more info.High quality draw string front pocketed hoodieFree 2nd class UK postageLow cost international postage','15966647000hoodi.jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966647000hoodi.jpg\"}, {\"color\": \"White\", \"imgUrl\": \"15966647001hoodiWhite.jpg\"}]'),(13,'Mens Summer Plain T-shirt',12,'Classic T-shirt - sets the standard for fabric and production quality, durability and wearer comfort.Perfect combination of ring spun cotton, high quality fabric and top level finishing.','15966669600green.jpg','[{\"color\": \"Green\", \"imgUrl\": \"15966669600green.jpg\"}, {\"color\": \"Red\", \"imgUrl\": \"15966669601red7.png\"}, {\"color\": \"White\", \"imgUrl\": \"15966669602white.png\"}]'),(14,'10 Pairs Mens Sports Socks',15,'Mens Sports Socks , Simple and nice .','15966674580s-l1600.jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966674580s-l1600.jpg\"}, {\"color\": \"White\", \"imgUrl\": \"15966674581s-l1600 (1).jpg\"}]'),(15,'Mens Chino Shorts',23,'New Mens Chino Shorts Cotton Stretch Slim Fit Summer Colours Casual Half PantsÂ Stretch Cotton MaterialAbove Knee Length ShortsZip FlyTwo Back Button Pockets2 Front PocketsBelt Loops','15966677190s-l1600 (2).jpg','[{\"color\": \"Black\", \"imgUrl\": \"15966677190s-l1600 (2).jpg\"}, {\"color\": \"Charcoal\", \"imgUrl\": \"15966677191s-l1600 (3).jpg\"}, {\"color\": \"Ice Blue\", \"imgUrl\": \"15966677192s-l1600 (3).jpg\"}, {\"color\": \"Ox BLOOD\", \"imgUrl\": \"15966677193s-l1600 (4).jpg\"}]'),(16,'Adidas Classic Backpacks',39,'Brand New with TagsLots of Adidas Backpacks, great for getting back to the gym, sports, uni, school, camping, flying, overnight etc now lockdown is over.Various colours','15966679530s-l1600 (6).jpg','[{\"color\": \"Blue\", \"imgUrl\": \"15966679530s-l1600 (6).jpg\"}, {\"color\": \"Black\", \"imgUrl\": \"15966679531s-l1600 (5).jpg\"}]'),(17,'Full Zip Micro Fleece Jacket',29,'Premium Unisex Classic Full Zip 100% Polyester Micro Fleece JacketÂ Â 100% Polyester Super Anti Pill Micro Fleece','1596668359033.jpg','[{\"color\": \"Maroon\", \"imgUrl\": \"1596668359033.jpg\"}, {\"color\": \"Blue\", \"imgUrl\": \"1596668359122.jpg\"}, {\"color\": \"Red\", \"imgUrl\": \"1596668359211.jpg\"}]'),(18,'Men Padded Two Colour Jacket Puffer',35,'Men Padded Two Colour Jacket Puffer Quilted Coat Hooded Casual Winter Brave Soul','15966686010s-l1600 (7).jpg','[{\"color\": \"Yellow\", \"imgUrl\": \"15966686010s-l1600 (7).jpg\"}, {\"color\": \"Orange\", \"imgUrl\": \"15966686011s-l1600 (8).jpg\"}]');
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
INSERT INTO `users` VALUES (1,'leoner','a9c534509f1f445fc489cfbe84b359eb','e694d12110f592e45834c51c0ad71c3d'),(2,'root','63a9f0ea7bb98050796b649e85481845','330a0182a84d85f64863bda12ad3c67e');
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

-- Dump completed on 2020-08-06 20:36:55
