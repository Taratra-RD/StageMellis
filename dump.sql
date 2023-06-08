-- MariaDB dump 10.19  Distrib 10.11.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: inventaireMellis
-- ------------------------------------------------------
-- Server version	10.11.2-MariaDB

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
-- Table structure for table `alimentation`
--

DROP TABLE IF EXISTS `alimentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alimentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `boitier_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `puissance` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8E65DFA04827B9B2` (`marque_id`),
  UNIQUE KEY `UNIQ_8E65DFA044DE6F7C` (`boitier_id`),
  UNIQUE KEY `UNIQ_8E65DFA0D5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_8E65DFA0B897366B` (`date_id`),
  CONSTRAINT `FK_8E65DFA044DE6F7C` FOREIGN KEY (`boitier_id`) REFERENCES `boitier` (`id`),
  CONSTRAINT `FK_8E65DFA04827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `FK_8E65DFA0B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_8E65DFA0D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentation`
--

LOCK TABLES `alimentation` WRITE;
/*!40000 ALTER TABLE `alimentation` DISABLE KEYS */;
INSERT INTO `alimentation` VALUES
(1,NULL,NULL,NULL,NULL,'300','124557552'),
(2,NULL,NULL,NULL,NULL,'250','124557552'),
(3,11,1,27,NULL,'230','N/A'),
(4,19,2,28,NULL,'N/A','N/A'),
(5,27,3,29,NULL,'N/A','N/A'),
(6,35,4,30,NULL,'300','N/A'),
(7,43,5,31,NULL,'500','N/A'),
(8,51,6,32,NULL,'N/A','N/A'),
(9,59,7,33,NULL,'400','N/A'),
(10,67,8,34,NULL,'350','55241006514'),
(11,75,9,35,NULL,'350','SY2171200169'),
(12,83,10,36,NULL,'250','N/A'),
(13,91,11,37,NULL,'N/A','N/A'),
(14,99,12,38,NULL,'200','N/A'),
(15,107,13,39,NULL,'350','GA779-1988'),
(16,115,14,40,NULL,'N/A','N/A'),
(17,123,15,41,NULL,'350','N/A'),
(18,131,16,42,NULL,'ATX STANDARD','N/A'),
(19,139,17,43,NULL,'ATX STANDARD','N/A'),
(20,147,18,44,NULL,'500','N/A'),
(21,155,19,45,NULL,'400','N/A'),
(22,163,20,46,NULL,'500','NA'),
(23,171,21,47,NULL,'500','NA'),
(24,179,22,48,NULL,'ATX-350','NA'),
(25,187,23,49,NULL,'500','NA'),
(26,195,24,50,NULL,'N/A','N/A'),
(27,203,25,51,NULL,'500','HMIPS1500'),
(28,211,26,52,NULL,'250','N/A');
/*!40000 ALTER TABLE `alimentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boitier`
--

DROP TABLE IF EXISTS `boitier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boitier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E91F6297FB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_E91F6297FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boitier`
--

LOCK TABLES `boitier` WRITE;
/*!40000 ALTER TABLE `boitier` DISABLE KEYS */;
INSERT INTO `boitier` VALUES
(1,41,'B4'),
(2,42,'B6'),
(3,43,'B5'),
(4,44,'B1'),
(5,45,'B10'),
(6,46,'B11'),
(7,47,'B12'),
(8,48,'B13'),
(9,49,'B14'),
(10,50,'B15'),
(11,51,'B18'),
(12,52,'B19'),
(13,53,'B2'),
(14,54,'B20'),
(15,55,'B21'),
(16,56,'B22'),
(17,57,'B23'),
(18,58,'B24'),
(19,59,'B25'),
(20,60,'B26'),
(21,61,'B27'),
(22,62,'B28'),
(23,63,'B29'),
(24,64,'B3'),
(25,65,'B30'),
(26,66,'B31');
/*!40000 ALTER TABLE `boitier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cable`
--

DROP TABLE IF EXISTS `cable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `longueur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_24E9C4D4D5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_24E9C4D4B897366B` (`date_id`),
  CONSTRAINT `FK_24E9C4D4B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_24E9C4D4D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cable`
--

LOCK TABLES `cable` WRITE;
/*!40000 ALTER TABLE `cable` DISABLE KEYS */;
/*!40000 ALTER TABLE `cable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carte_mere`
--

DROP TABLE IF EXISTS `carte_mere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carte_mere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `boitier_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `type_mb` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_21EB4E724827B9B2` (`marque_id`),
  UNIQUE KEY `UNIQ_21EB4E7244DE6F7C` (`boitier_id`),
  UNIQUE KEY `UNIQ_21EB4E72D5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_21EB4E72B897366B` (`date_id`),
  CONSTRAINT `FK_21EB4E7244DE6F7C` FOREIGN KEY (`boitier_id`) REFERENCES `boitier` (`id`),
  CONSTRAINT `FK_21EB4E724827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `FK_21EB4E72B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_21EB4E72D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carte_mere`
--

LOCK TABLES `carte_mere` WRITE;
/*!40000 ALTER TABLE `carte_mere` DISABLE KEYS */;
INSERT INTO `carte_mere` VALUES
(1,10,1,27,NULL,'DDR3','EA=1078D22F9BD'),
(2,18,2,28,NULL,'DDR3','ET1105G41702379'),
(3,26,3,29,NULL,'DDR2','N/A'),
(4,34,4,30,NULL,'DDR4','4/C/GCA221'),
(5,42,5,31,NULL,'DDR4','1/E/HC1007804562'),
(6,50,6,32,NULL,'DDR3','ET1105G411702365'),
(7,58,7,33,NULL,'DDR3','HWD5800142352'),
(8,66,8,34,NULL,'DDR3','2/E/CGC20002718'),
(9,74,9,35,NULL,'DDR4','MB0TL0-A03'),
(10,82,10,36,NULL,'DDR3','UH8121'),
(11,90,11,37,NULL,'1155','ET1105G41702974'),
(12,98,12,38,NULL,'DDR3','3/D/15B05700397'),
(13,106,13,39,NULL,'DDR3','ET105G411701132'),
(14,114,14,40,NULL,'DDR3','ET1105G41702364'),
(15,122,15,41,NULL,'DDR3','ET1105G41701317'),
(16,130,16,42,NULL,'DDR3','ET1105G41702362'),
(17,138,17,43,NULL,'DDR3','ET1105G41702373'),
(18,146,18,44,NULL,'DDR3','D050998D67A1'),
(19,154,19,45,NULL,'DDR3','D050998D6795'),
(20,162,20,46,NULL,'DDR3','F44D30000B9D'),
(21,170,21,47,NULL,'DDR3','D0609991724C'),
(22,178,22,48,NULL,'DDR3','EV814156'),
(23,186,23,49,NULL,'DDR3','D050998D6C41'),
(24,194,24,50,NULL,'1155','ET110SG41702371'),
(25,202,25,51,NULL,'DDR3','201DG4367'),
(26,210,26,52,NULL,'DDR3','D060994AE19A');
/*!40000 ALTER TABLE `carte_mere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clavier`
--

DROP TABLE IF EXISTS `clavier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clavier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interface_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `sn` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_538598C7AB0BE982` (`interface_id`),
  UNIQUE KEY `UNIQ_538598C7D5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_538598C7B897366B` (`date_id`),
  KEY `IDX_538598C7FB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_538598C7AB0BE982` FOREIGN KEY (`interface_id`) REFERENCES `interface_port` (`id`),
  CONSTRAINT `FK_538598C7B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_538598C7D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`),
  CONSTRAINT `FK_538598C7FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clavier`
--

LOCK TABLES `clavier` WRITE;
/*!40000 ALTER TABLE `clavier` DISABLE KEYS */;
INSERT INTO `clavier` VALUES
(1,1,41,27,NULL,' '),
(2,2,42,28,NULL,' '),
(3,3,43,29,NULL,' '),
(4,4,44,30,NULL,' '),
(5,5,45,31,NULL,' '),
(6,6,46,32,NULL,' '),
(7,7,47,33,NULL,' '),
(8,8,48,34,NULL,' '),
(9,9,49,35,NULL,' '),
(10,10,50,36,NULL,' '),
(11,11,51,37,NULL,' '),
(12,12,52,38,NULL,' '),
(13,13,53,39,NULL,' '),
(14,14,54,40,NULL,' '),
(15,15,55,41,NULL,' '),
(16,16,56,42,NULL,' '),
(17,17,57,43,NULL,' '),
(18,18,58,44,NULL,' '),
(19,19,59,45,NULL,' '),
(20,20,60,46,NULL,' '),
(21,21,61,47,NULL,' '),
(22,22,62,48,NULL,' '),
(23,23,63,49,NULL,' '),
(24,24,64,50,NULL,' '),
(25,25,65,51,NULL,' '),
(26,26,66,52,NULL,' ');
/*!40000 ALTER TABLE `clavier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cpu`
--

DROP TABLE IF EXISTS `cpu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cpu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `boitier_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BA80502E4827B9B2` (`marque_id`),
  UNIQUE KEY `UNIQ_BA80502ED5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_BA80502EB897366B` (`date_id`),
  KEY `IDX_BA80502E44DE6F7C` (`boitier_id`),
  CONSTRAINT `FK_BA80502E44DE6F7C` FOREIGN KEY (`boitier_id`) REFERENCES `boitier` (`id`),
  CONSTRAINT `FK_BA80502E4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `FK_BA80502EB897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_BA80502ED5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cpu`
--

LOCK TABLES `cpu` WRITE;
/*!40000 ALTER TABLE `cpu` DISABLE KEYS */;
INSERT INTO `cpu` VALUES
(1,9,1,27,NULL),
(2,17,2,28,NULL),
(3,25,3,29,NULL),
(4,33,4,30,NULL),
(5,41,5,31,NULL),
(6,49,6,32,NULL),
(7,57,7,33,NULL),
(8,65,8,34,NULL),
(9,73,9,35,NULL),
(10,81,10,36,NULL),
(11,89,11,37,NULL),
(12,97,12,38,NULL),
(13,105,13,39,NULL),
(14,113,14,40,NULL),
(15,121,15,41,NULL),
(16,129,16,42,NULL),
(17,137,17,43,NULL),
(18,145,18,44,NULL),
(19,153,19,45,NULL),
(20,161,20,46,NULL),
(21,169,21,47,NULL),
(22,177,22,48,NULL),
(23,185,23,49,NULL),
(24,193,24,50,NULL),
(25,201,25,51,NULL),
(26,209,26,52,NULL);
/*!40000 ALTER TABLE `cpu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `date`
--

DROP TABLE IF EXISTS `date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date`
--

LOCK TABLES `date` WRITE;
/*!40000 ALTER TABLE `date` DISABLE KEYS */;
/*!40000 ALTER TABLE `date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `date_mis_ajour`
--

DROP TABLE IF EXISTS `date_mis_ajour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `date_mis_ajour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_id` int(11) DEFAULT NULL,
  `type_date` varchar(255) NOT NULL,
  `update_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C4AED2C9B897366B` (`date_id`),
  CONSTRAINT `FK_C4AED2C9B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date_mis_ajour`
--

LOCK TABLES `date_mis_ajour` WRITE;
/*!40000 ALTER TABLE `date_mis_ajour` DISABLE KEYS */;
/*!40000 ALTER TABLE `date_mis_ajour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES
('DoctrineMigrations\\Version20230516113157','2023-05-16 11:39:33',29406);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecran`
--

DROP TABLE IF EXISTS `ecran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3FFAFD4AFB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_3FFAFD4AFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecran`
--

LOCK TABLES `ecran` WRITE;
/*!40000 ALTER TABLE `ecran` DISABLE KEYS */;
INSERT INTO `ecran` VALUES
(1,NULL,'0','1','53'),
(2,NULL,'1','2','56'),
(3,NULL,'2','3','59'),
(4,NULL,'3','4','62'),
(5,NULL,'4','5','65'),
(6,NULL,'5','6','68'),
(7,NULL,'6','7','71'),
(8,NULL,'7','8','74'),
(9,NULL,'8','9','77'),
(10,NULL,'9','10','80'),
(11,NULL,'0','1','53'),
(12,NULL,'1','2','56'),
(13,NULL,'2','3','59'),
(14,NULL,'3','4','62'),
(15,NULL,'4','5','65'),
(16,NULL,'5','6','68'),
(17,NULL,'6','7','71'),
(18,NULL,'7','8','74'),
(19,NULL,'8','9','77'),
(20,NULL,'9','10','80'),
(21,NULL,'0','1','53'),
(22,NULL,'1','2','56'),
(23,NULL,'2','3','59'),
(24,NULL,'3','4','62'),
(25,NULL,'4','5','65'),
(26,NULL,'5','6','68'),
(27,NULL,'6','7','71'),
(28,NULL,'7','8','74'),
(29,NULL,'8','9','77'),
(30,NULL,'9','10','80'),
(57,41,'LV1911','19','6CM407303B'),
(58,42,'HDLV1911','19','6CM4080F94'),
(59,43,'WL710AV','24','JPA147MDC4'),
(60,44,'E1910HC','19','CN-04417N-64180-11J1CJL'),
(61,45,'HPV194','19','3CQ65207D0'),
(62,46,'LV1911','19','GCM306191J'),
(63,47,'APLV1911','19','6CM4080DZF'),
(64,48,'V196HQL','19','MMLXNEE00730910B304201'),
(65,49,'V206HQLB','20','74201062842'),
(66,50,'LV1911','19','6CM4080DZB'),
(67,51,'LV1911','19','6CM407302D'),
(68,52,'EB192Q','19','MMT65G0019030056'),
(69,53,'E1916H','19','CN-0SGKX9-72872-6CD-ANJB-A00'),
(70,54,'193V5lSB2/10','19','UKOA1741001633'),
(71,55,'V193HQL','19','MMLKE55009302084888506'),
(72,56,'V196HQL','19','MMLXNEE00739112A44201'),
(73,57,'LV1911','19','6CM30610H3'),
(74,58,'K202HQL','20','4713147667901'),
(75,59,'K202QHL','20','4713147667901'),
(76,60,'VS16216','16','U6M160200198'),
(77,61,'K202HQL','20','53803997485'),
(78,62,'VA1903a','19','UEM160201498'),
(79,63,'V196HQL','19','MMLY06L007312114546501'),
(80,64,'V193HQV','19','ETLKX0W020238074284302'),
(81,65,'K202HQL','20','53907752042'),
(82,66,'W1972A','19','6CM42702H3');
/*!40000 ALTER TABLE `ecran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etat`
--

DROP TABLE IF EXISTS `etat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ecran_id` int(11) DEFAULT NULL,
  `designation_etat` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_55CAF762E73649EB` (`ecran_id`),
  CONSTRAINT `FK_55CAF762E73649EB` FOREIGN KEY (`ecran_id`) REFERENCES `ecran` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etat`
--

LOCK TABLES `etat` WRITE;
/*!40000 ALTER TABLE `etat` DISABLE KEYS */;
INSERT INTO `etat` VALUES
(27,NULL,'Bon','Parfait'),
(28,NULL,'Bon','Parfait'),
(29,NULL,'Bon','Parfait'),
(30,NULL,'Bon','Parfait'),
(31,NULL,'Bon','Parfait'),
(32,NULL,'Bon','Parfait'),
(33,NULL,'Bon','Parfait'),
(34,NULL,'Bon','Parfait'),
(35,NULL,'Bon','Parfait'),
(36,NULL,'Bon','Parfait'),
(37,NULL,'Bon','Parfait'),
(38,NULL,'Bon','Parfait'),
(39,NULL,'Bon','Parfait'),
(40,NULL,'Bon','Parfait'),
(41,NULL,'Bon','Parfait'),
(42,NULL,'Bon','Parfait'),
(43,NULL,'Bon','Parfait'),
(44,NULL,'Bon','Parfait'),
(45,NULL,'Bon','Parfait'),
(46,NULL,'Bon','Parfait'),
(47,NULL,'Bon','Parfait'),
(48,NULL,'Bon','Parfait'),
(49,NULL,'Bon','Parfait'),
(50,NULL,'Bon','Parfait'),
(51,NULL,'Bon','Parfait'),
(52,NULL,'Bon','Parfait');
/*!40000 ALTER TABLE `etat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hdd`
--

DROP TABLE IF EXISTS `hdd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `boitier_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `capacite` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F2CB48684827B9B2` (`marque_id`),
  UNIQUE KEY `UNIQ_F2CB4868D5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_F2CB4868B897366B` (`date_id`),
  KEY `IDX_F2CB486844DE6F7C` (`boitier_id`),
  CONSTRAINT `FK_F2CB486844DE6F7C` FOREIGN KEY (`boitier_id`) REFERENCES `boitier` (`id`),
  CONSTRAINT `FK_F2CB48684827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `FK_F2CB4868B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_F2CB4868D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hdd`
--

LOCK TABLES `hdd` WRITE;
/*!40000 ALTER TABLE `hdd` DISABLE KEYS */;
INSERT INTO `hdd` VALUES
(1,8,1,27,NULL,'500','Z2AC8WQD'),
(2,16,2,28,NULL,'500','455898NASX13'),
(3,24,3,29,NULL,'250','N/A'),
(4,32,4,30,NULL,'500','FM3476476AYP'),
(5,40,5,31,NULL,'500','83D1567ASX13'),
(6,48,6,32,NULL,'500','84B401PBSX13'),
(7,56,7,33,NULL,'500','16033N2HSX13'),
(8,64,8,34,NULL,'500','5N5VVC6C3W'),
(9,72,9,35,NULL,'1','ST1000AM010'),
(10,80,10,36,NULL,'250','WCBAU7019733'),
(11,88,11,37,NULL,'500','84B3R65B5X13'),
(12,96,12,38,NULL,'1','ZN122V02'),
(13,104,13,39,NULL,'500','6455TRTB5XB'),
(14,112,14,40,NULL,'500','84B3TSWBS'),
(15,120,15,41,NULL,'250','6VY99W9Y'),
(16,128,16,42,NULL,'250','SVY7N116'),
(17,136,17,43,NULL,'500','64SSTRUBS'),
(18,144,18,44,NULL,'500','Y5RA812A5'),
(19,152,19,45,NULL,'500','Y5RA5Y2GSX13'),
(20,160,20,46,NULL,'500','46UDUYGG5X13'),
(21,168,21,47,NULL,'500','Y5RAY8BAS'),
(22,176,22,48,NULL,'500','Y750P5RA5X13'),
(23,184,23,49,NULL,'500','FN377878OAYP'),
(24,192,24,50,NULL,'500','4557XB8ASX13'),
(25,200,25,51,NULL,'500','RF26WNDG'),
(26,208,26,52,NULL,'N/A','N/A');
/*!40000 ALTER TABLE `hdd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interface_port`
--

DROP TABLE IF EXISTS `interface_port`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interface_port` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `souris_id` int(11) DEFAULT NULL,
  `type_interface` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FA9F4044AAFE0C83` (`souris_id`),
  CONSTRAINT `FK_FA9F4044AAFE0C83` FOREIGN KEY (`souris_id`) REFERENCES `souris` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interface_port`
--

LOCK TABLES `interface_port` WRITE;
/*!40000 ALTER TABLE `interface_port` DISABLE KEYS */;
INSERT INTO `interface_port` VALUES
(1,1,'USB'),
(2,2,'USB'),
(3,3,'USB'),
(4,4,'USB'),
(5,5,'USB'),
(6,6,'USB'),
(7,7,'USB'),
(8,8,'USB'),
(9,9,'USB'),
(10,10,'USB'),
(11,11,'USB'),
(12,12,'USB'),
(13,13,'USB'),
(14,14,'USB'),
(15,15,'USB'),
(16,16,'USB'),
(17,17,'USB'),
(18,18,'USB'),
(19,19,'USB'),
(20,20,'USB'),
(21,21,'USB'),
(22,22,'USB'),
(23,23,'USB'),
(24,24,'USB'),
(25,25,'USB'),
(26,26,'USB');
/*!40000 ALTER TABLE `interface_port` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecteur`
--

DROP TABLE IF EXISTS `lecteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lecteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `boitier_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `type_lecteur` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_11D3C9384827B9B2` (`marque_id`),
  UNIQUE KEY `UNIQ_11D3C93844DE6F7C` (`boitier_id`),
  UNIQUE KEY `UNIQ_11D3C938D5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_11D3C938B897366B` (`date_id`),
  CONSTRAINT `FK_11D3C93844DE6F7C` FOREIGN KEY (`boitier_id`) REFERENCES `boitier` (`id`),
  CONSTRAINT `FK_11D3C9384827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `FK_11D3C938B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_11D3C938D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecteur`
--

LOCK TABLES `lecteur` WRITE;
/*!40000 ALTER TABLE `lecteur` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clavier_id` int(11) DEFAULT NULL,
  `ecran_id` int(11) DEFAULT NULL,
  `souris_id` int(11) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5A6F91CED6EB321B` (`clavier_id`),
  UNIQUE KEY `UNIQ_5A6F91CEE73649EB` (`ecran_id`),
  UNIQUE KEY `UNIQ_5A6F91CEAAFE0C83` (`souris_id`),
  CONSTRAINT `FK_5A6F91CEAAFE0C83` FOREIGN KEY (`souris_id`) REFERENCES `souris` (`id`),
  CONSTRAINT `FK_5A6F91CED6EB321B` FOREIGN KEY (`clavier_id`) REFERENCES `clavier` (`id`),
  CONSTRAINT `FK_5A6F91CEE73649EB` FOREIGN KEY (`ecran_id`) REFERENCES `ecran` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` VALUES
(1,NULL,10,NULL,'Adata'),
(2,NULL,20,NULL,'Adata'),
(3,NULL,30,NULL,'Adata'),
(4,NULL,57,NULL,'HP'),
(5,NULL,NULL,1,'NONE'),
(6,1,NULL,NULL,'ARROW'),
(7,NULL,NULL,NULL,'SUPER TALENT'),
(8,NULL,NULL,NULL,'Seagate'),
(9,NULL,NULL,NULL,'INTEL'),
(10,NULL,NULL,NULL,'ECS'),
(11,NULL,NULL,NULL,'MultiPC'),
(12,NULL,58,NULL,'HP'),
(13,NULL,NULL,2,'OTHER'),
(14,2,NULL,NULL,'MEETION'),
(15,NULL,NULL,NULL,'Adata'),
(16,NULL,NULL,NULL,'Toshiba'),
(17,NULL,NULL,NULL,'INTEL'),
(18,NULL,NULL,NULL,'ECS'),
(19,NULL,NULL,NULL,'N/A'),
(20,NULL,59,NULL,'HP'),
(21,NULL,NULL,3,'NONE'),
(22,3,NULL,NULL,'NONE'),
(23,NULL,NULL,NULL,'NONE'),
(24,NULL,NULL,NULL,'Seagate'),
(25,NULL,NULL,NULL,'INTEL'),
(26,NULL,NULL,NULL,'OTHER'),
(27,NULL,NULL,NULL,'N/A'),
(28,NULL,60,NULL,'Dell'),
(29,NULL,NULL,4,'HP'),
(30,4,NULL,NULL,'HP'),
(31,NULL,NULL,NULL,'Adata'),
(32,NULL,NULL,NULL,'MDT'),
(33,NULL,NULL,NULL,'INTEL'),
(34,NULL,NULL,NULL,'Gigabyte'),
(35,NULL,NULL,NULL,'MultiPC'),
(36,NULL,61,NULL,'HP'),
(37,NULL,NULL,5,'HP'),
(38,5,NULL,NULL,'OTHER'),
(39,NULL,NULL,NULL,'Adata'),
(40,NULL,NULL,NULL,'Toshiba'),
(41,NULL,NULL,NULL,'INTEL'),
(42,NULL,NULL,NULL,'Gigabyte'),
(43,NULL,NULL,NULL,'LG'),
(44,NULL,62,NULL,'HP'),
(45,NULL,NULL,6,'HP'),
(46,6,NULL,NULL,'HP'),
(47,NULL,NULL,NULL,'Adata'),
(48,NULL,NULL,NULL,'Toshiba'),
(49,NULL,NULL,NULL,'INTEL'),
(50,NULL,NULL,NULL,'ECS'),
(51,NULL,NULL,NULL,'N/A'),
(52,NULL,63,NULL,'NONE'),
(53,NULL,NULL,7,'OTHER'),
(54,7,NULL,NULL,'NONE'),
(55,NULL,NULL,NULL,'Adata'),
(56,NULL,NULL,NULL,'Toshiba'),
(57,NULL,NULL,NULL,'INTEL'),
(58,NULL,NULL,NULL,'BIOSTAR'),
(59,NULL,NULL,NULL,'VIWSONIC'),
(60,NULL,64,NULL,'Acer'),
(61,NULL,NULL,8,'NONE'),
(62,8,NULL,NULL,'HP'),
(63,NULL,NULL,NULL,'OTHER'),
(64,NULL,NULL,NULL,'Seagate'),
(65,NULL,NULL,NULL,'INTEL'),
(66,NULL,NULL,NULL,'Gigabyte'),
(67,NULL,NULL,NULL,'FSP'),
(68,NULL,65,NULL,'Acer'),
(69,NULL,NULL,9,'MEETION'),
(70,9,NULL,NULL,'NONE'),
(71,NULL,NULL,NULL,'Adata'),
(72,NULL,NULL,NULL,'Seagate'),
(73,NULL,NULL,NULL,'INTEL'),
(74,NULL,NULL,NULL,'Asus'),
(75,NULL,NULL,NULL,'VIEWSONIC'),
(76,NULL,66,NULL,'HP'),
(77,NULL,NULL,10,'HP'),
(78,10,NULL,NULL,'MEETION'),
(79,NULL,NULL,NULL,'Adata'),
(80,NULL,NULL,NULL,'WDigital'),
(81,NULL,NULL,NULL,'INTEL'),
(82,NULL,NULL,NULL,'OTHER'),
(83,NULL,NULL,NULL,'MULTI-PC'),
(84,NULL,67,NULL,'HP'),
(85,NULL,NULL,11,'Fujitsu'),
(86,11,NULL,NULL,'IMPULSE'),
(87,NULL,NULL,NULL,'Adata'),
(88,NULL,NULL,NULL,'Toshiba'),
(89,NULL,NULL,NULL,'INTEL'),
(90,NULL,NULL,NULL,'ECS'),
(91,NULL,NULL,NULL,'N/A'),
(92,NULL,68,NULL,'Acer'),
(93,NULL,NULL,12,'OTHER'),
(94,12,NULL,NULL,'ARROW'),
(95,NULL,NULL,NULL,'OTHER'),
(96,NULL,NULL,NULL,'Seagate'),
(97,NULL,NULL,NULL,'INTEL'),
(98,NULL,NULL,NULL,'Gigabyte'),
(99,NULL,NULL,NULL,'ATX'),
(100,NULL,69,NULL,'Dell'),
(101,NULL,NULL,13,'NONE'),
(102,13,NULL,NULL,'NONE'),
(103,NULL,NULL,NULL,'Adata'),
(104,NULL,NULL,NULL,'Toshiba'),
(105,NULL,NULL,NULL,'INTEL'),
(106,NULL,NULL,NULL,'ECS'),
(107,NULL,NULL,NULL,'G-GALANTIC'),
(108,NULL,70,NULL,'OTHER'),
(109,NULL,NULL,14,'Asus'),
(110,14,NULL,NULL,'HP'),
(111,NULL,NULL,NULL,'OTHER'),
(112,NULL,NULL,NULL,'Toshiba'),
(113,NULL,NULL,NULL,'INTEL'),
(114,NULL,NULL,NULL,'OTHER'),
(115,NULL,NULL,NULL,'standard'),
(116,NULL,71,NULL,'Acer'),
(117,NULL,NULL,15,'Viewsonic'),
(118,15,NULL,NULL,'Acer'),
(119,NULL,NULL,NULL,'Adata'),
(120,NULL,NULL,NULL,'Seagate'),
(121,NULL,NULL,NULL,'INTEL'),
(122,NULL,NULL,NULL,'OTHER'),
(123,NULL,NULL,NULL,'support pentium 4'),
(124,NULL,72,NULL,'Acer'),
(125,NULL,NULL,16,'Dell'),
(126,16,NULL,NULL,'NONE'),
(127,NULL,NULL,NULL,'Adata'),
(128,NULL,NULL,NULL,'Seagate'),
(129,NULL,NULL,NULL,'INTEL'),
(130,NULL,NULL,NULL,'OTHER'),
(131,NULL,NULL,NULL,'N/A'),
(132,NULL,73,NULL,'HP'),
(133,NULL,NULL,17,'OTHER'),
(134,17,NULL,NULL,'OTHER'),
(135,NULL,NULL,NULL,'Twinmos'),
(136,NULL,NULL,NULL,'Toshiba'),
(137,NULL,NULL,NULL,'INTEL'),
(138,NULL,NULL,NULL,'ECS'),
(139,NULL,NULL,NULL,'N/A'),
(140,NULL,74,NULL,'Acer'),
(141,NULL,NULL,18,'Lenovo'),
(142,18,NULL,NULL,'NONE'),
(143,NULL,NULL,NULL,'Adata'),
(144,NULL,NULL,NULL,'Toshiba'),
(145,NULL,NULL,NULL,'INTEL'),
(146,NULL,NULL,NULL,'OTHER'),
(147,NULL,NULL,NULL,'HEADWAY'),
(148,NULL,75,NULL,'Acer'),
(149,NULL,NULL,19,'Lenovo'),
(150,19,NULL,NULL,'NONE'),
(151,NULL,NULL,NULL,'Adata'),
(152,NULL,NULL,NULL,'Toshiba'),
(153,NULL,NULL,NULL,'INTEL'),
(154,NULL,NULL,NULL,'OTHER'),
(155,NULL,NULL,NULL,'HUNTKEY'),
(156,NULL,76,NULL,'Viewsonic'),
(157,NULL,NULL,20,'Lenovo'),
(158,20,NULL,NULL,'IMPULSE'),
(159,NULL,NULL,NULL,'OTHER'),
(160,NULL,NULL,NULL,'Toshiba'),
(161,NULL,NULL,NULL,'INTEL'),
(162,NULL,NULL,NULL,'ECS'),
(163,NULL,NULL,NULL,'SUPER'),
(164,NULL,77,NULL,'Acer'),
(165,NULL,NULL,21,'Asus'),
(166,21,NULL,NULL,'NONE'),
(167,NULL,NULL,NULL,'Adata'),
(168,NULL,NULL,NULL,'Toshiba'),
(169,NULL,NULL,NULL,'INTEL'),
(170,NULL,NULL,NULL,'OTHER'),
(171,NULL,NULL,NULL,'HEADWAY'),
(172,NULL,78,NULL,'Viewsonic'),
(173,NULL,NULL,22,'OTHER'),
(174,22,NULL,NULL,'NONE'),
(175,NULL,NULL,NULL,'OTHER'),
(176,NULL,NULL,NULL,'Toshiba'),
(177,NULL,NULL,NULL,'INTEL'),
(178,NULL,NULL,NULL,'ECS'),
(179,NULL,NULL,NULL,'G-ALANTIC'),
(180,NULL,79,NULL,'Acer'),
(181,NULL,NULL,23,'NONE'),
(182,23,NULL,NULL,'HP'),
(183,NULL,NULL,NULL,'Adata'),
(184,NULL,NULL,NULL,'MDT'),
(185,NULL,NULL,NULL,'INTEL'),
(186,NULL,NULL,NULL,'OTHER'),
(187,NULL,NULL,NULL,'HEADWAY'),
(188,NULL,80,NULL,'Acer'),
(189,NULL,NULL,24,'NONE'),
(190,24,NULL,NULL,'HP'),
(191,NULL,NULL,NULL,'Adata'),
(192,NULL,NULL,NULL,'Toshiba'),
(193,NULL,NULL,NULL,'INTEL'),
(194,NULL,NULL,NULL,'OTHER'),
(195,NULL,NULL,NULL,'Standard'),
(196,NULL,81,NULL,'Acer'),
(197,NULL,NULL,25,'Lenovo'),
(198,25,NULL,NULL,'NONE'),
(199,NULL,NULL,NULL,'OTHER'),
(200,NULL,NULL,NULL,'OTHER'),
(201,NULL,NULL,NULL,'INTEL'),
(202,NULL,NULL,NULL,'Gigabyte'),
(203,NULL,NULL,NULL,'HEADWAY'),
(204,NULL,82,NULL,'HP'),
(205,NULL,NULL,26,'NONE'),
(206,26,NULL,NULL,'NONE'),
(207,NULL,NULL,NULL,'Adata'),
(208,NULL,NULL,NULL,'Toshiba'),
(209,NULL,NULL,NULL,'INTEL'),
(210,NULL,NULL,NULL,'OTHER'),
(211,NULL,NULL,NULL,'VIEWSONIC');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `onduleur`
--

DROP TABLE IF EXISTS `onduleur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `onduleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `autonomie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C698A4E6D5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_C698A4E6B897366B` (`date_id`),
  KEY `IDX_C698A4E6FB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_C698A4E6B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_C698A4E6D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`),
  CONSTRAINT `FK_C698A4E6FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `onduleur`
--

LOCK TABLES `onduleur` WRITE;
/*!40000 ALTER TABLE `onduleur` DISABLE KEYS */;
/*!40000 ALTER TABLE `onduleur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `port`
--

DROP TABLE IF EXISTS `port`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `port` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ecran_id` int(11) DEFAULT NULL,
  `designation_port` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_43915DCCE73649EB` (`ecran_id`),
  CONSTRAINT `FK_43915DCCE73649EB` FOREIGN KEY (`ecran_id`) REFERENCES `ecran` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `port`
--

LOCK TABLES `port` WRITE;
/*!40000 ALTER TABLE `port` DISABLE KEYS */;
INSERT INTO `port` VALUES
(1,10,'vga'),
(2,20,'vga'),
(3,30,'vga'),
(30,57,'VGA'),
(31,58,'VGA'),
(32,59,'VGA;HDMI'),
(33,60,'VGA'),
(34,61,'VGA'),
(35,62,'VGA'),
(36,63,'VGA'),
(37,64,'VGA'),
(38,65,'VGA'),
(39,66,'VGA'),
(40,67,'VGA'),
(41,68,'VGA'),
(42,69,'VGA'),
(43,70,'VGA'),
(44,71,'VGA'),
(45,72,'VGA'),
(46,73,'VGA'),
(47,74,'VGA'),
(48,75,'VGA'),
(49,76,'VGA'),
(50,77,'VGA'),
(51,78,'VGA'),
(52,79,'VGA'),
(53,80,'VGA'),
(54,81,'VGA'),
(55,82,'VGA;DVI');
/*!40000 ALTER TABLE `port` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ram`
--

DROP TABLE IF EXISTS `ram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `boitier_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `frequence` varchar(255) NOT NULL,
  `capacite` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E7D1222F4827B9B2` (`marque_id`),
  UNIQUE KEY `UNIQ_E7D1222FD5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_E7D1222FB897366B` (`date_id`),
  KEY `IDX_E7D1222F44DE6F7C` (`boitier_id`),
  CONSTRAINT `FK_E7D1222F44DE6F7C` FOREIGN KEY (`boitier_id`) REFERENCES `boitier` (`id`),
  CONSTRAINT `FK_E7D1222F4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `FK_E7D1222FB897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_E7D1222FD5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ram`
--

LOCK TABLES `ram` WRITE;
/*!40000 ALTER TABLE `ram` DISABLE KEYS */;
INSERT INTO `ram` VALUES
(1,7,1,27,NULL,'1333','2048','TWM110708001'),
(2,15,2,28,NULL,'1600','2048','1E22600173862'),
(3,23,3,29,NULL,'N/A','4096','N/A'),
(4,31,4,30,NULL,'2400','4096','AD4U2400J4G17-BP'),
(5,39,5,31,NULL,'2400','4096','2I1500177087'),
(6,47,6,32,NULL,'1600','2048','1E2600173207'),
(7,55,7,33,NULL,'1600','4096','RG1000053497'),
(8,63,8,34,NULL,'N/A','4096','B4LNE-996MX6-XW1UF'),
(9,71,9,35,NULL,'2400','4096','211500176777'),
(10,79,10,36,NULL,'10600','2048','1E2600173509'),
(11,87,11,37,NULL,'1600','2048','1E2600173431'),
(12,95,12,38,NULL,'1600','4096','19070658740'),
(13,103,13,39,NULL,'1600','2048','1E2200046185'),
(14,111,14,40,NULL,'1600','2048','PN7786-SNC000056'),
(15,119,15,41,NULL,'1600','2048','1E2600173838'),
(16,127,16,42,NULL,'1600','4096','1E2700002467'),
(17,135,17,43,NULL,'1333','2048','BBA2E311073431'),
(18,143,18,44,NULL,'1600','2048','7F3700023726'),
(19,151,19,45,NULL,'1600','2048','7F3700023811'),
(20,159,20,46,NULL,'1600','4096','99U5584-005'),
(21,167,21,47,NULL,'1600','2048','7F3700023789'),
(22,175,22,48,NULL,'1333','4096','99P5474-014-A00LF'),
(23,183,23,49,NULL,'1600','2048','7F370002382'),
(24,191,24,50,NULL,'1600','2048','1E2600173393'),
(25,199,25,51,NULL,'12800','4096','NA'),
(26,207,26,52,NULL,'1600','2048','7E3800051222');
/*!40000 ALTER TABLE `ram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference`
--

DROP TABLE IF EXISTS `reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpu_id` int(11) DEFAULT NULL,
  `designation_cpu_ref` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_AEA349133917014` (`cpu_id`),
  CONSTRAINT `FK_AEA349133917014` FOREIGN KEY (`cpu_id`) REFERENCES `cpu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference`
--

LOCK TABLES `reference` WRITE;
/*!40000 ALTER TABLE `reference` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_mb`
--

DROP TABLE IF EXISTS `reference_mb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reference_mb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cartemere_id` int(11) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9B4ABE98D60943BC` (`cartemere_id`),
  CONSTRAINT `FK_9B4ABE98D60943BC` FOREIGN KEY (`cartemere_id`) REFERENCES `carte_mere` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_mb`
--

LOCK TABLES `reference_mb` WRITE;
/*!40000 ALTER TABLE `reference_mb` DISABLE KEYS */;
INSERT INTO `reference_mb` VALUES
(1,1,'G41T-M16'),
(2,2,'H61H2-MV'),
(3,3,'Hp compact 6000 Pro Aio'),
(4,4,'GA-H110M-S2'),
(5,5,'H110M-S2'),
(6,6,'H61H2-MV'),
(7,7,'H81MDV3'),
(8,8,'GA-H61M-S1'),
(9,9,'H110M-T'),
(10,10,'N/A'),
(11,11,'H61H2-MV'),
(12,12,'GA-H81M-51'),
(13,13,'H61H2-MV'),
(14,14,'LGA1155'),
(15,15,'LGA 1155'),
(16,16,'H61'),
(17,17,'H61H2-MV'),
(18,18,'H81M-VG4'),
(19,19,'H81M-VG4'),
(20,20,'H81H3-M4'),
(21,21,'H81M-VG4'),
(22,22,'H81-H3-M4'),
(23,23,'H81M-VG4'),
(24,24,'H61H2-MV'),
(25,25,'B75-M-D2V'),
(26,26,'H61M-VG4');
/*!40000 ALTER TABLE `reference_mb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `societe`
--

DROP TABLE IF EXISTS `societe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `societe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `society_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_19653DBDFB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_19653DBDFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `societe`
--

LOCK TABLES `societe` WRITE;
/*!40000 ALTER TABLE `societe` DISABLE KEYS */;
/*!40000 ALTER TABLE `societe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `souris`
--

DROP TABLE IF EXISTS `souris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `souris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `date_id` int(11) DEFAULT NULL,
  `nbr_bouton` int(11) NOT NULL,
  `sn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_51B122A8D5E86FF` (`etat_id`),
  UNIQUE KEY `UNIQ_51B122A8B897366B` (`date_id`),
  KEY `IDX_51B122A8FB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_51B122A8B897366B` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  CONSTRAINT `FK_51B122A8D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`),
  CONSTRAINT `FK_51B122A8FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `souris`
--

LOCK TABLES `souris` WRITE;
/*!40000 ALTER TABLE `souris` DISABLE KEYS */;
INSERT INTO `souris` VALUES
(1,41,27,NULL,3,' '),
(2,42,28,NULL,3,' '),
(3,43,29,NULL,3,' '),
(4,44,30,NULL,3,' '),
(5,45,31,NULL,3,' '),
(6,46,32,NULL,3,' '),
(7,47,33,NULL,3,' '),
(8,48,34,NULL,3,' '),
(9,49,35,NULL,3,' '),
(10,50,36,NULL,3,' '),
(11,51,37,NULL,3,' '),
(12,52,38,NULL,3,' '),
(13,53,39,NULL,3,' '),
(14,54,40,NULL,3,' '),
(15,55,41,NULL,3,' '),
(16,56,42,NULL,3,' '),
(17,57,43,NULL,3,' '),
(18,58,44,NULL,3,' '),
(19,59,45,NULL,3,' '),
(20,60,46,NULL,3,' '),
(21,61,47,NULL,3,' '),
(22,62,48,NULL,3,' '),
(23,63,49,NULL,3,' '),
(24,64,50,NULL,0,' '),
(25,65,51,NULL,3,' '),
(26,66,52,NULL,3,' ');
/*!40000 ALTER TABLE `souris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taille`
--

DROP TABLE IF EXISTS `taille`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hdd_id` int(11) DEFAULT NULL,
  `designation_taille_hdd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_76508B381493816F` (`hdd_id`),
  CONSTRAINT `FK_76508B381493816F` FOREIGN KEY (`hdd_id`) REFERENCES `hdd` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taille`
--

LOCK TABLES `taille` WRITE;
/*!40000 ALTER TABLE `taille` DISABLE KEYS */;
INSERT INTO `taille` VALUES
(1,1,'3.5'),
(2,2,'3.5'),
(3,3,'3.5'),
(4,4,'3.5'),
(5,5,'3.5'),
(6,6,'3.5'),
(7,7,'3.5'),
(8,8,'3.5'),
(9,9,'3.5'),
(10,10,'3.5'),
(11,11,'3.5'),
(12,12,'3.5'),
(13,13,'3.5'),
(14,14,'3.5'),
(15,15,'2.5'),
(16,16,'3.5'),
(17,17,'3.5'),
(18,18,'3.5'),
(19,19,'3.5'),
(20,20,'3.5'),
(21,21,'3.5'),
(22,22,'3.5'),
(23,23,'3.5'),
(24,24,'3.5'),
(25,25,'3.5'),
(26,26,'3.5');
/*!40000 ALTER TABLE `taille` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_cable`
--

DROP TABLE IF EXISTS `type_cable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_cable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cable_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `designation_type_cable` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2AE543239A81106E` (`cable_id`),
  UNIQUE KEY `UNIQ_2AE54323FB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_2AE543239A81106E` FOREIGN KEY (`cable_id`) REFERENCES `cable` (`id`),
  CONSTRAINT `FK_2AE54323FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_cable`
--

LOCK TABLES `type_cable` WRITE;
/*!40000 ALTER TABLE `type_cable` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_cable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_clavier`
--

DROP TABLE IF EXISTS `type_clavier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_clavier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clavier_id` int(11) DEFAULT NULL,
  `designation_type_clavier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_7BA4F732D6EB321B` (`clavier_id`),
  CONSTRAINT `FK_7BA4F732D6EB321B` FOREIGN KEY (`clavier_id`) REFERENCES `clavier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_clavier`
--

LOCK TABLES `type_clavier` WRITE;
/*!40000 ALTER TABLE `type_clavier` DISABLE KEYS */;
INSERT INTO `type_clavier` VALUES
(1,1,'AZERTY'),
(2,2,'AZERTY'),
(3,3,'AZERTY'),
(4,4,'AZERTY'),
(5,5,'AZERTY'),
(6,6,'AZERTY'),
(7,7,'AZERTY'),
(8,8,'AZERTY'),
(9,9,'AZERTY'),
(10,10,'AZERTY'),
(11,11,'AZERTY'),
(12,12,'AZERTY'),
(13,13,'AZERTY'),
(14,14,'AZERTY'),
(15,15,'AZERTY'),
(16,16,'AZERTY'),
(17,17,'AZERTY'),
(18,18,'AZERTY'),
(19,19,'AZERTY'),
(20,20,'AZERTY'),
(21,21,'AZERTY'),
(22,22,'AZERTY'),
(23,23,'AZERTY'),
(24,24,'AZERTY'),
(25,25,'AZERTY'),
(26,26,'AZERTY');
/*!40000 ALTER TABLE `type_clavier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_cpu`
--

DROP TABLE IF EXISTS `type_cpu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_cpu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpu_id` int(11) DEFAULT NULL,
  `designation_type_cpu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B897B6CF3917014` (`cpu_id`),
  CONSTRAINT `FK_B897B6CF3917014` FOREIGN KEY (`cpu_id`) REFERENCES `cpu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_cpu`
--

LOCK TABLES `type_cpu` WRITE;
/*!40000 ALTER TABLE `type_cpu` DISABLE KEYS */;
INSERT INTO `type_cpu` VALUES
(1,1,'E5700'),
(2,2,'G2030'),
(3,3,'core 2 Duo'),
(4,4,'G3930'),
(5,5,'G4400'),
(6,6,'G2030'),
(7,7,'13.4160'),
(8,8,'G2020'),
(9,9,'G3930'),
(10,10,'G540'),
(11,11,'6Z030'),
(12,12,'I3-4170'),
(13,13,'G2030'),
(14,14,'G2023'),
(15,15,'3220'),
(16,16,'G2030'),
(17,17,'G2030'),
(18,18,'G1840'),
(19,19,'G1840'),
(20,20,'G3260'),
(21,21,'G1840'),
(22,22,'G3260'),
(23,23,'G1840'),
(24,24,'N/A'),
(25,25,'3220'),
(26,26,'G2030');
/*!40000 ALTER TABLE `type_cpu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_ecran`
--

DROP TABLE IF EXISTS `type_ecran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_ecran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ecran_id` int(11) DEFAULT NULL,
  `designation_type_ecran` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_31F67ABDE73649EB` (`ecran_id`),
  CONSTRAINT `FK_31F67ABDE73649EB` FOREIGN KEY (`ecran_id`) REFERENCES `ecran` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_ecran`
--

LOCK TABLES `type_ecran` WRITE;
/*!40000 ALTER TABLE `type_ecran` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_ecran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_hdd`
--

DROP TABLE IF EXISTS `type_hdd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_hdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hdd_id` int(11) DEFAULT NULL,
  `designation_type_hdd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F0DCAE891493816F` (`hdd_id`),
  CONSTRAINT `FK_F0DCAE891493816F` FOREIGN KEY (`hdd_id`) REFERENCES `hdd` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_hdd`
--

LOCK TABLES `type_hdd` WRITE;
/*!40000 ALTER TABLE `type_hdd` DISABLE KEYS */;
INSERT INTO `type_hdd` VALUES
(1,1,'SATA'),
(2,2,'SATA'),
(3,3,'SATA'),
(4,4,'SATA'),
(5,5,'SATA'),
(6,6,'SATA'),
(7,7,'SATA'),
(8,8,'SATA'),
(9,9,'SATA'),
(10,10,'SATA'),
(11,11,'SATA'),
(12,12,'SATA'),
(13,13,'SATA'),
(14,14,'SATA'),
(15,15,'SATA'),
(16,16,'SATA'),
(17,17,'SATA'),
(18,18,'SATA'),
(19,19,'SATA'),
(20,20,'SATA'),
(21,21,'SATA'),
(22,22,'SATA'),
(23,23,'SATA'),
(24,24,'SATA'),
(25,25,'SATA'),
(26,26,'SATA');
/*!40000 ALTER TABLE `type_hdd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_ram`
--

DROP TABLE IF EXISTS `type_ram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_ram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ram_id` int(11) DEFAULT NULL,
  `designation_type_ram` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E5C6C4CE3366068` (`ram_id`),
  CONSTRAINT `FK_E5C6C4CE3366068` FOREIGN KEY (`ram_id`) REFERENCES `ram` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_ram`
--

LOCK TABLES `type_ram` WRITE;
/*!40000 ALTER TABLE `type_ram` DISABLE KEYS */;
INSERT INTO `type_ram` VALUES
(1,1,'DDR 3'),
(2,2,'DDR 3'),
(3,3,'DDR 2'),
(4,4,'DDR 4'),
(5,5,'DDR 4'),
(6,6,'DDR 3'),
(7,7,'DDR 3'),
(8,8,'DDR 3'),
(9,9,'DDR 4'),
(10,10,'DDR 3'),
(11,11,'DDR 3'),
(12,12,'DDR 3'),
(13,13,'DDR 3'),
(14,14,'DDR 3'),
(15,15,'DDR 3'),
(16,16,'DDR 3'),
(17,17,'DDR 3'),
(18,18,'DDR 3'),
(19,19,'DDR 3'),
(20,20,'DDR 3'),
(21,21,'DDR 3'),
(22,22,'DDR 3'),
(23,23,'DDR 3'),
(24,24,'DDR 3'),
(25,25,'DDR 3'),
(26,26,'DDR 3');
/*!40000 ALTER TABLE `type_ram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(41,'1','[]','1424','RANJARAMANANA','Tovo','','261344748412','assisstant@mellis.mg'),
(42,'2','[]','1420','RAHARITIANA','Kanto','','344948011','KantoRaharitiana@mellis.mg'),
(43,'3','[]','1329','RAJAONARIVO Jean Jacques','Denis','','261344748782','denis_Acm@gmail.com'),
(44,'4','[]','N/A','N/A','Felana','','2614748714','felana.razafimahatratra@mellis.mg'),
(45,'5','[]','1190','RALALANIRINA','Hery Fanja','','261344948034','Call.center@mellis.mg'),
(46,'6','[]','482','ANDRIAMIRADO','Herinosy','','261344748780','facturation.tana2@mellis.mg'),
(47,'7','[]','559','RASOLOHERY','Samy','','261344948039','caisse.mellis@gmail.com'),
(48,'8','[]','146','RASOLOFOMANANA','Zoherivelo','','261344748835','zo.rasolofomanana@mellis.mg'),
(49,'9','[]','278','RAVAOARISOA','Lalaina','','261344748040','lalaina.ravaoarisoa@mellis.mg'),
(50,'10','[]','1320','ANDRIAMANAMPY','Kantoniaina Sahoby','','261344748827','geolocalisation@mellis.mg'),
(51,'11','[]','567','RABDRIAMAZAKA','Narindra','','261344748892','narindra.randriamizaka@mellis.mg'),
(52,'12','[]','682','RAJAONA','Zo','','261344748532','N/A'),
(53,'13','[]','932','RASAMIMANANA','Tony','','261344948036','anthony.rasamimana@mellis.mg'),
(54,'14','[]','1427','Manantenasoa','Lalaina','','261344948012','transfert.mail@mellis.mg'),
(55,'15','[]','86','RAMANANTSOA','Vola','','261344748802','admincom@mellis.mg'),
(56,'16','[]','1401','RAMAMONJIARISOA','Nilaina nomenjanahary','','261344748448','transfert.mail@gmail.com'),
(57,'17','[]','N/A','N/A','N/A','','N/A','N/A'),
(58,'18','[]','73','RANDRIAMANANTSOA','Ursula','','261344748458','gest.stock@maboisson.mg'),
(59,'19','[]','76','RAFANOMEZANTSOA','Soloniana','','261347697931','N/A'),
(60,'20','[]','46','RANDRIANARIMALALA','Nasandratra','','348101786','N/A'),
(61,'21','[]','23','RAKOTOARIVELO','Théophile','','344748910','resp.prod@maboisson.mg'),
(62,'22','[]','70','RAVIMANANA','Andriamahefa Maholisoa','','342155819','raandriamahefa87@gmail.com'),
(63,'23','[]','1','RAKOTOARIVELO','Claude','','344748619','resp.usine@maboisson.mg'),
(64,'24','[]','N/A','N/A','N/A','','N/A','N/A'),
(65,'25','[]','55','VOLOLONIRINA','Jeannine','','NA','NA'),
(66,'26','[]','22','ARIJAONA','Mino','','261344748916','resp.qhse@maboisson.mg');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-31  8:02:08
