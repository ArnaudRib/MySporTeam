# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.6.27)
# Base de données: APP-test
# Temps de génération: 2016-03-02 21:28:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table groupe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groupe`;

CREATE TABLE `groupe` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_sport` int(11) unsigned DEFAULT NULL,
  `id_club` int(11) unsigned DEFAULT NULL,
  `titre` varchar(30) NOT NULL DEFAULT '',
  `visibilité` tinyint(1) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `nbmaxutil` int(2) DEFAULT NULL,
  `creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`),
  KEY `id_sport` (`id_sport`),
  KEY `id_club` (`id_club`),
  CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id`),
  CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`id_club`) REFERENCES `club` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table planning
# ------------------------------------------------------------

DROP TABLE IF EXISTS `planning`;

CREATE TABLE `planning` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) unsigned DEFAULT NULL,
  `activité` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dstart` datetime DEFAULT NULL,
  `dend` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_groupe` (`id_groupe`),
  CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
