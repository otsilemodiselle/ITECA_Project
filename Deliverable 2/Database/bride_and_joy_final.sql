-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: bride_and_joy
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `africa_ceremony`
--

DROP TABLE IF EXISTS `africa_ceremony`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `africa_ceremony` (
  `african_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`african_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `africa_ceremony_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4009 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `africa_ceremony`
--

LOCK TABLES `africa_ceremony` WRITE;
/*!40000 ALTER TABLE `africa_ceremony` DISABLE KEYS */;
INSERT INTO `africa_ceremony` VALUES (4000,1),(4001,5),(4002,27),(4005,43),(4006,44),(4007,45),(4008,46),(4003,47),(4004,48);
/*!40000 ALTER TABLE `africa_ceremony` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `best_sellers`
--

DROP TABLE IF EXISTS `best_sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `best_sellers` (
  `best_sellers_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`best_sellers_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `best_sellers_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9732 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `best_sellers`
--

LOCK TABLES `best_sellers` WRITE;
/*!40000 ALTER TABLE `best_sellers` DISABLE KEYS */;
INSERT INTO `best_sellers` VALUES (9724,9),(9730,9),(9721,13),(9725,14),(9726,16),(9720,17),(9731,22),(9729,32),(9723,36),(9722,41),(9728,43),(9727,47);
/*!40000 ALTER TABLE `best_sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boys`
--

DROP TABLE IF EXISTS `boys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boys` (
  `boys_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`boys_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `boys_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boys`
--

LOCK TABLES `boys` WRITE;
/*!40000 ALTER TABLE `boys` DISABLE KEYS */;
INSERT INTO `boys` VALUES (2100,20),(2101,21),(2102,22),(2103,23),(2104,24),(2105,25);
/*!40000 ALTER TABLE `boys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `butterfly`
--

DROP TABLE IF EXISTS `butterfly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `butterfly` (
  `butterfly_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`butterfly_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `butterfly_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1052 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `butterfly`
--

LOCK TABLES `butterfly` WRITE;
/*!40000 ALTER TABLE `butterfly` DISABLE KEYS */;
INSERT INTO `butterfly` VALUES (1050,26),(1051,32);
/*!40000 ALTER TABLE `butterfly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `coll_id` int DEFAULT NULL,
  `stock_id` int DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_stockInCart` (`stock_id`),
  KEY `fk_cart_coll_id` (`coll_id`),
  CONSTRAINT `fk_cart_coll_id` FOREIGN KEY (`coll_id`) REFERENCES `collection` (`coll_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_stockInCart` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3018 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (3003,1008,170),(3004,1010,10),(3008,1025,334);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classics`
--

DROP TABLE IF EXISTS `classics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classics` (
  `classics_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`classics_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `classics_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8009 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classics`
--

LOCK TABLES `classics` WRITE;
/*!40000 ALTER TABLE `classics` DISABLE KEYS */;
INSERT INTO `classics` VALUES (8003,2),(8002,6),(8006,8),(8000,9),(8001,10),(8005,20),(8007,29),(8004,40),(8008,42);
/*!40000 ALTER TABLE `classics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection`
--

DROP TABLE IF EXISTS `collection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collection` (
  `coll_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`coll_id`),
  KEY `customer_id` (`customer_id`),
  KEY `FOREIGN_KEY_PROD_ID` (`prod_id`),
  CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `FOREIGN_KEY_PROD_ID` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1042 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection`
--

LOCK TABLES `collection` WRITE;
/*!40000 ALTER TABLE `collection` DISABLE KEYS */;
INSERT INTO `collection` VALUES (1008,105,16),(1009,105,29),(1010,106,1),(1011,106,27),(1012,106,48),(1025,105,29);
/*!40000 ALTER TABLE `collection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courier`
--

DROP TABLE IF EXISTS `courier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courier` (
  `courier_id` int NOT NULL AUTO_INCREMENT,
  `jurist_id` int DEFAULT NULL,
  PRIMARY KEY (`courier_id`),
  KEY `jurist_id` (`jurist_id`),
  CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`jurist_id`) REFERENCES `juristic` (`jurist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courier`
--

LOCK TABLES `courier` WRITE;
/*!40000 ALTER TABLE `courier` DISABLE KEYS */;
INSERT INTO `courier` VALUES (231,47321),(232,47323),(233,47326);
/*!40000 ALTER TABLE `courier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `stakeholder_id` int DEFAULT NULL,
  `name` varchar(68) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(68) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `card_no` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exp_date` varchar(4) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `stakeholder_id` (`stakeholder_id`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`stakeholder_id`) REFERENCES `stakeholders` (`stakeholder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (101,14574,'John','Doe','Password123!','4480123412341000','0929'),(102,14578,'Suzanne','Mashaba','Secret45###',NULL,NULL),(104,14583,'Otsile','Modiselle','$2y$10$e78Ij9xXPLxFfjJTZXeA5e9UCdURmuWQn/lyEmdQrtvHw257vScfq','4480745011492088','0326'),(105,14584,'Sandy','Hurynarin','$2y$10$yfljxZrXj58I5UlUHBG.dOmyodO2BO0dCIMoI4e1Md1dl6NHi3lPq',NULL,NULL),(106,14585,'Janice','Moleko','$2y$10$rLWDtr01eg7l5cyzlmRGWe3jkUR85C4N9pVv2bVTc7jM1JMCT1.Ty',NULL,NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empire`
--

DROP TABLE IF EXISTS `empire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empire` (
  `empire_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`empire_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `empire_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2906 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empire`
--

LOCK TABLES `empire` WRITE;
/*!40000 ALTER TABLE `empire` DISABLE KEYS */;
INSERT INTO `empire` VALUES (2905,19),(2902,28),(2903,29),(2904,30),(2901,34),(2900,39);
/*!40000 ALTER TABLE `empire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `girls`
--

DROP TABLE IF EXISTS `girls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `girls` (
  `girls_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`girls_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `girls_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3307 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `girls`
--

LOCK TABLES `girls` WRITE;
/*!40000 ALTER TABLE `girls` DISABLE KEYS */;
INSERT INTO `girls` VALUES (3300,5),(3301,9),(3302,16),(3303,18),(3304,27),(3305,38),(3306,48);
/*!40000 ALTER TABLE `girls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juristic`
--

DROP TABLE IF EXISTS `juristic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juristic` (
  `jurist_id` int NOT NULL AUTO_INCREMENT,
  `stakeholder_id` int DEFAULT NULL,
  `trading_name` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `freight_rate` decimal(10,0) DEFAULT NULL,
  `account_no` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `branch_code` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`jurist_id`),
  KEY `stakeholder_id` (`stakeholder_id`),
  CONSTRAINT `juristic_ibfk_1` FOREIGN KEY (`stakeholder_id`) REFERENCES `stakeholders` (`stakeholder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47328 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juristic`
--

LOCK TABLES `juristic` WRITE;
/*!40000 ALTER TABLE `juristic` DISABLE KEYS */;
INSERT INTO `juristic` VALUES (47321,14575,'RAM Couriers',73,'62000001452','250655'),(47322,14576,'Marriage Designs',90,'401475684','632005'),(47323,14577,'BEX Express',59,'1023567342','198765'),(47324,14579,'Big Day Bridals',90,'120145698','051001'),(47325,14580,'Lace Affairs',150,'58476982104','250655'),(47326,14581,'Aramex Couriers',65,'102417500','051001'),(47327,14582,'Silk Suits Pty (Ltd)',113,'476812404','632005');
/*!40000 ALTER TABLE `juristic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lace`
--

DROP TABLE IF EXISTS `lace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lace` (
  `lace_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`lace_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `lace_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5026 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lace`
--

LOCK TABLES `lace` WRITE;
/*!40000 ALTER TABLE `lace` DISABLE KEYS */;
INSERT INTO `lace` VALUES (5025,9),(5023,28),(5024,29),(5022,34),(5021,38),(5020,39);
/*!40000 ALTER TABLE `lace` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mens`
--

DROP TABLE IF EXISTS `mens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mens` (
  `mens_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`mens_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `mens_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1237 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mens`
--

LOCK TABLES `mens` WRITE;
/*!40000 ALTER TABLE `mens` DISABLE KEYS */;
INSERT INTO `mens` VALUES (1220,6),(1221,8),(1222,10),(1223,11),(1224,13),(1225,15),(1226,31),(1227,33),(1228,35),(1229,36),(1230,37),(1231,42),(1232,43),(1233,44),(1234,45),(1235,46),(1236,49);
/*!40000 ALTER TABLE `mens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_`
--

DROP TABLE IF EXISTS `order_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `waybill` int DEFAULT NULL,
  `stock_details` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `order_total` decimal(10,2) DEFAULT NULL,
  `status` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prod_details` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `waybill` (`waybill`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `order__ibfk_1` FOREIGN KEY (`waybill`) REFERENCES `workitem` (`waybill`),
  CONSTRAINT `order__ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_`
--

LOCK TABLES `order_` WRITE;
/*!40000 ALTER TABLE `order_` DISABLE KEYS */;
INSERT INTO `order_` VALUES (16,2024563118,'120,',104,3500.00,'Fulfilled','11,');
/*!40000 ALTER TABLE `order_` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) DEFAULT NULL,
  `prod_name` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prod_desc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prod_img` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,4500.00,'Afro Layered Ball Gown','Stunning African-inspired wedding dress: Off-shoulder style with puffed sleeves, fitted bodice, and flowing, elegant skirt. Richly adorned with vibrant colors and intricate patterns in shades of red, yellow, green, black, and white.','afro_layered_ball_gown.webp',323),(2,3800.00,'Angellic Ball Gown','Elegant \"Angelic Ball Gown\" crafted from luxurious silk or satin, with a soft ivory color and smooth texture. Features a deep V-neckline, thin shoulder straps, fitted bodice, and voluminous skirt reminiscent of angel wings.','angellic_ball_gown.webp',322),(3,3400.00,'Athenian Debutante','Grecian-inspired \"Athenian Debutante\" dress: Crafted from soft chiffon in beige/cream, featuring a deep V-neckline at front and back, elegantly ruched bodice, and a full skirt cascading to the floor, evoking classic Grecian elegance.','athenian_debutante.webp',324),(4,3500.00,'Bandage Wrap Debutante','Elegant \"Bandage Wrap Debutante\" dress: Contours the body with a crisscrossed fabric pattern on a cream/beige chiffon bodice, cinched waist, flowing skirt adorned with vertical pleats, embodying understated elegance.','bandage_wrap_debutante.webp',324),(5,600.00,'Bantu Ballerina Flower Girl','Charming ensemble for young flower girls/ring bearers: Vibrant African print top, short ruffled sleeves, ballerina-style skirt in off-white tulle. Matching hair accessory completes the look, blending traditional Bantu patterns with elegant design.','bantu_ballerina_flower_girl.webp',323),(6,4000.00,'Black And Blue Tux','The \"Black and Blue Tux\" is a sophisticated groom\'s suit with deep blue tones, slim-fit jacket, black lapels, matching trousers, white shirt, and black bow tie, embodying timeless elegance and meticulous design.','black_and_blue_tux.webp',325),(7,3800.00,'Champaigne Monroe','The \"Champagne Monroe\" dress, inspired by Marilyn Monroe, boasts plush velvet-like fabric, a daring V-neckline, embellished belt, and a voluminous skirt, blending classic elegance with modern flair for sophisticated brides.','champaigne_monroe.webp',322),(8,4200.00,'Champaigne Groom','The \"Champaign Groom\" suit exudes modern elegance with its refined champagne hue and single-breasted jacket. Paired with a matching vest and slim-fit trousers, it offers a luxurious yet understated option for grooms and groomsmen.','champaigne_groom.webp',325),(9,900.00,'Classic Laced Flower Girl','The \"Classic Laced Flower Girl\" dress, in cream with lace detailing, combines elegance with comfort. With a satin belt defining the waist and a fairy-tale-like tulle skirt, it\'s perfect for young wedding attendants, embodying charm and purity.','classic_laced_flower_girl.webp',324),(10,3600.00,'Cobalt Sports Suit','The \"Cobalt Sports Suit\" is a striking groom\'s ensemble with a vibrant cobalt blue hue. Tailored for a slim fit in luxurious wool blend, paired with a crisp white shirt, it\'s perfect for grooms seeking an elegant statement piece on their wedding day.','cobalt_sports_suit.webp',325),(11,3500.00,'Cobalt Suit','The \"Cobalt Suit\" exudes style for grooms and groomsmen with its slim fit design and rich cobalt color. Crafted from high-quality material, it offers both comfort and elegance, making it a distinguished choice for wedding attire.','cobalt_suit.webp',325),(12,3200.00,'Cross Hatch Lattice','The \"Cross Hatch Lattice\" wedding dress is stunning, featuring an intricate lattice pattern on silk. With an ivory hue, snug bodice, and graceful flare, it adds modern sophistication to traditional bridal style, a captivating choice for brides.','cross_hatch_lattice.webp',324),(13,3800.00,'Double Breasted Tangerine Groom','The \"Double-Breasted Tangerine Groom\" suit is bold, featuring striking light tangerine color, classic double-breasted design, and sharp peak lapels. Ideal for grooms making a statement with traditional style and modern flair.','double_breasted_tangerine_groom.webp',325),(14,4200.00,'Etched Velvet Ball Gown','The \"Etched Velvet Ball Gown\" boasts a deep V-neckline, slender straps, and a form-fitting bodice cascading into a grand skirt. Its etched velvet fabric in subtle champagne adds modern detailing to classic charm, ideal for sophisticated brides.','etched_velvet_ball_gown.webp',322),(15,3900.00,'Executive Groom','The \"Executive Groom\" suit blends classic tailoring with modern elegance. Crafted from high-quality material, possibly wool or premium synthetic, it features a light brown color for versatility. Perfect for any groomsman at a wedding.','executive_groom.webp',325),(16,600.00,'Fabric Flower Girl','The \"Fabric Flower Girl\" dress is a charming choice for weddings, with a sleeveless design, ruffled edges, and soft cream fabric. Intricate floral embroidery adds elegance, ideal for young attendants.','fabric_flower_girl.webp',322),(17,3800.00,'Fairy Debutante','The Fairy Debutante dress, with its lace-adorned V-neck bodice and layered tulle skirt, embodies sophistication and grace, creating an ethereal, voluminous silhouette in a pure white hue.','fairy_debutante.webp',324),(18,900.00,'Hybrid Velvet Ring Bearer','The Hybrid velvet Ring Bearer ensemble is a unique combo for ring bearers, featuring a cream velvet jacket with elegant lapel details and a contrasting light dress to match. It offers a sophisticated yet playful look perfect for the big day.','hybrid_velvet_ring_bearer.webp',322),(19,3700.00,'Lateral Cascade Empire Dress','The Lateral Cascade Empire Dress features a lace bodice with a V-neck and a satin waistband. The skirt has lateral tulle layers with satin bands, all in a light, ethereal color scheme. It’s a blend of elegance and modernity.','lateral_cascade_empire_dress.webp',324),(20,1200.00,'Miniature Black Bowler Hat Suit','The Miniature Black Bowler Hat Suit is a classic, elegant wedding suit for young ring bearers, featuring a black jacket, white shirt, bow tie, and unique lateral woven patterns, paired with a black bowler hat for a timeless, stylish look.','miniature_black_bowler_hat_suit.webp',322),(21,1300.00,'Miniature Double Breasted Cream Suit','The Miniature Double Breasted Cream Suit is a refined ensemble for young ring bearers, featuring a smooth cream jacket with neat buttons, a crisp white shirt, a cream bow tie, and a floral boutonnière, exuding elegance and sophistication in its design.','miniature_double_breasted_cream_suit.webp',322),(22,1000.00,'Miniature Navy Waistcoat Set','The Miniature Navy Waistcoat Set for young ring bearers features a smooth navy waistcoat with golden buttons, matching trousers, a white shirt, and a patterned bow tie, creating a sharp, elegant look perfect for special occasions.','miniature_navy_waistcoat_set.webp',322),(23,1100.00,'Miniature Sabbath Suit','The Miniature Sabbath Suit is a white ensemble tailored for young ring bearers, featuring a jacket with decorative buttons and stylish lapels, complemented by matching trousers, and an intricate pattern on the jacket.','miniature_sabbath_suit.webp',322),(24,1300.00,'Miniature Silver Suit','The Miniature Silver Suit is a sleek, cream-colored ensemble for young ring bearers, featuring a satin-finished jacket, matching trousers, a white shirt, an elegant bow tie, and a rose boutonniere, embodying grace and formality.','miniature_silver_suit.webp',322),(25,1500.00,'Miniature Tux','The \"Miniature Tux\" is a black wedding suit with a white shirt and classic bow tie. The jacket’s sleek material has a subtle sheen, while the shirt is smooth, highlighting the outfit’s elegance and sophistication for young ring bearers.','miniature_tux.webp',322),(26,4300.00,'Muted Butterfly Ball Gown','The Muted Butterfly Ball Gown is a white, silky wedding dress with a full skirt and fabric butterflies adorning the bodice and skirt, creating an elegant and whimsical look. The gown\'s intricate butterfly details offer a tasteful, luxurious aesthetic.','muted_butterfly_ball_gown.webp',322),(27,1200.00,'Navy Traditional Flower Girl','The \"Navy Traditional Flower Girl\" dress features vibrant African print patterns in red, blue, and gold, with a sleeveless design and flared skirt, combining elegance with youthful charm and reflecting a rich cultural heritage.','navy_traditional_flower_girl.webp',323),(28,3500.00,'Ornate Empire Collared Lace','The \"Ornate Empire Collared Lace\" wedding dress features exquisite lace detailing, an elegant high collar, and a flowing empire silhouette, crafted from sheer fabric that reveals subtle patterns, creating a sophisticated and ethereal appearance.','ornate_empire_collared_lace.webp',324),(29,3800.00,'Ornate Empire Traditional Lace','The ornate empire traditional lace wedding dress is a masterpiece of intricate design. Crafted from delicate lace, it exudes elegance. The ivory hue adds a soft, ethereal quality. A flowing train exudes regal charm.','ornate_empire_traditional_lace.webp',324),(30,4000.00,'Ornate Empire Waist Fairy Sleeveless','The Ornate Empire Waist Fairy Sleeveless Wedding Dress is intricately designed. The dress is sleeveless with a deep V-neckline. The soft material gracefully drapes, creating an ethereal aesthetic synonymous with fairy-tale weddings.','ornate_empire_waist_fairy_sleeveless.webp',324),(31,3800.00,'Powder Silver Groom','The Powder Silver Groom wedding suit exudes sophistication. Crafted from a luxurious, light grey fabric with a subtle sheen, it features a fitted jacket with notch lapels, a waistcoat, and matching trousers. The ensemble is completed by a bow tie.','powder_silver_groom.webp',325),(32,3900.00,'Princess Butterfly Ball Gown','The Princess Butterfly Ball Gown is a luxurious wedding dress adorned with intricate lace detailing on the bodice. Delicate butterflies grace the gown, adding a whimsical touch. The deep V-neckline and voluminous skirt complete this enchanting ensemble.','princess_butterfly_ball_gown.webp',324),(33,3600.00,'Rose Gold Satin Suit','The Rose Gold Satin Suit is elegant, showcasing a luxurious sheen. The blazer is tailored, with a notched lapel and two-button closure. Paired with slim-fit trousers, the ensemble exudes sophistication. The suit epitomizes modern wedding attire elegance.','rose_gold_satin_suit.webp',325),(34,3800.00,'Royal Collared Flower Lace Empire','The royal collared Flower Lace Empire Dress is a meticulously crafted wedding gown. Its lace bodice features intricate floral patterns, extending into a high collar. The airy skirt, adorned with subtle florals, exudes an ethereal charm.','royal_collared_flower_lace_empire.webp',324),(35,3700.00,'Silver Satin Suit','The Silver Satin Suit is a sophisticated ensemble. Its lustrous silver satin material drapes elegantly. The tailored jacket features peaked lapels and flap pockets, while the slim-fit trousers complete the look.','silver_satin_suit.webp',325),(36,3700.00,'Steel Blue Suit','The Steel Blue Suit is a sophisticated ensemble, featuring a tailored fit. The suit is made of a rich, steel blue fabric that exudes elegance. It includes a well-fitted blazer with notch lapels and matching trousers.','steel_blue_suit.webp',325),(37,3700.00,'Tangerine Groom','The \"Tangerine Groom\" attire is a sophisticated, well-tailored suit. It’s made of a smooth, matte fabric in a soft tangerine hue. The jacket has a modern fit, notched lapels, and two buttons. It exudes elegance and modernity.','tangerine_groom.webp',325),(38,1300.00,'Traditional Laced Flower Girl','The attire is a meticulously crafted Traditional Laced Flower Girl dress. It features intricate lace detailing, with floral patterns woven into the fabric, giving it an elegant and delicate appearance.','traditional_laced_flower_girl.webp',322),(39,3400.00,'Traveler Empire Lace Dress','The Traveler Empire Lace Dress is an elegant wedding gown, featuring intricate lace detailing throughout. Its full, flowing skirt exudes romance, crafted from layers of luxurious lace that cascade gracefully to the floor.','traveler_empire_lace_dress.webp',324),(40,3500.00,'Velvet Ballerina Bride','The Velvet Ballerina Bride dress exudes elegance. Its smooth, white fabric symbolizes purity. A sweetheart neckline graces the bodice, while pleated details add texture. The full skirt flows seamlessly, evoking ethereal beauty.','velvet_ballerina_bride.webp',322),(41,3500.00,'Velvet Monroe','The Velvet Monroe wedding dress, inspired by Marilyn Monroe\'s iconic attire, features a luxurious, silky ivory fabric that gracefully flows, reflecting light beautifully. The dress boasts a deep V-neckline and is reminiscent of classic Hollywood glamour.','velvet_monroe.webp',322),(42,3400.00,'Velvet Black Executive Groom','The Velvet Black Executive Groom exudes sophistication. The tailored black blazer, with satin lapels, feels luxurious. Beneath it, a crisp white shirt and neatly folded pocket square complete the ensemble. Ideal for a groom, on their big day.','velvet_black_executive_groom.webp',325),(43,3700.00,'Zulu Geometric Coarse Cream Suit','The Velvet Black Executive Groom exudes sophistication. The tailored black blazer, with satin lapels, feels luxurious. Beneath it, a crisp white shirt and neatly folded pocket square complete the ensemble. Ideal for a groom, on their big day.','zulu_geometric_coarse_cream_suit.webp',323),(44,3800.00,'Zulu Geometric Coarse Fawn Suit','The Zulu Geometric Coarse Fawn Suit is a captivating wedding ensemble. Crafted from coarse material, it boasts intricate traditional Zulu patterns. The fawn hue accentuates rich textures, while geometric designs create an elegant yet bold aesthetic.','zulu_geometric_coarse_fawn_suit.webp',323),(45,3800.00,'Zulu Geometric Coarse Latte Suit','The Zulu Geometric Coarse Latte Suit is a captivating wedding ensemble. Crafted from coarse material, it boasts intricate traditional Zulu patterns. The latte hue accentuates rich textures, while geometric designs in create an elegant yet bold aesthetic.','zulu_geometric_coarse_latte_suit.webp',323),(46,3600.00,'Zulu Geometric Cream Suit','The Zulu Geometric Cream Suit is a captivating wedding ensemble. It boasts intricate traditional Zulu patterns on the blazer. The cream hue harmonizes with earthy tones, creating an elegant aesthetic. The matching pants complete this cultural masterpiece.','zulu_geometric_cream_suit.webp',323),(47,3600.00,'Zulu Golden Debutante','The Zulu Golden Debutante wedding dress is adorned with traditional Zulu patterns. It features a mix of colors, intricate beadwork, and detailed embroidery. Included are a head dress and an off-shoulder design paying homage to cultural aesthetics.','zulu_golden_debutante.webp',323),(48,1400.00,'Zulu Royal Ring Bearer','A white frock adorned with traditional Zulu patterns, perfect for young flower girls at weddings. Its elegant pleats and intricate patterns blend tradition with sophistication, creating a timeless ensemble for the special occasion.','zulu_royal_ring_bearer.webp',323),(49,3700.00,'Steel Blue Sports Suit','The Steel Blue Sports Suit is a tailored ensemble made of smooth, high-quality fabric. Its steel blue color exudes sophistication. The fitted blazer features notch lapels, complemented by matching trousers.','steel_blue_sports_suit.webp',325);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restocking`
--

DROP TABLE IF EXISTS `restocking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restocking` (
  `restock_id` int NOT NULL AUTO_INCREMENT,
  `waybill` int DEFAULT NULL,
  PRIMARY KEY (`restock_id`),
  KEY `waybill` (`waybill`),
  CONSTRAINT `restocking_ibfk_1` FOREIGN KEY (`waybill`) REFERENCES `workitem` (`waybill`)
) ENGINE=InnoDB AUTO_INCREMENT=34500 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restocking`
--

LOCK TABLES `restocking` WRITE;
/*!40000 ALTER TABLE `restocking` DISABLE KEYS */;
/*!40000 ALTER TABLE `restocking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `return_`
--

DROP TABLE IF EXISTS `return_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `return_` (
  `return_id` int NOT NULL AUTO_INCREMENT,
  `waybill` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `return_desc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `return_value` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`return_id`),
  KEY `waybill` (`waybill`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `return__ibfk_1` FOREIGN KEY (`waybill`) REFERENCES `workitem` (`waybill`),
  CONSTRAINT `return__ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `return_`
--

LOCK TABLES `return_` WRITE;
/*!40000 ALTER TABLE `return_` DISABLE KEYS */;
/*!40000 ALTER TABLE `return_` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `sale_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `fk_sales_product` (`prod_id`),
  CONSTRAINT `fk_sales_product` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (2,3),(4,4),(1,12),(5,28),(3,39),(6,40),(7,41),(8,47);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stakeholders`
--

DROP TABLE IF EXISTS `stakeholders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stakeholders` (
  `stakeholder_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_number` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`stakeholder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14586 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stakeholders`
--

LOCK TABLES `stakeholders` WRITE;
/*!40000 ALTER TABLE `stakeholders` DISABLE KEYS */;
INSERT INTO `stakeholders` VALUES (14574,'johndoe@gmail.com','1 Skip Street, Pretoria, 0081','0831234567'),(14575,'info@ramcouriers.co.za','27 Wrench Road, Kempton Park, 1600','0104948223'),(14576,'inventory@mdesign.co.za','355 Bullhorn Street, Johannesburg, 2215','0117375841'),(14577,'info@bexexpress.co.za','120 Loper Avenue, Kempton Park, 1619','0861239397'),(14578,'suzymashaba@gmail.com','45 Harpoon Lane, Midrand, 0157','0723214321'),(14579,'supplies@bigday.co.za','1566 Graham Road, Braamfontein, 2210','0114769874'),(14580,'contact@laceaffair.com','9 Phillemon street, Pretoria, 0012','0125120977'),(14581,'dispatch@aramex.co.za','57 Cilliers Drive, Johannesburg, 2217','0114120068'),(14582,'info@silksuits.co.za','372 Yellow Creek Drive, Randburg, 1634','0105746921'),(14583,'otsilemodiselle@outlook.com','87 Frikkie de Beer Street, Menlyn, Pretoria, 0181','0813044999'),(14584,'shurynarin@gmail.com',NULL,NULL),(14585,'janicem@icloud.com',NULL,'0712345678');
/*!40000 ALTER TABLE `stakeholders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock` (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int NOT NULL,
  `size` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `FOREIGN_KEY` (`prod_id`),
  CONSTRAINT `FOREIGN_KEY` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=546 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (4,1,'XS'),(5,1,'XS'),(6,1,'S'),(7,1,'S'),(8,1,'M'),(9,1,'M'),(10,1,'L'),(11,1,'L'),(12,1,'XL'),(13,1,'XL'),(14,2,'XS'),(15,2,'XS'),(16,2,'S'),(17,2,'S'),(18,2,'M'),(19,2,'M'),(20,2,'L'),(21,2,'L'),(22,2,'XL'),(23,2,'XL'),(24,3,'XS'),(25,3,'XS'),(26,3,'S'),(27,3,'S'),(28,3,'M'),(29,3,'M'),(30,3,'L'),(31,3,'L'),(32,3,'XL'),(33,3,'XL'),(34,4,'XS'),(35,4,'XS'),(36,4,'S'),(37,4,'S'),(38,4,'M'),(39,4,'M'),(40,4,'L'),(41,4,'L'),(42,4,'XL'),(43,4,'XL'),(44,5,'6'),(45,5,'6'),(46,5,'7'),(47,5,'7'),(48,5,'8'),(49,5,'8'),(50,5,'9'),(51,5,'9'),(52,5,'10'),(53,5,'10'),(54,5,'11'),(55,5,'11'),(56,5,'12'),(57,5,'12'),(58,6,'XS'),(59,6,'XS'),(60,6,'S'),(61,6,'S'),(62,6,'M'),(63,6,'M'),(64,6,'L'),(65,6,'L'),(66,6,'XL'),(67,6,'XL'),(68,7,'XS'),(69,7,'XS'),(70,7,'S'),(71,7,'S'),(72,7,'M'),(73,7,'M'),(74,7,'L'),(75,7,'L'),(76,7,'XL'),(77,7,'XL'),(78,8,'XS'),(79,8,'XS'),(80,8,'S'),(81,8,'S'),(82,8,'M'),(83,8,'M'),(84,8,'L'),(85,8,'L'),(86,8,'XL'),(87,8,'XL'),(88,9,'6'),(89,9,'6'),(90,9,'7'),(91,9,'7'),(92,9,'8'),(93,9,'8'),(94,9,'9'),(95,9,'9'),(96,9,'10'),(97,9,'10'),(98,9,'11'),(99,9,'11'),(100,9,'12'),(101,9,'12'),(102,10,'XS'),(103,10,'XS'),(104,10,'S'),(105,10,'S'),(106,10,'M'),(107,10,'M'),(108,10,'L'),(109,10,'L'),(110,10,'XL'),(111,10,'XL'),(112,11,'XS'),(113,11,'XS'),(114,11,'S'),(115,11,'S'),(116,11,'M'),(117,11,'M'),(118,11,'L'),(119,11,'L'),(121,11,'XL'),(122,12,'XS'),(123,12,'XS'),(124,12,'S'),(125,12,'S'),(126,12,'M'),(127,12,'M'),(128,12,'L'),(129,12,'L'),(130,12,'XL'),(131,12,'XL'),(132,13,'XS'),(133,13,'XS'),(134,13,'S'),(135,13,'S'),(136,13,'M'),(137,13,'M'),(138,13,'L'),(139,13,'L'),(140,13,'XL'),(141,13,'XL'),(142,14,'XS'),(143,14,'XS'),(144,14,'S'),(145,14,'S'),(146,14,'M'),(147,14,'M'),(148,14,'L'),(149,14,'L'),(150,14,'XL'),(151,14,'XL'),(152,15,'XS'),(153,15,'XS'),(154,15,'S'),(155,15,'S'),(156,15,'M'),(157,15,'M'),(158,15,'L'),(159,15,'L'),(160,15,'XL'),(161,15,'XL'),(162,16,'6'),(163,16,'6'),(164,16,'7'),(165,16,'7'),(166,16,'8'),(167,16,'8'),(168,16,'9'),(169,16,'9'),(170,16,'10'),(171,16,'10'),(172,16,'11'),(173,16,'11'),(174,16,'12'),(175,16,'12'),(176,17,'XS'),(177,17,'XS'),(178,17,'S'),(179,17,'S'),(180,17,'M'),(181,17,'M'),(182,17,'L'),(183,17,'L'),(184,17,'XL'),(185,17,'XL'),(186,18,'6'),(187,18,'6'),(188,18,'7'),(189,18,'7'),(190,18,'8'),(191,18,'8'),(192,18,'9'),(193,18,'9'),(194,18,'10'),(195,18,'10'),(196,18,'11'),(197,18,'11'),(198,18,'12'),(199,18,'12'),(200,19,'XS'),(201,19,'XS'),(202,19,'S'),(203,19,'S'),(204,19,'M'),(205,19,'M'),(206,19,'L'),(207,19,'L'),(208,19,'XL'),(209,19,'XL'),(210,20,'6'),(211,20,'6'),(212,20,'7'),(213,20,'7'),(214,20,'8'),(215,20,'8'),(216,20,'9'),(217,20,'9'),(218,20,'10'),(219,20,'10'),(220,20,'11'),(221,20,'11'),(222,20,'12'),(223,20,'12'),(224,21,'6'),(225,21,'6'),(226,21,'7'),(227,21,'7'),(228,21,'8'),(229,21,'8'),(230,21,'9'),(231,21,'9'),(232,21,'10'),(233,21,'10'),(234,21,'11'),(235,21,'11'),(236,21,'12'),(237,21,'12'),(238,22,'6'),(239,22,'6'),(240,22,'7'),(241,22,'7'),(242,22,'8'),(243,22,'8'),(244,22,'9'),(245,22,'9'),(246,22,'10'),(247,22,'10'),(248,22,'11'),(249,22,'11'),(250,22,'12'),(251,22,'12'),(252,23,'6'),(253,23,'6'),(254,23,'7'),(255,23,'7'),(256,23,'8'),(257,23,'8'),(258,23,'9'),(259,23,'9'),(260,23,'10'),(261,23,'10'),(262,23,'11'),(263,23,'11'),(264,23,'12'),(265,23,'12'),(266,24,'6'),(267,24,'6'),(268,24,'7'),(269,24,'7'),(270,24,'8'),(271,24,'8'),(272,24,'9'),(273,24,'9'),(274,24,'10'),(275,24,'10'),(276,24,'11'),(277,24,'11'),(278,24,'12'),(279,24,'12'),(280,25,'6'),(281,25,'6'),(282,25,'7'),(283,25,'7'),(284,25,'8'),(285,25,'8'),(286,25,'9'),(287,25,'9'),(288,25,'10'),(289,25,'10'),(290,25,'11'),(291,25,'11'),(292,25,'12'),(293,25,'12'),(294,26,'XS'),(295,26,'XS'),(296,26,'S'),(297,26,'S'),(298,26,'M'),(299,26,'M'),(300,26,'L'),(301,26,'L'),(302,26,'XL'),(303,26,'XL'),(304,27,'6'),(305,27,'6'),(306,27,'7'),(307,27,'7'),(308,27,'8'),(309,27,'8'),(310,27,'9'),(311,27,'9'),(312,27,'10'),(313,27,'10'),(314,27,'11'),(315,27,'11'),(316,27,'12'),(317,27,'12'),(318,28,'XS'),(319,28,'XS'),(320,28,'S'),(321,28,'S'),(322,28,'M'),(323,28,'M'),(324,28,'L'),(325,28,'L'),(326,28,'XL'),(327,28,'XL'),(328,29,'XS'),(329,29,'XS'),(330,29,'S'),(331,29,'S'),(332,29,'M'),(333,29,'M'),(334,29,'L'),(335,29,'L'),(336,29,'XL'),(337,29,'XL'),(338,30,'XS'),(339,30,'XS'),(340,30,'S'),(341,30,'S'),(342,30,'M'),(343,30,'M'),(344,30,'L'),(345,30,'L'),(346,30,'XL'),(347,30,'XL'),(348,31,'XS'),(349,31,'XS'),(350,31,'S'),(351,31,'S'),(352,31,'M'),(353,31,'M'),(354,31,'L'),(355,31,'L'),(356,31,'XL'),(357,31,'XL'),(358,32,'XS'),(359,32,'XS'),(360,32,'S'),(361,32,'S'),(362,32,'M'),(363,32,'M'),(364,32,'L'),(365,32,'L'),(366,32,'XL'),(367,32,'XL'),(368,33,'XS'),(369,33,'XS'),(370,33,'S'),(371,33,'S'),(372,33,'M'),(373,33,'M'),(374,33,'L'),(375,33,'L'),(376,33,'XL'),(377,33,'XL'),(378,34,'XS'),(379,34,'XS'),(380,34,'S'),(381,34,'S'),(382,34,'M'),(383,34,'M'),(384,34,'L'),(385,34,'L'),(386,34,'XL'),(387,34,'XL'),(388,35,'XS'),(389,35,'XS'),(390,35,'S'),(391,35,'S'),(392,35,'M'),(393,35,'M'),(394,35,'L'),(395,35,'L'),(396,35,'XL'),(397,35,'XL'),(398,36,'XS'),(399,36,'XS'),(400,36,'S'),(401,36,'S'),(402,36,'M'),(403,36,'M'),(404,36,'L'),(405,36,'L'),(406,36,'XL'),(407,36,'XL'),(408,37,'XS'),(409,37,'XS'),(410,37,'S'),(411,37,'S'),(412,37,'M'),(413,37,'M'),(414,37,'L'),(415,37,'L'),(416,37,'XL'),(417,37,'XL'),(418,38,'6'),(419,38,'6'),(420,38,'7'),(421,38,'7'),(422,38,'8'),(423,38,'8'),(424,38,'9'),(425,38,'9'),(426,38,'10'),(427,38,'10'),(428,38,'11'),(429,38,'11'),(430,38,'12'),(431,38,'12'),(432,39,'XS'),(433,39,'XS'),(434,39,'S'),(435,39,'S'),(436,39,'M'),(437,39,'M'),(438,39,'L'),(439,39,'L'),(440,39,'XL'),(441,39,'XL'),(442,40,'XS'),(443,40,'XS'),(444,40,'S'),(445,40,'S'),(446,40,'M'),(447,40,'M'),(448,40,'L'),(449,40,'L'),(450,40,'XL'),(451,40,'XL'),(452,41,'XS'),(453,41,'XS'),(454,41,'S'),(455,41,'S'),(456,41,'M'),(457,41,'M'),(458,41,'L'),(459,41,'L'),(460,41,'XL'),(461,41,'XL'),(462,42,'XS'),(463,42,'XS'),(464,42,'S'),(465,42,'S'),(466,42,'M'),(467,42,'M'),(468,42,'L'),(469,42,'L'),(470,42,'XL'),(471,42,'XL'),(472,43,'XS'),(473,43,'XS'),(474,43,'S'),(475,43,'S'),(476,43,'M'),(477,43,'M'),(478,43,'L'),(479,43,'L'),(480,43,'XL'),(481,43,'XL'),(482,44,'XS'),(483,44,'XS'),(484,44,'S'),(485,44,'S'),(486,44,'M'),(487,44,'M'),(488,44,'L'),(489,44,'L'),(490,44,'XL'),(491,44,'XL'),(492,45,'XS'),(493,45,'XS'),(494,45,'S'),(495,45,'S'),(496,45,'M'),(497,45,'M'),(498,45,'L'),(499,45,'L'),(500,45,'XL'),(501,45,'XL'),(502,46,'XS'),(503,46,'XS'),(504,46,'S'),(505,46,'S'),(506,46,'M'),(507,46,'M'),(508,46,'L'),(509,46,'L'),(510,46,'XL'),(511,46,'XL'),(512,47,'XS'),(513,47,'XS'),(514,47,'S'),(515,47,'S'),(516,47,'M'),(517,47,'M'),(518,47,'L'),(519,47,'L'),(520,47,'XL'),(521,47,'XL'),(522,48,'6'),(523,48,'6'),(524,48,'7'),(525,48,'7'),(526,48,'8'),(527,48,'8'),(528,48,'9'),(529,48,'9'),(530,48,'10'),(531,48,'10'),(532,48,'11'),(533,48,'11'),(534,48,'12'),(535,48,'12'),(536,49,'XS'),(537,49,'XS'),(538,49,'S'),(539,49,'S'),(540,49,'M'),(541,49,'M'),(542,49,'L'),(543,49,'L'),(544,49,'XL'),(545,49,'XL');
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `jurist_id` int DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `jurist_id` (`jurist_id`),
  CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`jurist_id`) REFERENCES `juristic` (`jurist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (322,47322),(323,47324),(324,47325),(325,47327);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traditional`
--

DROP TABLE IF EXISTS `traditional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `traditional` (
  `trad_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`trad_id`),
  KEY `fk_traditional_product` (`prod_id`),
  CONSTRAINT `fk_traditional_product` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traditional`
--

LOCK TABLES `traditional` WRITE;
/*!40000 ALTER TABLE `traditional` DISABLE KEYS */;
INSERT INTO `traditional` VALUES (1,1),(2,5),(3,27),(4,38),(5,43),(6,44),(7,45),(8,46),(9,47),(10,48);
/*!40000 ALTER TABLE `traditional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `wish_id` int NOT NULL AUTO_INCREMENT,
  `coll_id` int DEFAULT NULL,
  PRIMARY KEY (`wish_id`),
  KEY `fk_wishlist_coll_id` (`coll_id`),
  CONSTRAINT `fk_wishlist_coll_id` FOREIGN KEY (`coll_id`) REFERENCES `collection` (`coll_id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`coll_id`) REFERENCES `collection` (`coll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2023 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (2004,1009),(2005,1011),(2006,1012);
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `womens`
--

DROP TABLE IF EXISTS `womens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `womens` (
  `womens_id` int NOT NULL AUTO_INCREMENT,
  `prod_id` int DEFAULT NULL,
  PRIMARY KEY (`womens_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `womens_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `womens`
--

LOCK TABLES `womens` WRITE;
/*!40000 ALTER TABLE `womens` DISABLE KEYS */;
INSERT INTO `womens` VALUES (130,1),(131,2),(132,3),(133,4),(134,7),(135,12),(136,14),(137,17),(138,19),(139,26),(140,28),(141,29),(142,30),(143,32),(144,34),(145,39),(146,40),(147,41),(148,47);
/*!40000 ALTER TABLE `womens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workitem`
--

DROP TABLE IF EXISTS `workitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workitem` (
  `waybill` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `courier_id` int DEFAULT NULL,
  PRIMARY KEY (`waybill`),
  KEY `fk_workitem_courier` (`courier_id`),
  CONSTRAINT `fk_workitem_courier` FOREIGN KEY (`courier_id`) REFERENCES `courier` (`courier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2024563119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workitem`
--

LOCK TABLES `workitem` WRITE;
/*!40000 ALTER TABLE `workitem` DISABLE KEYS */;
INSERT INTO `workitem` VALUES (2024563100,'2024-05-23',231),(2024563101,'2024-05-23',231),(2024563102,'2024-05-23',232),(2024563103,'2024-05-23',231),(2024563104,'2024-05-23',231),(2024563105,'2024-05-24',231),(2024563106,'2024-05-24',232),(2024563107,'2024-05-25',233),(2024563108,'2024-05-25',231),(2024563109,'2024-05-30',233),(2024563110,'2024-05-30',233),(2024563111,'2024-05-30',231),(2024563112,'2024-05-30',231),(2024563113,'2024-05-30',233),(2024563114,'2024-05-30',233),(2024563115,'2024-05-30',233),(2024563116,'2024-05-30',232),(2024563117,'2024-05-31',232),(2024563118,'2024-05-31',232);
/*!40000 ALTER TABLE `workitem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-21  7:09:10
