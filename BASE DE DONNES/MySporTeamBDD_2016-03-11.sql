# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.6.28)
# Base de données: MySporTeamBDD
# Temps de génération: 2016-03-11 17:57:32 +0000
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

CREATE TABLE `commentaire` (
  `titre` char(150) DEFAULT NULL,
  `id_utilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table discussion
# ------------------------------------------------------------

CREATE TABLE `discussion` (
  `titre` char(200) DEFAULT NULL,
  `id_utilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `id_discussion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table discussion_groupe
# ------------------------------------------------------------

CREATE TABLE `discussion_groupe` (
  `id_groupe` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `discussion_tittle` varchar(40) DEFAULT NULL,
  `date_creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table groupes
# ------------------------------------------------------------

CREATE TABLE `groupes` (
  `id_groupe` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_sport` int(11) DEFAULT NULL,
  `leader_name` varchar(30) DEFAULT NULL,
  `localisation` varchar(30) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `nbmax_sportifs` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table message
# ------------------------------------------------------------

CREATE TABLE `message` (
  `text` text,
  `id_utilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_discussion` int(11) DEFAULT NULL,
  `id_topic` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table message_de_groupe
# ------------------------------------------------------------

CREATE TABLE `message_de_groupe` (
  `id_utilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_creation` int(11) DEFAULT NULL,
  `id_discussion` int(11) DEFAULT NULL,
  `texte` text,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table photo
# ------------------------------------------------------------

CREATE TABLE `photo` (
  `id_photo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `chemin` int(100) DEFAULT NULL,
  `chemin_thumb` int(100) DEFAULT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_sports` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table planning
# ------------------------------------------------------------

CREATE TABLE `planning` (
  `id_groupe` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom_evenement` int(11) DEFAULT NULL,
  `date_evenement` date DEFAULT NULL,
  `heure_debut` datetime DEFAULT NULL,
  `heure_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table sports
# ------------------------------------------------------------

CREATE TABLE `sports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sports` WRITE;
/*!40000 ALTER TABLE `sports` DISABLE KEYS */;

INSERT INTO `sports` (`id`, `nom`, `photo`, `description`)
VALUES
	(1,'football','/images/Sports/football.jpg','Sport de balles'),
	(2,'rugby','/images/Sports/rugby.jpg','Sport du ballon rond');

/*!40000 ALTER TABLE `sports` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table topic
# ------------------------------------------------------------

CREATE TABLE `topic` (
  `id_topic` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` char(100) DEFAULT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table types_sports
# ------------------------------------------------------------

CREATE TABLE `types_sports` (
  `id_topic` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table utilisateur_groupe
# ------------------------------------------------------------

CREATE TABLE `utilisateur_groupe` (
  `id_utilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) DEFAULT NULL,
  `leader_groupe` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table utilisateur_sport
# ------------------------------------------------------------

CREATE TABLE `utilisateur_sport` (
  `id_utilisateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_sport` int(11) DEFAULT NULL,
  `niveau` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table utilisateurs
# ------------------------------------------------------------

CREATE TABLE `utilisateurs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` char(254) DEFAULT NULL,
  `prénom` char(254) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(10000) DEFAULT NULL,
  `adresse` varchar(1000) DEFAULT NULL,
  `numero_telephone` int(10) DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `pseudo` char(254) DEFAULT NULL,
  `admin_util` tinyint(1) DEFAULT NULL,
  `id_photo` int(11) DEFAULT NULL,
  `id_ville` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table villes
# ------------------------------------------------------------

CREATE TABLE `villes` (
  `id_ville` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(50) DEFAULT NULL,
  `departement` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
