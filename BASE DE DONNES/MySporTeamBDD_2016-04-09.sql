# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.6.28)
# Base de données: MySporTeamBDD
# Temps de génération: 2016-04-09 21:31:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table commentaire
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commentaire`;

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL DEFAULT '0',
  `titre` char(150) DEFAULT NULL,
  `texte` text,
  `creation_date` date DEFAULT NULL,
  `id_topic` int(11) unsigned DEFAULT NULL,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_topic` (`id_topic`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`),
  CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table discussion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `discussion`;

CREATE TABLE `discussion` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `titre` char(200) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `id_topic` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_topic` (`id_topic`),
  CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table discussion_groupe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `discussion_groupe`;

CREATE TABLE `discussion_groupe` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `discussion_tittle` varchar(40) DEFAULT NULL,
  `date_creation` int(11) unsigned DEFAULT NULL,
  `public` tinyint(1) unsigned DEFAULT NULL,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_groupe` (`id_groupe`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `discussion_groupe_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`),
  CONSTRAINT `discussion_groupe_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table groupe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groupe`;

CREATE TABLE `groupe` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(10000) DEFAULT NULL,
  `nom_leader` varchar(30) DEFAULT NULL,
  `localisation` varchar(30) DEFAULT NULL,
  `public` tinyint(1) unsigned DEFAULT NULL,
  `nbmax_sportifs` int(11) unsigned DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `id_sport` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id`) REFERENCES `sports` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `texte` text,
  `date_creation` date DEFAULT NULL,
  `id_discussion` int(11) unsigned DEFAULT NULL,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_discussion` (`id_discussion`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_discussion`) REFERENCES `discussion` (`id`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table message_de_groupe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message_de_groupe`;

CREATE TABLE `message_de_groupe` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `date_creation` int(11) DEFAULT NULL,
  `texte` text,
  `id_discussion` int(11) unsigned DEFAULT NULL,
  `id_utlisateur` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_discussion` (`id_discussion`),
  KEY `id_utlisateur` (`id_utlisateur`),
  CONSTRAINT `message_de_groupe_ibfk_1` FOREIGN KEY (`id_discussion`) REFERENCES `discussion_groupe` (`id`),
  CONSTRAINT `message_de_groupe_ibfk_2` FOREIGN KEY (`id_utlisateur`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table photo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photo`;

CREATE TABLE `photo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `chemin` varchar(1000) DEFAULT NULL,
  `chemin_thumb` varchar(1000) DEFAULT NULL,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  `id_utilisateur` int(11) unsigned DEFAULT NULL,
  `id_sports` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_groupe` (`id_groupe`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_sports` (`id_sports`),
  CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`),
  CONSTRAINT `photo_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `photo_ibfk_3` FOREIGN KEY (`id_sports`) REFERENCES `sports` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;

INSERT INTO `photo` (`id`, `nom`, `description`, `chemin`, `chemin_thumb`, `id_groupe`, `id_utilisateur`, `id_sports`)
VALUES
	(1,'football_photo','Sport de balle','/asset/images/Sports/football.jpg',NULL,NULL,NULL,1),
	(2,'rugby_photo','Sport de balle','/asset/images/Sports/rugby.jpg',NULL,NULL,NULL,2);

/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table planning
# ------------------------------------------------------------

DROP TABLE IF EXISTS `planning`;

CREATE TABLE `planning` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `nom_evenement` int(11) DEFAULT NULL,
  `date_evenement` date DEFAULT NULL,
  `heure_debut` datetime DEFAULT NULL,
  `heure_fin` datetime DEFAULT NULL,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`id`) REFERENCES `groupe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table sports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sports`;

CREATE TABLE `sports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `id_type` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type` (`id_type`),
  CONSTRAINT `sports_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `types_sports` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sports` WRITE;
/*!40000 ALTER TABLE `sports` DISABLE KEYS */;

INSERT INTO `sports` (`id`, `nom`, `description`, `id_type`)
VALUES
	(1,'football','Sport de balles',NULL),
	(2,'rugby','Sport du ballon rond',NULL);

/*!40000 ALTER TABLE `sports` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table topic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topic`;

CREATE TABLE `topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` char(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table types_sports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types_sports`;

CREATE TABLE `types_sports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `types_sports` WRITE;
/*!40000 ALTER TABLE `types_sports` DISABLE KEYS */;

INSERT INTO `types_sports` (`id`, `titre`)
VALUES
	(1,'balle');

/*!40000 ALTER TABLE `types_sports` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table utilisateur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` char(254) DEFAULT NULL,
  `prénom` char(254) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `mot_de_passe` varchar(10000) DEFAULT NULL,
  `adresse` varchar(1000) DEFAULT NULL,
  `numero_telephone` int(10) DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `pseudo` char(254) DEFAULT NULL,
  `admin_util` tinyint(1) DEFAULT NULL,
  `id_photo` int(11) unsigned DEFAULT NULL,
  `id_ville` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_photo` (`id_photo`),
  KEY `id_ville` (`id_ville`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id`),
  CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;

INSERT INTO `utilisateur` (`id`, `nom`, `prénom`, `email`, `sexe`, `mot_de_passe`, `adresse`, `numero_telephone`, `naissance`, `pseudo`, `admin_util`, `id_photo`, `id_ville`)
VALUES
	(1,'Nom','Prénom','arnaud_rib@hotmail.fr','H','password',NULL,NULL,NULL,'test',NULL,NULL,NULL),
	(2,NULL,NULL,'test','H','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,'2016-00-01','lapin',NULL,NULL,NULL),
	(3,NULL,NULL,'test','H','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,'2011-03-03','test',NULL,NULL,NULL),
	(6,NULL,NULL,'a','H','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8',NULL,NULL,'2016-00-01','aa',NULL,NULL,NULL),
	(7,NULL,NULL,'a','H','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8',NULL,NULL,'2016-00-01','a',NULL,NULL,NULL);

/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table utilisateur_groupe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur_groupe`;

CREATE TABLE `utilisateur_groupe` (
  `id_utilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  `leader_groupe` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `id_groupe` (`id_groupe`),
  CONSTRAINT `utilisateur_groupe_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `utilisateur_groupe_ibfk_2` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table utilisateur_sport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur_sport`;

CREATE TABLE `utilisateur_sport` (
  `id_utilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_sport` int(11) unsigned DEFAULT NULL,
  `niveau` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `id_sport` (`id_sport`),
  CONSTRAINT `utilisateur_sport_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `utilisateur_sport_ibfk_2` FOREIGN KEY (`id_sport`) REFERENCES `sports` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table ville
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ville`;

CREATE TABLE `ville` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `departement` int(5) DEFAULT NULL,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`id`) REFERENCES `groupe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
