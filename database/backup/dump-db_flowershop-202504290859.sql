-- MariaDB dump 10.19  Distrib 10.6.7-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_flowershop
-- ------------------------------------------------------
-- Server version	10.6.7-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_mst_flowers`
--

DROP TABLE IF EXISTS `tbl_mst_flowers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mst_flowers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_flower` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mst_flowers`
--

LOCK TABLES `tbl_mst_flowers` WRITE;
/*!40000 ALTER TABLE `tbl_mst_flowers` DISABLE KEYS */;
INSERT INTO `tbl_mst_flowers` VALUES (1,'Pink Rose',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(2,'Peach Rose',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(3,'Red Rose',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(4,'Pink Rose',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(5,'Soft Pink Gompie',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(6,'White Pompom',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(7,'Sunflower',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(8,'Yellow Pompom',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(9,'Purple Carnation',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(10,'Pink Carnation',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(11,'White Lisianthus',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL),(12,'Purple Carnation',10000,NULL,'2025-04-29 13:00:00.000','system',NULL,NULL);
/*!40000 ALTER TABLE `tbl_mst_flowers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mst_flowertype`
--

DROP TABLE IF EXISTS `tbl_mst_flowertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mst_flowertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_type` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mst_flowertype`
--

LOCK TABLES `tbl_mst_flowertype` WRITE;
/*!40000 ALTER TABLE `tbl_mst_flowertype` DISABLE KEYS */;
INSERT INTO `tbl_mst_flowertype` VALUES (1,'Baby Rose','2025-04-29 13:00:00','system',NULL,NULL),(2,'Baby\'s-breath','2025-04-29 13:00:00','system',NULL,NULL),(3,'Baby Rose','2025-04-29 13:00:00','system',NULL,NULL),(4,'Calla-lily','2025-04-29 13:00:00','system',NULL,NULL),(5,'Carnation','2025-04-29 13:00:00','system',NULL,NULL),(6,'Crysan','2025-04-29 13:00:00','system',NULL,NULL),(7,'Eryngium','2025-04-29 13:00:00','system',NULL,NULL),(8,'Baby Rose','2025-04-29 13:00:00','system',NULL,NULL),(9,'Garden-rose','2025-04-29 13:00:00','system',NULL,NULL),(10,'Baby Rose','2025-04-29 13:00:00','system',NULL,NULL),(11,'Gerbera','2025-04-29 13:00:00','system',NULL,NULL),(12,'Gompie','2025-04-29 13:00:00','system',NULL,NULL),(13,'Hydrangea','2025-04-29 13:00:00','system',NULL,NULL),(14,'Lily','2025-04-29 13:00:00','system',NULL,NULL),(15,'Lisianthus','2025-04-29 13:00:00','system',NULL,NULL),(16,'Orchid','2025-04-29 13:00:00','system',NULL,NULL),(17,'Peony','2025-04-29 13:00:00','system',NULL,NULL),(18,'Pompom','2025-04-29 13:00:00','system',NULL,NULL),(19,'Rose','2025-04-29 13:00:00','system',NULL,NULL),(20,'Snapdragon','2025-04-29 13:00:00','system',NULL,NULL);
/*!40000 ALTER TABLE `tbl_mst_flowertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mst_image_product`
--

DROP TABLE IF EXISTS `tbl_mst_image_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mst_image_product` (
  `id` varchar(100) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mst_image_product`
--

LOCK TABLES `tbl_mst_image_product` WRITE;
/*!40000 ALTER TABLE `tbl_mst_image_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_mst_image_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mst_price`
--

DROP TABLE IF EXISTS `tbl_mst_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mst_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mst_price`
--

LOCK TABLES `tbl_mst_price` WRITE;
/*!40000 ALTER TABLE `tbl_mst_price` DISABLE KEYS */;
INSERT INTO `tbl_mst_price` VALUES (1,1,'Besar',450000,0,'Berry Bouquets 3.jpg'),(2,1,'Sedang',380000,0,'Berry Bouquets 1.jpg'),(3,1,'Kecil',350000,0,'Berry Bouquets 2.jpg'),(4,2,'Besar',639000,0,'Scarlett Bouquets 1.jpg'),(5,2,'Sedang',469000,0,'Scarlett Bouquets 2.jpg'),(6,2,'Kecil',349000,0,'Scarlett Bouquets 3.jpg');
/*!40000 ALTER TABLE `tbl_mst_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mst_producttype`
--

DROP TABLE IF EXISTS `tbl_mst_producttype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mst_producttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mst_producttype`
--

LOCK TABLES `tbl_mst_producttype` WRITE;
/*!40000 ALTER TABLE `tbl_mst_producttype` DISABLE KEYS */;
INSERT INTO `tbl_mst_producttype` VALUES (1,'Bloom Box','2025-04-29 13:00:00','system',NULL,NULL),(2,'Bouquets','2025-04-29 13:00:00','system',NULL,NULL),(3,'Bunga Papan','2025-04-29 13:00:00','system',NULL,NULL),(4,'Forever Flower','2025-04-29 13:00:00','system',NULL,NULL),(5,'Standing Flower','2025-04-29 13:00:00','system',NULL,NULL),(6,'Wedding','2025-04-29 13:00:00','system',NULL,NULL),(7,'Vase','2025-04-29 13:00:00','system',NULL,NULL);
/*!40000 ALTER TABLE `tbl_mst_producttype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mst_produk`
--

DROP TABLE IF EXISTS `tbl_mst_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mst_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_produk` varchar(255) DEFAULT NULL,
  `flowery_type_id` int(11) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `type_sales` enum('INC','PCS') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mst_produk`
--

LOCK TABLES `tbl_mst_produk` WRITE;
/*!40000 ALTER TABLE `tbl_mst_produk` DISABLE KEYS */;
INSERT INTO `tbl_mst_produk` VALUES (1,'Berry Bouquets',1,1,'INC','The romantic red hue of gerbera flowers and roses.','2025-04-28 13:00:00','system',NULL,NULL),(2,'Scarlett Bouquets',1,1,'INC','Passionate love translated through roses, these red bloomers are the perfect complimentary for your romantic day.','2025-04-28 13:00:00','system',NULL,NULL);
/*!40000 ALTER TABLE `tbl_mst_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mst_role`
--

DROP TABLE IF EXISTS `tbl_mst_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mst_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(100) DEFAULT NULL,
  `code_role` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status_role` int(1) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_role_unique` (`code_role`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mst_role`
--

LOCK TABLES `tbl_mst_role` WRITE;
/*!40000 ALTER TABLE `tbl_mst_role` DISABLE KEYS */;
INSERT INTO `tbl_mst_role` VALUES (19,'PCD','pcd','2024-10-01 07:34:02','2024-10-02 07:26:25',1,NULL,'1'),(26,'supplier_1','sup_1','2024-10-01 10:39:18','2024-10-03 13:54:06',1,'1','1'),(31,'developer','dev','2024-10-01 13:01:26','2024-10-02 07:26:13',1,'1','1'),(35,'supplier','sup','2024-10-03 13:54:16','2024-10-03 13:54:30',1,'1','1');
/*!40000 ALTER TABLE `tbl_mst_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mst_users`
--

DROP TABLE IF EXISTS `tbl_mst_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mst_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `lock_user` int(1) DEFAULT 0,
  `profile` varchar(255) DEFAULT NULL,
  `supplier_id` varchar(3) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_mst_users_tbl_mst_role_FK` (`role_id`),
  CONSTRAINT `tbl_mst_users_tbl_mst_role_FK` FOREIGN KEY (`role_id`) REFERENCES `tbl_mst_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mst_users`
--

LOCK TABLES `tbl_mst_users` WRITE;
/*!40000 ALTER TABLE `tbl_mst_users` DISABLE KEYS */;
INSERT INTO `tbl_mst_users` VALUES (6,'dev','1og43Vf3owGth/gXxttSP1dEZEFKM0kvRjNkM1VpeGV3Zy9JRkE9PQ==','dev@mail.com','665665',0,NULL,'*',31,'2024-09-12 14:00:00','1','2024-12-26 16:42:19','1'),(9,'pcd','1og43Vf3owGth/gXxttSP1dEZEFKM0kvRjNkM1VpeGV3Zy9JRkE9PQ==','12@mail.com','654',0,NULL,'*',19,'2024-10-02 14:40:00','1','2024-12-26 16:41:47','1'),(11,'supplier','1og43Vf3owGth/gXxttSP1dEZEFKM0kvRjNkM1VpeGV3Zy9JRkE9PQ==','supplier@mail.com','726676',0,NULL,'*',35,'2024-10-03 09:57:03','1','2025-02-07 15:40:24','1'),(12,'admin','1og43Vf3owGth/gXxttSP1dEZEFKM0kvRjNkM1VpeGV3Zy9JRkE9PQ==','admin@mail.com','654',0,NULL,'*',19,'2024-12-26 16:43:27','1','2024-12-26 16:43:27',NULL),(13,'dev1','8lD/TJ6o1Iy0cS/CUDStZkVwcmRic3NFL0NxUEU5MWQ3YXJqMEE9PQ==','12@mail.com','08382178212',0,NULL,'*',35,'2025-02-07 15:25:39','1','2025-02-07 16:22:57','1');
/*!40000 ALTER TABLE `tbl_mst_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sys_menu`
--

DROP TABLE IF EXISTS `tbl_sys_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sys_menu` (
  `Menu_id` varchar(100) NOT NULL,
  `MenuLevel` varchar(100) DEFAULT NULL,
  `LevelNumber` varchar(100) DEFAULT NULL,
  `ParentMenu` varchar(100) DEFAULT NULL,
  `MenuName` varchar(100) DEFAULT NULL,
  `MenuIcon` varchar(100) DEFAULT NULL,
  `MenuUrl` varchar(100) DEFAULT NULL,
  `StatusMenu` int(1) DEFAULT 0,
  `Creates` int(1) DEFAULT NULL,
  `Reads` int(1) DEFAULT NULL,
  `Updates` int(1) DEFAULT NULL,
  `Deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`Menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sys_menu`
--

LOCK TABLES `tbl_sys_menu` WRITE;
/*!40000 ALTER TABLE `tbl_sys_menu` DISABLE KEYS */;
INSERT INTO `tbl_sys_menu` VALUES ('MN-1','0','0','*','Dashboard','fa fa-home','dashboard',1,0,1,0,0),('MN-2','1','1','*','Master Data','fas fa-cubes','base',1,0,0,0,0),('MN-2A','2','2','MN-2','Supplier','-','supplier',1,1,1,1,1),('MN-2B','2','2','MN-2','Units','-','units',1,1,1,1,1),('MN-2C','2','2','MN-2','Category','-','category',1,1,1,1,1),('MN-2D','2','2','MN-2','Part Material','-','part',1,1,1,1,1),('MN-3','1','1','*','Stock','fas fa-layer-group','proc',1,0,0,0,0),('MN-3A','2','2','MN-3','Upload Safe Stock','-','entrystock',1,1,1,1,0),('MN-3B','2','2','MN-3','Monitor Stock','-','monitorStock',1,0,1,0,0),('MN-4','1','1','*','Tools','fas fa-cog','tools',1,0,0,0,0),('MN-4A','2','2','MN-4','Roles','-','roles',1,1,1,1,1),('MN-4B','2','2','MN-4','Users','-','users',1,1,1,1,1);
/*!40000 ALTER TABLE `tbl_sys_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sys_menuusers`
--

DROP TABLE IF EXISTS `tbl_sys_menuusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sys_menuusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accessmenu_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `add` int(1) DEFAULT NULL,
  `edit` int(1) DEFAULT NULL,
  `delete` int(1) DEFAULT NULL,
  `showAll` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_sys_menuUsers_unique` (`accessmenu_id`,`user_id`),
  KEY `tbl_sys_menuUsers_tbl_mst_users_FK` (`user_id`),
  CONSTRAINT `tbl_sys_menuUsers_tbl_mst_users_FK` FOREIGN KEY (`user_id`) REFERENCES `tbl_mst_users` (`id`),
  CONSTRAINT `tbl_sys_menuUsers_tbl_sys_roleaccessmenu_FK` FOREIGN KEY (`accessmenu_id`) REFERENCES `tbl_sys_roleaccessmenu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1206 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sys_menuusers`
--

LOCK TABLES `tbl_sys_menuusers` WRITE;
/*!40000 ALTER TABLE `tbl_sys_menuusers` DISABLE KEYS */;
INSERT INTO `tbl_sys_menuusers` VALUES (1134,189,9,0,0,0,0,'2024-12-26 16:41:47','1'),(1135,208,9,0,0,0,0,'2024-12-26 16:41:47','1'),(1136,241,9,0,0,0,1,'2024-12-26 16:41:47','1'),(1149,228,6,0,0,0,0,'2024-12-26 16:42:19','1'),(1150,229,6,0,0,0,0,'2024-12-26 16:42:19','1'),(1151,230,6,1,1,1,1,'2024-12-26 16:42:19','1'),(1152,231,6,1,1,1,1,'2024-12-26 16:42:19','1'),(1153,232,6,1,1,1,1,'2024-12-26 16:42:19','1'),(1154,233,6,1,1,1,1,'2024-12-26 16:42:19','1'),(1155,234,6,0,0,0,0,'2024-12-26 16:42:19','1'),(1156,235,6,1,1,1,1,'2024-12-26 16:42:19','1'),(1157,236,6,1,1,1,1,'2024-12-26 16:42:19','1'),(1158,237,6,0,0,0,0,'2024-12-26 16:42:19','1'),(1159,238,6,1,1,1,1,'2024-12-26 16:42:19','1'),(1160,239,6,1,1,1,1,'2024-12-26 16:42:19','1'),(1161,189,12,0,0,0,0,'2024-12-26 16:43:27','1'),(1162,208,12,0,0,0,0,'2024-12-26 16:43:27','1'),(1163,241,12,1,1,1,1,'2024-12-26 16:43:27','1'),(1185,242,11,0,0,0,0,'2025-02-07 15:40:24','1'),(1186,243,11,1,1,1,1,'2025-02-07 15:40:24','1'),(1187,244,11,1,1,1,1,'2025-02-07 15:40:24','1'),(1203,242,13,0,0,0,0,'2025-02-07 16:22:57','1'),(1204,243,13,1,1,1,1,'2025-02-07 16:22:57','1'),(1205,244,13,1,1,1,1,'2025-02-07 16:22:57','1');
/*!40000 ALTER TABLE `tbl_sys_menuusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sys_roleaccessmenu`
--

DROP TABLE IF EXISTS `tbl_sys_roleaccessmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sys_roleaccessmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` varchar(11) DEFAULT NULL,
  `enable_menu` float DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_sys_roleaccessmenu_unique` (`role_id`,`menu_id`),
  KEY `tbl_sys_roleaccessmenu_tbl_sys_menu_FK` (`menu_id`),
  CONSTRAINT `tbl_sys_roleaccessmenu_tbl_mst_role_FK` FOREIGN KEY (`role_id`) REFERENCES `tbl_mst_role` (`id`),
  CONSTRAINT `tbl_sys_roleaccessmenu_tbl_sys_menu_FK` FOREIGN KEY (`menu_id`) REFERENCES `tbl_sys_menu` (`Menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sys_roleaccessmenu`
--

LOCK TABLES `tbl_sys_roleaccessmenu` WRITE;
/*!40000 ALTER TABLE `tbl_sys_roleaccessmenu` DISABLE KEYS */;
INSERT INTO `tbl_sys_roleaccessmenu` VALUES (189,19,'MN-1',1,'2024-10-01 08:05:47','1','2024-10-02 07:32:10','1'),(193,26,'MN-1',1,'2024-10-01 10:39:18','1','2024-10-03 13:54:06','1'),(196,26,'MN-3',1,'2024-10-01 10:50:53','1','2024-10-03 13:54:06','1'),(197,26,'MN-3A',1,'2024-10-01 10:50:53','1','2024-10-03 13:54:06','1'),(198,26,'MN-3B',1,'2024-10-01 10:50:53','1','2024-10-03 13:54:06','1'),(208,19,'MN-2',1,'2024-10-01 11:55:02','1','2024-10-02 07:32:10','1'),(228,31,'MN-1',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(229,31,'MN-2',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(230,31,'MN-2A',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(231,31,'MN-2B',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(232,31,'MN-2C',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(233,31,'MN-2D',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(234,31,'MN-3',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(235,31,'MN-3A',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(236,31,'MN-3B',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(237,31,'MN-4',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(238,31,'MN-4A',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(239,31,'MN-4B',1,'2024-10-02 07:22:29','1','2024-10-02 07:26:13','1'),(241,19,'MN-2A',1,'2024-10-02 07:32:10','1',NULL,NULL),(242,35,'MN-3',1,'2024-10-03 13:54:16','1','2024-10-03 13:54:30','1'),(243,35,'MN-3A',1,'2024-10-03 13:54:16','1','2024-10-03 13:54:30','1'),(244,35,'MN-3B',1,'2024-10-03 13:54:16','1','2024-10-03 13:54:30','1');
/*!40000 ALTER TABLE `tbl_sys_roleaccessmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_trn_detail`
--

DROP TABLE IF EXISTS `tbl_trn_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_trn_detail` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name_product` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_trn_detail`
--

LOCK TABLES `tbl_trn_detail` WRITE;
/*!40000 ALTER TABLE `tbl_trn_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trn_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_trn_sales`
--

DROP TABLE IF EXISTS `tbl_trn_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_trn_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaction` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `provience` varchar(100) DEFAULT NULL,
  `postal_code` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_trn_sales`
--

LOCK TABLES `tbl_trn_sales` WRITE;
/*!40000 ALTER TABLE `tbl_trn_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trn_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_listmenuroles`
--

DROP TABLE IF EXISTS `vw_listmenuroles`;
/*!50001 DROP VIEW IF EXISTS `vw_listmenuroles`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_listmenuroles` (
  `role_id` tinyint NOT NULL,
  `Menu_id` tinyint NOT NULL,
  `ParentMenu` tinyint NOT NULL,
  `MenuName` tinyint NOT NULL,
  `MenuLevel` tinyint NOT NULL,
  `MenuIcon` tinyint NOT NULL,
  `LevelNumber` tinyint NOT NULL,
  `enable_menu` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_menu`
--

DROP TABLE IF EXISTS `vw_menu`;
/*!50001 DROP VIEW IF EXISTS `vw_menu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_menu` (
  `user_id` tinyint NOT NULL,
  `enable_menu` tinyint NOT NULL,
  `menu_id` tinyint NOT NULL,
  `role_id` tinyint NOT NULL,
  `MenuName` tinyint NOT NULL,
  `MenuLevel` tinyint NOT NULL,
  `MenuIcon` tinyint NOT NULL,
  `LevelNumber` tinyint NOT NULL,
  `ParentMenu` tinyint NOT NULL,
  `MenuUrl` tinyint NOT NULL,
  `add` tinyint NOT NULL,
  `edit` tinyint NOT NULL,
  `delete` tinyint NOT NULL,
  `view` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_roles`
--

DROP TABLE IF EXISTS `vw_roles`;
/*!50001 DROP VIEW IF EXISTS `vw_roles`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_roles` (
  `id` tinyint NOT NULL,
  `roleName` tinyint NOT NULL,
  `code_role` tinyint NOT NULL,
  `status_role` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `created_by` tinyint NOT NULL,
  `updated_by` tinyint NOT NULL,
  `updated_at` tinyint NOT NULL,
  `Accessed` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'db_flowershop'
--

--
-- Final view structure for view `vw_listmenuroles`
--

/*!50001 DROP TABLE IF EXISTS `vw_listmenuroles`*/;
/*!50001 DROP VIEW IF EXISTS `vw_listmenuroles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_listmenuroles` AS select `x`.`role_id` AS `role_id`,`a`.`Menu_id` AS `Menu_id`,`a`.`ParentMenu` AS `ParentMenu`,`a`.`MenuName` AS `MenuName`,`a`.`MenuLevel` AS `MenuLevel`,`a`.`MenuIcon` AS `MenuIcon`,`a`.`LevelNumber` AS `LevelNumber`,`x`.`enable_menu` AS `enable_menu` from (`bit.supplierportal`.`tbl_sys_menu` `a` left join (select `tsr`.`enable_menu` AS `enable_menu`,`tsr`.`menu_id` AS `menu_id`,`tsr`.`role_id` AS `role_id` from `bit.supplierportal`.`tbl_sys_roleaccessmenu` `tsr` group by `tsr`.`menu_id`,`tsr`.`enable_menu`,`tsr`.`role_id`) `x` on(`x`.`menu_id` = `a`.`Menu_id`)) where `a`.`StatusMenu` = 1 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_menu`
--

/*!50001 DROP TABLE IF EXISTS `vw_menu`*/;
/*!50001 DROP VIEW IF EXISTS `vw_menu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_menu` AS select `a`.`user_id` AS `user_id`,`b`.`enable_menu` AS `enable_menu`,`b`.`menu_id` AS `menu_id`,`b`.`role_id` AS `role_id`,`c`.`MenuName` AS `MenuName`,`c`.`MenuLevel` AS `MenuLevel`,`c`.`MenuIcon` AS `MenuIcon`,`c`.`LevelNumber` AS `LevelNumber`,`c`.`ParentMenu` AS `ParentMenu`,`c`.`MenuUrl` AS `MenuUrl`,`a`.`add` AS `add`,`a`.`edit` AS `edit`,`a`.`delete` AS `delete`,`a`.`showAll` AS `view` from ((`tbl_sys_menuusers` `a` join `tbl_sys_roleaccessmenu` `b` on(`b`.`id` = `a`.`accessmenu_id`)) join `tbl_sys_menu` `c` on(`c`.`Menu_id` = `b`.`menu_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_roles`
--

/*!50001 DROP TABLE IF EXISTS `vw_roles`*/;
/*!50001 DROP VIEW IF EXISTS `vw_roles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_roles` AS select `a`.`id` AS `id`,`a`.`roleName` AS `roleName`,`a`.`code_role` AS `code_role`,`a`.`status_role` AS `status_role`,`a`.`created_at` AS `created_at`,`a`.`created_by` AS `created_by`,`a`.`updated_by` AS `updated_by`,`a`.`updated_at` AS `updated_at`,group_concat(concat('[',`x`.`MenuName`,']') order by substr(`x`.`Menu_id`,4,3) ASC separator ' ') AS `Accessed` from (`bit.supplierportal`.`tbl_mst_role` `a` left join (select `tsm`.`MenuName` AS `MenuName`,`tsr`.`role_id` AS `role_id`,`tsm`.`Menu_id` AS `Menu_id` from (`bit.supplierportal`.`tbl_sys_roleaccessmenu` `tsr` left join `bit.supplierportal`.`tbl_sys_menu` `tsm` on(`tsm`.`Menu_id` = `tsr`.`menu_id`)) where `tsr`.`enable_menu` = 1 group by `tsm`.`MenuName`,`tsr`.`role_id`,`tsm`.`Menu_id` order by cast(substr(`tsm`.`Menu_id`,4,3) as signed)) `x` on(`a`.`id` = `x`.`role_id`)) group by `a`.`id`,`a`.`roleName`,`a`.`code_role`,`a`.`status_role`,`a`.`created_at`,`a`.`created_by`,`a`.`updated_by`,`a`.`updated_at` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-29  8:59:51
