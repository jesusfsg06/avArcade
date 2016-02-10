/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.5.32 : Database - game
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`game` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `game`;

/*Table structure for table `ava_adverts` */

DROP TABLE IF EXISTS `ava_adverts`;

CREATE TABLE `ava_adverts` (
  `id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(40) NOT NULL,
  `ad_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ava_adverts` */

insert  into `ava_adverts`(`id`,`ad_name`,`ad_content`) values (1,'Default',''),(2,'AV Arcade Banner','<img src=\"images/ad_example.png\"><br>');

/*Table structure for table `ava_cats` */

DROP TABLE IF EXISTS `ava_cats`;

CREATE TABLE `ava_cats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `cat_order` decimal(5,1) NOT NULL DEFAULT '1.0',
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `seo_url` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ava_cats` */

insert  into `ava_cats`(`id`,`name`,`cat_order`,`description`,`keywords`,`seo_url`,`parent_id`) values (4,'Deportes','3.0','Juegos de deportes como Baseball, hockey','deportes, baseball, bascketball','deportes',0),(2,'Accion ','2.0','Juegos de Accion','accion, disparo, peleas, luchas','accion-',0),(3,'Carreras','1.0','','carreras, competiciones','carreras',0),(5,'Aventura','4.0','Juegos de Aventura','Historias, Flappy bird, aventuras','aventura',0),(6,'ClÃ¡sicos','5.0','Juegos Clasicos','clasicos, puzzle, tetris, bomberman','clÃ¡sicos',0);

/*Table structure for table `ava_comments` */

DROP TABLE IF EXISTS `ava_comments`;

CREATE TABLE `ava_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `link_id` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_id` (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_comments` */

/*Table structure for table `ava_favourites` */

DROP TABLE IF EXISTS `ava_favourites`;

CREATE TABLE `ava_favourites` (
  `user_id` int(5) NOT NULL,
  `game_id` int(5) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_favourites` */

insert  into `ava_favourites`(`user_id`,`game_id`) values (1,64),(1,22);

/*Table structure for table `ava_feed_settings` */

DROP TABLE IF EXISTS `ava_feed_settings`;

CREATE TABLE `ava_feed_settings` (
  `name` varchar(20) NOT NULL,
  `value` varchar(240) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_feed_settings` */

insert  into `ava_feed_settings`(`name`,`value`) values ('max_feed','1000'),('category_action','1'),('category_jigsaw','1'),('category_fighting','1'),('category_education','1'),('category_driving','1'),('category_dress_up','1'),('category_defense','1'),('category_casino','1'),('category_board_game','1'),('category_arcade','1'),('category_adventure','1'),('feed_params',''),('default_ad','1'),('get_tags','0'),('download','1'),('curl','1'),('mochi_secretkey',''),('mochi_pubid',''),('category_multiplayer','1'),('category_other','1'),('category_customize','1'),('category_puzzle','1'),('category_rhythm','1'),('category_rpg','1'),('category_shooter','1'),('category_sports','1'),('category_strategy','1'),('category_skill','1'),('category_autopost','1');

/*Table structure for table `ava_fgd` */

DROP TABLE IF EXISTS `ava_fgd`;

CREATE TABLE `ava_fgd` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `fgd_id` int(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `width` int(4) NOT NULL,
  `height` int(4) NOT NULL,
  `author` varchar(60) NOT NULL,
  `category` varchar(40) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '0',
  `instructions` text NOT NULL,
  `tags` varchar(200) NOT NULL,
  `mochi_id` varchar(20) NOT NULL,
  `author_link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gametag` (`fgd_id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_fgd` */

/*Table structure for table `ava_fog` */

DROP TABLE IF EXISTS `ava_fog`;

CREATE TABLE `ava_fog` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `fog_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `width` int(4) NOT NULL,
  `height` int(4) NOT NULL,
  `author` varchar(60) NOT NULL,
  `author_link` varchar(255) NOT NULL,
  `category` varchar(40) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '0',
  `instructions` text NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `tags` varchar(200) NOT NULL,
  `highscores` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gametag` (`fog_id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_fog` */

/*Table structure for table `ava_forums` */

DROP TABLE IF EXISTS `ava_forums`;

CREATE TABLE `ava_forums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `description` text,
  `forum_order` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `last_post_time` int(11) DEFAULT NULL,
  `last_poster` varchar(60) DEFAULT NULL,
  `last_poster_id` int(11) DEFAULT NULL,
  `last_topic` varchar(60) DEFAULT NULL,
  `last_topic_id` int(11) DEFAULT NULL,
  `last_topic_seo_url` varchar(100) DEFAULT NULL,
  `last_topic_forum_seo_url` varchar(100) DEFAULT NULL,
  `total_topics` int(11) NOT NULL DEFAULT '0',
  `total_posts` int(11) NOT NULL DEFAULT '0',
  `seo_url` varchar(100) DEFAULT '',
  `read_only` tinyint(1) NOT NULL DEFAULT '0',
  `parents` varchar(20) NOT NULL DEFAULT '0',
  `children` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`),
  KEY `forum_order` (`forum_order`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ava_forums` */

insert  into `ava_forums`(`id`,`name`,`description`,`forum_order`,`parent_id`,`category`,`last_post_time`,`last_poster`,`last_poster_id`,`last_topic`,`last_topic_id`,`last_topic_seo_url`,`last_topic_forum_seo_url`,`total_topics`,`total_posts`,`seo_url`,`read_only`,`parents`,`children`) values (1,'Main Category','A category.',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'main-category',1,'','2'),(2,'Example Forum','Here\'s an example forum. In the admin panel rename me to set up your first forum.',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'example-forum',0,'1','');

/*Table structure for table `ava_friend_requests` */

DROP TABLE IF EXISTS `ava_friend_requests`;

CREATE TABLE `ava_friend_requests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `from_user` (`from_user`),
  KEY `to_user` (`to_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_friend_requests` */

/*Table structure for table `ava_friends` */

DROP TABLE IF EXISTS `ava_friends`;

CREATE TABLE `ava_friends` (
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  KEY `user1` (`user1`),
  KEY `user2` (`user2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_friends` */

/*Table structure for table `ava_games` */

DROP TABLE IF EXISTS `ava_games`;

CREATE TABLE `ava_games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_parent` int(11) DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `user_submit` varchar(10) NOT NULL DEFAULT '0',
  `width` varchar(4) NOT NULL DEFAULT '',
  `height` varchar(4) NOT NULL DEFAULT '',
  `image` text NOT NULL,
  `import` char(1) NOT NULL DEFAULT '0',
  `filetype` varchar(5) NOT NULL DEFAULT '1',
  `instructions` text NOT NULL,
  `mochi` tinyint(1) NOT NULL DEFAULT '0',
  `rating` decimal(5,1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `advert_id` tinyint(5) NOT NULL DEFAULT '1',
  `highscores` tinyint(1) NOT NULL DEFAULT '0',
  `mochi_id` varchar(20) NOT NULL DEFAULT '0',
  `seo_url` varchar(100) NOT NULL,
  `submitter` int(11) NOT NULL DEFAULT '0',
  `html_code` text,
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

/*Data for the table `ava_games` */

insert  into `ava_games`(`id`,`name`,`description`,`url`,`category_id`,`category_parent`,`hits`,`published`,`user_submit`,`width`,`height`,`image`,`import`,`filetype`,`instructions`,`mochi`,`rating`,`featured`,`date_added`,`advert_id`,`highscores`,`mochi_id`,`seo_url`,`submitter`,`html_code`) values (1,'Turn Based Battle','Not everything is as it seems when James the Elf has the first Random Encounter of this Adventure. Will he get to the bottom of his mysterious enemy? Or will the entire world crumble to the great evil who presides in an impenetrable fortress?','http://games.mochiads.com/c/g/turn-based-battle/TurnBasedBattleMOCHI.swf',3,0,0,1,'0','550','400','http://thumbs.mochiads.com/c/g/turn-based-battle/_thumb_100x100.jpg','0','swf','Use the mouse to navigate and battle!',0,'0.0',0,'2014-03-16 17:27:04',1,1,'15ae16d5b1c9f47d','turn-based-battle',0,NULL),(2,'Uphill Rush 6','','http://localhost/upload/games/uphill Rush 6.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Uphill-Rush-6.jpg','0','swf','',0,'0.0',1,'2014-03-16 17:27:04',1,1,'','uphill-rush-6',0,''),(3,'Renegade Racing','','http://localhost/upload/games/renegade.swf',3,0,1,1,'0','700','500','http://localhost/upload/games/images/Racing.jpg','0','swf','',0,'0.0',0,'2014-03-16 17:48:30',1,1,'','renegade-racing',0,''),(4,'Paintball Racers','','http://localhost/upload/games/paintball.swf',3,0,1,1,'0','700','500','http://localhost/upload/games/images/Paintball-Racers.jpg','0','swf','',0,'0.0',0,'2014-03-16 18:22:53',1,0,'','paintball-racers-2',0,''),(5,'Rich Cars 2','','http://localhost/upload/games/rich cars.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Rich-Cars-2.jpg','0','swf','',0,'0.0',0,'2014-03-16 18:54:50',1,1,'','rich-cars-2',0,''),(6,'Stunt Master','','http://localhost/upload/games/stunt master.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Stunt-Master.jpg','0','swf','',0,'0.0',0,'2014-03-16 18:57:38',1,1,'','stunt-master',0,''),(7,'Uphill Rush 5','Juego De carreras Super emocionante, Donde podras hacer maniobras en el agua, monntar delfines, motos, autos','http://localhost/upload/games/uphill.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Uphill-Rush-5.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:19:07',1,1,'','uphill-rush-5',0,''),(8,'Fmx Team','Juego de Motos, donde podras hacer maniobras expertas e increibles...','http://localhost/upload/games/fmx team.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/FMX-Team.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:23:00',1,1,'','fmx-team',0,''),(9,'Moto Run','Carreras de Motos Deportivas','http://localhost/upload/games/motorun.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Moto-Run.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:25:31',1,1,'','moto-run',0,''),(10,'Vehicles 2','Juego de autos.. Nota: solo para personas astutas','http://localhost/upload/games/vehicles 2.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Vehicles-2.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:33:41',1,1,'','vehicles-2',0,''),(11,'V8 Muscle Cars','Juego de Muscle Cars super emocionante','http://localhost/upload/games/v8 muscle cars.swf',3,0,1,1,'0','700','500','http://localhost/upload/games/images/V8-Muscle-Cars.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:36:59',1,1,'','v8-muscle-cars',0,''),(12,'Monster Truck Demolisher','Juegos de Moster trucks, podras mostrar tu dureza','http://localhost/upload/games/monster truck.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Monster-Truck-Demolisher.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:40:28',1,1,'','monster-truck-demolisher',0,''),(13,'Formula Racer','Carreras de autos de Formula 1','http://localhost/upload/games/formula.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Formula-Racer.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:43:35',1,1,'','formula-racer',0,''),(14,'Create a Ride','Crea Tu propio coche, tunealo...','http://localhost/upload/games/create a ride.swf',3,0,0,1,'1','700','500','http://localhost/upload/games/images/Create-A-Ride.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:50:08',1,1,'','create-a-ride',1,''),(15,'Monster Racer 3d','Juegos de mosters truck con graficos 3d','http://localhost/upload/games/monster race 3d.swf',3,0,1,1,'0','700','500','http://localhost/upload/games/images/Monster-Race-3D.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:53:34',1,1,'','monster-racer-3d',0,''),(16,'Tractors Power 2','Juego de tractores, donde podras hacer carreras super divertidas','http://localhost/upload/games/tractors power2.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Tractors-Power-2.jpg','0','swf','',0,'0.0',0,'2014-03-25 20:56:34',1,1,'','tractors-power-2',0,''),(17,'New York Taxi 3D','Juego de carreras donde eres un taxista de New York','http://localhost/upload/games/new york taxi.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/New-York-Taxi-3D.jpg','0','swf','',0,'0.0',0,'2014-03-25 21:59:42',1,1,'','new-york-taxi-3d',0,''),(18,'New York Taxi 3D','Juego de carreras donde eres un taxista de New York','http://localhost/upload/games/new york taxi.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/New-York-Taxi-3D.jpg','0','swf','',0,'0.0',0,'2014-03-25 21:59:43',1,1,'','new-york-taxi-3d-2',0,''),(19,'Mining Truck','Juego donde conduces un camion de mina, no dejes que se te caiga tu carga...','http://localhost/upload/games/mining_truck.swf',3,0,1,1,'0','700','500','http://localhost/upload/games/images/Mining-Truck.jpg','0','swf','',0,'0.0',0,'2014-03-25 22:04:50',1,1,'','mining-truck',0,''),(20,'Solid Racer','Este es un juego donde podras conprobar tu destreza en las motos, demuestra que eres un experto!!!','http://localhost/upload/games/solid_racer.swf',3,0,0,1,'0','600','400','http://localhost/upload/games/images/Solid-Racer.jpg','0','swf','',0,'0.0',1,'2014-03-25 22:08:59',1,1,'','solid-racer',0,''),(21,'Truck Mania','Juego de Camiones donde podras demostrar tu agilidad conduciendo','http://localhost/upload/games/truck_mania.swf',3,0,1,1,'0','700','500','http://localhost/upload/games/images/Truck-Mania.jpg','0','swf','',0,'0.0',0,'2014-03-25 22:12:33',1,1,'','truck-mania',0,''),(22,'Red Driver 3','Te gustan las carreras callejeras, quieres demostrar que eres el mejor, pues este es tu juego.','http://localhost/upload/games/red_driver.swf',3,0,1,1,'0','700','500','http://localhost/upload/games/images/Red-Driver-3.jpg','0','swf','',0,'5.0',1,'2014-03-25 22:17:04',1,1,'','red-driver-3',0,''),(23,'Street Racer','Juego de autos modificados.','http://localhost/upload/games/street_racer.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Street-Racer.jpg','0','swf','',0,'0.0',0,'2014-03-25 22:23:36',1,1,'','street-racer',0,''),(24,'OffRoaders','Juego de Carreras de Camiones','http://localhost/upload/games/offroaders.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/OffRoaders.jpg','0','swf','',0,'0.0',0,'2014-03-25 22:25:56',1,1,'','offroaders',0,''),(25,'Mario Go Kart','Juego de Mario Kart, super divertido y emocionante.','http://localhost/upload/games/mariogokart.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Mario-Go-Kart.jpg','0','swf','',0,'0.0',0,'2014-03-25 23:44:03',1,1,'','mario-go-kart',0,''),(26,'Animal Dash','Juego de Carreras de animales, elige el que mas te gusta y ponte a correr.','http://localhost/upload/games/animal_dash.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Animal-Dash.jpg','0','swf','',0,'0.0',0,'2014-03-25 23:47:45',1,1,'','animal-dash',0,''),(27,'War Machine','Juego de habilidad, no permitas que se volque, ni pierdas lo que tienes. ','http://localhost/upload/games/war_machine.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/War-Machine!.jpg','0','swf','',0,'0.0',0,'2014-03-25 23:54:02',1,1,'','war-machine',0,''),(28,'Alex Trax','Juego de Mountain Bike, demuestra tu destreza...','http://localhost/upload/games/alex_trax.swf',3,0,1,1,'0','700','500','http://localhost/upload/games/images/Alex-Trax.jpg','0','swf','',0,'0.0',0,'2014-03-25 23:59:03',1,1,'','alex-trax',0,''),(29,'Neon Rider','Juego de Carreras en pistas de neon, una nueva forma de competir, nuevos coches, nuevas pistas, nuevos juegos...','http://localhost/upload/games/neon.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Neon-Rider.jpg','0','swf','',0,'0.0',0,'2014-03-26 00:04:05',1,1,'','neon-rider',0,''),(30,'Jetski Mario','Juego de motos de agua con Mario..','http://localhost/upload/games/jetski_mario.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Jetski-Mario.jpg','0','swf','',0,'0.0',0,'2014-03-26 00:10:06',1,1,'','jetski-mario',0,''),(31,'Coaster Racer','Juego de autos en primera persona.','http://localhost/upload/games/coaster_racer.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/Coaster-Racer.jpg','0','swf','',0,'0.0',0,'2014-03-26 00:14:44',1,1,'','coaster-racer',0,''),(32,'Rush Hour Motocross','Juego de habilidad en motos, conduciendo en la ciudad','http://localhost/upload/games/rush_hour_motocross.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/Rush-Hour-Motocross.jpg','0','swf','',0,'0.0',0,'2014-03-26 00:17:14',1,1,'','rush-hour-motocross',0,''),(33,'TT Racer','Simulador de Carreras de motos','http://localhost/upload/games/ttracer.swf',3,0,0,1,'0','700','500','http://localhost/upload/games/images/TT-Racer.jpg','0','swf','',0,'0.0',0,'2014-03-26 00:24:04',1,1,'','tt-racer',0,''),(34,'Destructo Dog 2','Juego de Accion donde seras el protagonista de la historia, vence a todos tus enemigos y demuestra que eres el mejor','http://localhost/upload/games/destructo_dog2.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/Destructo-Dog-2.jpg','0','swf','',0,'0.0',0,'2014-03-26 00:36:24',1,1,'','destructo-dog-2',0,''),(35,'Crazy Penguin Catapult','Diviertete con estos pinguinos locos','http://localhost/upload/games/crazy_pinguin.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/Crazy-Penguin-Catapult.jpg','0','swf','',0,'0.0',0,'2014-03-26 00:40:29',1,1,'','crazy-penguin-catapult',0,''),(36,'Papa Louie','Juego de accion, donde pelearas contra frutas, ademas de que tendras que andar por el bosque en busca de monedas','http://localhost/upload/games/papa_louie.swf',2,0,2,1,'0','700','500','http://localhost/upload/games/images/Papa-Louie-2.jpg','0','swf','',0,'0.0',0,'2014-03-26 01:10:46',1,1,'','papa-louie',0,''),(37,'Eb2','Juego de disparo, trata de no dejar que te maten','http://localhost/upload/games/eb2.swf',2,0,1,1,'0','700','500','http://localhost/upload/games/images/EB2.jpg','0','swf','',0,'0.0',0,'2014-03-26 01:24:02',1,1,'','eb2',0,''),(38,'Dirk Valentine','No permitas que te destruyan los enemigos','http://localhost/upload/games/dirt_valentine.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/Dirk-Valentine.jpg','0','swf','',0,'0.0',0,'2014-03-26 20:21:59',1,1,'','dirk-valentine',0,''),(39,'Cactus McCoy 2','Juego de disparos ','http://localhost/upload/games/cactus_cowboy.swf',2,0,1,1,'0','700','500','http://localhost/upload/games/images/Cactus-McCoy-2.jpg','0','swf','',0,'0.0',0,'2014-03-26 20:25:12',1,1,'','cactus-mccoy-2',0,''),(40,'Gun Mayhem 2','Juego al estilo Super Smash Bros con hasta 4 jugadores donde tu objetivo es tirar a tus contrincantes de las plataformas.','http://localhost/upload/games/gun_mayhen_2.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/Gun-Mayhem-2.jpg','0','swf','',0,'0.0',0,'2014-03-26 21:40:59',1,1,'','gun-mayhem-2',0,''),(41,' Undercover OPS','Te han enviado a la selva para acabar con la guerrilla. MuÃ©vete con sigilo y acaba con ellos con solo un puÃ±al.','http://localhost/upload/games/undercover_ops.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/undercover-ops.jpg','0','swf','',0,'0.0',0,'2014-03-26 21:44:42',1,1,'','-undercover-ops',0,''),(42,'Strike Force Heroes','Es el aÃ±o 2044, la gente estÃ¡ atrapada en un abismo de miseria, las fuerzas del mal estÃ¡n gobernado el mundo, ellos tienen las armas mÃ¡s avanzadas, pero no tienen un hÃ©roe. El doctor Z ha creado una droga capaz de salvar el mundo.','http://localhost/upload/games/Strike Force Heroes.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/strike-force-heroes-2-big.jpg','0','swf','',0,'0.0',0,'2014-03-26 21:48:07',1,1,'','strike-force-heroes',0,''),(43,'Dragon Ball Fighting','Ayuda a Goku a enfrentarse a todos los enemigos y a conseguir todas las Bolas de DragÃ³n escondidas. Â¡Realiza increÃ­bles combos! Juego para uno o dos jugadores.','http://localhost/upload/games/Dragon Ball Fighting.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/dragon_ball_fighting1.jpg','0','swf','',0,'0.0',0,'2014-03-26 21:52:55',1,1,'','dragon-ball-fighting',0,''),(44,'Alien Attack Team','Ãšnete al ejercito para aniquilar a los malvados alienÃ­genas que han atacado la tierra. Personaliza tu personaje y su armamento con multitud de mejoras y complementos para ser invencible. Â¡DestrÃºyelos a todos!','http://localhost/upload/games/Alien Attack Team.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/Aliens-Colonial-Marines-Escape-Mode2.jpeg','0','swf','',0,'0.0',0,'2014-03-26 21:58:04',1,1,'','alien-attack-team',0,''),(45,'Mass Mayhem Zombie','DespuÃ©s de que el mundo ha sido infectado con un virus mortal, todos se estÃ¡n convirtiendo en zombies. Pero un salvador se librarÃ¡ de esta plaga una vez por todas, Â¡ese eres tÃº! Protege tu bunker, mejora tus armas, pero lo mÃ¡s importante, Â¡mata a todos los zombies!','http://localhost/upload/games/Mass Mayhem Zombie.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/screen_mass_mayhem_zombie.jpg','0','swf','',0,'0.0',0,'2014-03-26 22:03:19',1,1,'','mass-mayhem-zombie',0,''),(46,'Wolverine Tokyo Fury','Ayuda Wolverine a luchar contra todos los ninjas que se esconden en los tejados de Tokio.','http://localhost/upload/games/Wolverine Tokyo Fury.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/wolverine-tokyo-fury.jpg','0','swf','',0,'0.0',0,'2014-03-26 22:07:01',1,1,'','wolverine-tokyo-fury',0,''),(47,'Penguinz','Ayuda a este pingÃ¼ino, que se cree Rambo, a acabar con todos los enemigos. DespuÃ©s de cada nivel podrÃ¡s comprar municiÃ³n y armas especiales.','http://localhost/upload/games/PENGUINZ.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/penguiz.jpg','0','swf','',0,'0.0',0,'2014-03-26 22:09:55',1,1,'','penguinz',0,''),(48,'Flash Sonic','Elige a Sonic, Tails, Knuckles o Cream, la velocidad de la saga de Sonic estÃ¡ asegurada.','http://localhost/upload/games/flash sonic.swf',2,0,0,1,'0','600','400','http://localhost/upload/games/images/ultimate-flash-sonic-icon-1.jpg','0','swf','',0,'0.0',0,'2014-04-01 15:51:07',1,1,'','flash-sonic',0,''),(49,'Sonic in Mario World 2','','http://localhost/upload/games/SONIC ON WORLD MARIO.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/sonic-lost-in-mario-world-2.jpg','0','swf','Completa 6 niveles en el mundo de Mario con el famoso erizo azul como protagonista. Es muy divertido mezclar dos grandes clÃ¡sicos',0,'0.0',0,'2014-04-01 15:55:53',1,1,'','sonic-in-mario-world-2',0,''),(50,'Adventures of Gyro Atoms 2','Vuelven las aventuras de este lince radiactivo. Explora 10 niveles y consigue vencer al malvado Dr Chill','http://localhost/upload/games/adventuresof gyro atoms.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/Gyro-Atoms-2.jpg','0','swf','',0,'0.0',0,'2014-04-01 15:59:44',1,1,'','adventures-of-gyro-atoms-2',0,''),(51,'Tribot Fighter','Controla este robot diseÃ±ado para la lucha. Sus tres formas distintas, te darÃ¡n diferentes opciones para encarar a tus enemigos. Â¡DestrÃºyelos a todos!','http://localhost/upload/games/tribot_fighter.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/tribot-fighter.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:07:08',1,1,'','tribot-fighter',0,''),(52,'Warzone Getaway 2','Aqui podras demostrar tu agilidad en los disparos y en defenderte de los enemigos. Disfrutalo!','http://localhost/upload/games/Warzone Getaway 2.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/Warzone Getaway 2.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:13:13',1,1,'','warzone-getaway-2',0,''),(53,'Warzone Getaway 3','Entretenido juego de armas, donde demostraras tu habilidad para disparar, ten cuidado. ','http://localhost/upload/games/Warzone Getaway 3.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/warzone-getaway-3.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:19:35',1,1,'','warzone-getaway-3',0,''),(54,'Blym','Blym acaba de descubrir un teletransportador alucinante. Â¿Por quÃ© no lo acompaÃ±as a explorar el universo?','http://localhost/upload/games/blym.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/blym.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:23:47',1,1,'','blym',0,''),(55,'Armed with Wings: Culmination','Â¡ContinÃºa la aventura! El rey ha entrado en cÃ³lera, su hÃ©roe ha caÃ­do. EmbÃ¡rcate en un Ãºltimo viaje para cumplir tu destino de recuperar el trono.','http://localhost/upload/games/Culmination.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/culmination.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:28:15',1,1,'','armed-with-wings-culmination',0,''),(56,'King of Fighters 2','Uno de los juegos de lucha mÃ¡s famosos del mundo ahora tiene una versiÃ³n en flash. Maneja a K\' y recuerda aquellos tiempos cuando jugabas a las recreativas.','http://localhost/upload/games/the kind of fighters 2.swf',2,0,1,1,'0','700','500','http://localhost/upload/games/images/king-fighters-2002-2003-2.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:34:40',1,1,'','king-of-fighters-2',0,''),(57,' Speedboat Shooting','Defiende la lancha de tu jefe, de los asesinos que pretenden matarlo antes de que pueda llegar a su destino. ContarÃ¡s con tus armas y algunas ayudas \"especiales\", como jefe de seguridad esta es tu responsabilidad asi que...Â¡buena suerte!','http://localhost/upload/games/SPEEDBOAT_SHOOTING.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/speedboat.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:39:21',1,1,'','-speedboat-shooting',0,''),(58,'Bang Heroes','El mal ha llegado al viejo Oeste, los bandidos y sus mÃ¡quinas de vapor se han hecho cargo de las ciudades fronterizas. Una antigua leyenda india predice que, cuando la oscuridad pone en peligro la tierra, Ã©sta aumentarÃ¡ de hÃ©roes. Â¿SerÃ¡s uno de ellos?','http://localhost/upload/games/bang.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/bangheroes.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:44:47',1,1,'','bang-heroes',0,''),(59,'Leila and the Magic Ball','Ayuda a la joven Leila a encontrar su camino de vuelta a casa usando una bola mÃ¡gica. LÃ¡nzala contra obstÃ¡culos y Ãºsala para subir a plataformas.','http://localhost/upload/games/Leila and the Magic Ball.swf',2,0,1,1,'0','700','500','http://localhost/upload/games/images/leilaandthemagicball.png','0','swf','',0,'0.0',0,'2014-04-01 16:48:35',1,1,'','leila-and-the-magic-ball',0,''),(60,'Marvel Tribute','Juego de lucha basado en los personajes de Marvel, elige a tu favorito como Wolverine, Ironman, Hulk, Spiderman o los X-Men. Completa el torneo y desbloquea nuevos personajes. Juego para uno o dos jugadores.','http://localhost/upload/games/marvel_tribute.swf',2,0,1,1,'0','700','500','http://localhost/upload/games/images/marvel.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:52:59',1,1,'','marvel-tribute',0,''),(61,'Mortal Kombat','Recuerda viejos tiempos con este famoso juego de lucha, elige un personaje y entra en el torneo. Que no se te olvide realizar los Fatalities con esos golpes tan violentos.','http://localhost/upload/games/mortal_combat.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/mortal_kombat.jpg','0','swf','',0,'0.0',0,'2014-04-01 16:57:49',1,1,'','mortal-kombat',0,''),(62,'King of Fighters 4','Elige a uno de los personajes de KOF o de Street Fighter y comienza el torneo. Demuestra lo que vales realizando increÃ­bles combos con tu luchador favorito. Juego para uno o dos jugadores.','http://localhost/upload/games/King of Fighters 4.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/king_of_fighter.jpg','0','swf','',0,'0.0',0,'2014-04-01 17:03:56',1,1,'','king-of-fighters-4',0,''),(63,'StoneAge Sam','GuÃ­a a este Hombre de Cro-Magnon a travÃ©s de grandes peligros, pulsa en el lugar adecuado del juego para seguir avanzando la aventura','http://localhost/upload/games/stoneage_sam.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/StoneageSam.jpg','0','swf','',0,'0.0',0,'2014-04-01 17:08:48',1,1,'','stoneage-sam',0,''),(64,'Flappy Birds','Entretenido y adictivo juego de un ave, demuestra que puedes controlarla. Suerte!!','http://localhost/upload/games/flappy_bird.swf',5,0,7,1,'0','300','450','http://localhost/upload/games/images/flappybirds.png','0','swf','',0,'5.0',0,'2014-04-01 17:23:31',1,1,'','flappy-birds',0,''),(65,'Basketball Championship','Juego de Bascketball, super entretenido, encesta lo mas que puedas y demuestra que eres el mejor','http://localhost/upload/games/basketball_chanpion.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Basketball-Championship.jpg','0','swf','',0,'0.0',1,'2014-04-01 17:39:26',1,1,'','basketball-championship',0,''),(66,'Big Head Football','Elige a tu jugador de fÃºtbol favorito y comienza el partido. El objetivo del juego es sencillo, meter mÃ¡s goles que tu contrincante. Juego para uno o dos jugadores.','http://localhost/upload/games/big_head_football.swf',2,0,0,1,'0','700','500','http://localhost/upload/games/images/big-head-football.jpg','0','swf','',0,'0.0',0,'2014-04-01 17:55:22',1,1,'','big-head-football',0,''),(67,'The Champions 4 - World Domination','Â¡Recrea un partido de la Champions! Elige los colores de tu equipo e intenta ser el grupo que mejor juega al fÃºtbol. Â¿EstÃ¡s preparado para marcar goles y defender tu porterÃ­a?','http://localhost/upload/games/the_champions_world.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/the-champions-4-world-domination.jpg','0','swf','',0,'0.0',0,'2014-04-01 18:00:50',1,1,'','the-champions-4-world-domination',0,''),(68,'4x4 Soccer','Â¿QuÃ© puede ser mÃ¡s excitante que el fÃºtbol? Â¡El fÃºtbol jugado a bordo de un todoterreno 4x4 por supuesto! Acelera a fondo y conduce hasta la victoria.','http://localhost/upload/games/4X4 soccer.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/4x4 soccer.jpg','0','swf','',0,'0.0',0,'2014-04-01 18:05:30',1,1,'','4x4-soccer',0,''),(69,'Zombie Soccer','Es la noche de Halloween y este pequeÃ±o zombie aprovecha la noche para jugar al fÃºtbol. Apunta bien y ayÃºdale a superar todos los obstÃ¡culos.','http://localhost/upload/games/zombies_soccer.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/zombies_soccer.jpg','0','swf','',0,'0.0',0,'2014-04-01 18:10:57',1,1,'','zombie-soccer',0,''),(70,'Cyclomaniacs','Â¡Mira al cielo! Â¡Es un pÃ¡jaro! Â¡Es un aviÃ³n! Â¡No, es un robot ciclista cayendo por un acantilado! Participa en esta carrera loca de bicis. Debes completar todas las misiones para desbloquear a 20 diferentes corredores.','http://localhost/upload/games/cyclomaniacs.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/cyclomaniacs_title.jpg','0','swf','',0,'0.0',0,'2014-04-01 18:17:53',1,1,'','cyclomaniacs',0,''),(71,'Baseball Team','Â¡El trabajo en equipo es todo en el bÃ©isbol!','http://localhost/upload/games/Baseball_team.swf',4,0,1,1,'0','700','500','http://localhost/upload/games/images/Baseball-Team.jpg','0','swf','Al batear haz clic en uno de los 9 cuadrados para que oscile y asÃ­ regular el golpe en el lanzamiento. Puedes alcanzar una base haciendo clic en el casco del mini mapa y en la siguiente base. Al lanzar, presta atenciÃ³n a la barra de potencia y haz clic en uno de los cuadrados para lanzar la pelota. Haz clic en las bases del mini mapa para lanzarla allÃ­.',0,'0.0',0,'2014-04-01 18:22:24',1,1,'','baseball-team',0,''),(72,'Baseball','Es el final de la novena; une tu equipo para ganar el juego con solo 3 outs.','http://localhost/upload/games/baseball.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Baseball.jpg','0','swf','',0,'0.0',0,'2014-04-01 18:30:04',1,1,'','baseball',0,''),(73,'Pinch Hittler 2','Elige a tu equipo favorito y compite en un divertido torneo de bÃ©isbol. Batea, corre a por la bola y sÃ© el mejor pitcher de todos.','http://localhost/upload/games/pinch_hittle_2.swf',4,0,2,1,'0','700','500','http://localhost/upload/games/images/Pinch Hitter 2.png','0','swf','RatÃ³n = mover\nBotÃ³n izquierdo del ratÃ³n = golpear',0,'0.0',0,'2014-04-01 18:36:19',1,1,'','pinch-hittler-2',0,''),(74,'Simpsons Bike Rally','Juego de los Simpsons donde estan haciendo competencias en bike. sÃºper entretenido!!!','http://localhost/upload/games/Simpsons Bike Rally.swf',4,0,3,1,'0','700','500','http://localhost/upload/games/images/Simpsons Bike Rally.jpg','0','swf','',0,'0.0',1,'2014-04-01 20:37:54',1,1,'','simpsons-bike-rally',0,''),(75,'TIROS DE GOLPE A LA PORTERÃA','Â¿Eres original? Â¡Este juego de hockey es tan original, que no tiene ni pista!','http://localhost/upload/games/Accurate Slapshot LP.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/accurate-slapshot-lp_2.jpg','0','swf','El hockey sobre hielo ya es difÃ­cil jugado en una pista. Si lo llevas para afuera descubrirÃ¡s un juego totalmente nuevo. Â¿Tienes lo que se precisa para lanzar el disco hacia la red en este increÃ­ble juego de fÃ­sica? Practica tu tiro de golpe intentando meter goles en cada uno de estos complicados niveles.\n\nClic izquierdo = Disparar \nMouse = Apuntar',0,'0.0',0,'2014-04-01 20:44:22',1,1,'','tiros-de-golpe-a-la-porterÃa',0,''),(76,'IStunt 2','IncreÃ­ble juego de Snowboard donde tendrÃ¡s toda la libertad para realizar trucos. Â¿SerÃ¡s capaz de llegar a la meta sin romperte ningÃºn hueso?','http://localhost/upload/games/IStunt 2.swf',4,0,1,1,'0','700','500','http://localhost/upload/games/images/iStunt2.jpg','0','swf','',0,'0.0',0,'2014-04-01 20:47:46',1,1,'','istunt-2',0,''),(77,'Ice Run','A estos pingÃ¼inos les encanta hacer carreras de snowboard sobre el hielo. Recolecta las estrellas amarillas y utiliza las azules como proyectiles contra los enemigos','http://localhost/upload/games/ice_run.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/ice_run.jpg','0','swf','',0,'0.0',0,'2014-04-01 20:53:18',1,1,'','ice-run',0,''),(78,'Moto Rush','Â¿Crees que puedes montar un oso? Entonces prepÃ¡rate para la adrenalina que te darÃ¡ esta loca carrera.','http://localhost/upload/games/Moto.swf',4,0,1,1,'0','700','500','http://localhost/upload/games/images/moto_rush.jpg','0','swf','',0,'0.0',0,'2014-04-01 20:58:04',1,1,'','moto-rush',0,''),(79,'Electro Hockey','Juego de Hockey super interesante y moderno. Disfrutalo!','http://localhost/upload/games/electro_hockey.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Electro Air Hockey.jpg','0','swf','',0,'0.0',0,'2014-04-01 21:02:13',1,1,'','electro-hockey',0,''),(80,'Mario Mini Golf','Juego de Golf de Mario. Super divertido Disfrutalo!!','http://localhost/upload/games/mario_mini_golf.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Mario-Mini-Golf.jpg','0','swf','',0,'0.0',0,'2014-04-01 21:07:08',1,1,'','mario-mini-golf',0,''),(81,'3d championship','Juego de simulacion de Golf en 3era Dimension. Demuestra que sabes de Golf!!!','http://localhost/upload/games/3d championship.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/3dchampionshipgolf.png','0','swf','',0,'0.0',0,'2014-04-01 21:12:19',1,1,'','3d-championship',0,''),(82,'Skateboard City','Â¡Completa estas misiones y dominarÃ¡s el mundo del skateboard!','http://localhost/upload/games/skateboarding_city.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Skateboard_city.png','0','swf','Izquierda/derecha = patinar hacia la izquierda/derecha\nArriba/abajo = acelerar/frenar\nBarra espaciadora = saltar\nZ = hacer trucos',0,'0.0',0,'2014-04-01 21:27:55',1,1,'','skateboard-city',0,''),(83,'Bart SkateBoarding','Bart Simpson tiene ganas de patinar todo el dÃ­a, pero necesita tu ayuda para no chocar con ningÃºn obstÃ¡culo. Consigue llegar lo mÃ¡s lejos posible.','http://localhost/upload/games/bart_skateboard.swf',4,0,1,1,'0','700','500','http://localhost/upload/games/images/bart_skateboarding.jpg','0','swf','',0,'0.0',1,'2014-04-01 21:34:09',1,1,'','bart-skateboarding',0,''),(84,'Raid Air','Echa un uno contra uno en este juego de baloncesto. Elige tu jugador y lÃºcete haciendo mates.','http://localhost/upload/games/Raid Air.swf',4,0,1,1,'0','700','500','http://localhost/upload/games/images/Raid-Air.jpg','0','swf','',0,'0.0',1,'2014-04-01 21:39:56',1,1,'','raid-air',0,''),(85,'Dragon Ball Football','Elige tu equipo con los personajes de Dragon Ball y prepara un partido de fÃºtbol en el jardÃ­n del duende tortuga. Juego para uno o dos jugadores','http://localhost/upload/games/Dragon Ball Fighting.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/dragon-ball-fooball.swf','0','swf','',0,'0.0',0,'2014-04-01 21:46:25',2,1,'','dragon-ball-football',0,''),(86,'Billiard Blitz Hustle','Â¿Te apetece jugar al billar? Demuestra tu punterÃ­a y gana a todos tus oponentes deshaciÃ©ndote de todas las bolas en la mayor brevedad posible.','http://localhost/upload/games/Billiard Blitz Hustle.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Billiard Blitz Hustle.jpg','0','swf','',0,'0.0',0,'2014-04-06 03:08:34',1,1,'','billiard-blitz-hustle',0,''),(87,'Goosy Pool','Â¿SerÃ¡s capaz de meter todas las bolas sin fallar ni un solo tiro? apunta bien y pasa un buen rato jugando al billar.','http://localhost/upload/games/Goosy Pool.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Goosy Pool.jpg','0','swf','',0,'0.0',0,'2014-04-06 03:13:28',1,1,'','goosy-pool',0,''),(88,'Deluxe pool','Para jugar al Billar necesitas precisiÃ³n y velocidad para lograr el Ã©xito. Â¿Tienes lo que hace falta? Para uno o dos jugadores.','http://localhost/upload/games/deluxe pool.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/deluxe-pool.jpg','0','swf','',0,'0.0',0,'2014-04-06 03:19:10',1,1,'','deluxe-pool',0,''),(89,'Big Diamond 2','Golpea las bolas con tu esfera dorada sin salirte del tablero. Tienes un numero limitado de tiros en cada nivel. Usa el ratÃ³n para dirigir el tiro y la potencia de disparo.','http://localhost/upload/games/Big Diamond 2.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/big-diamond-2-big.jpg','0','swf','',0,'0.0',0,'2014-04-06 03:28:31',1,1,'','big-diamond-2',0,''),(90,'Pandemonium Pool','AquÃ­ tenemos un fantÃ¡stico juego de billar, que cuenta con infinitos modos de juego. AdemÃ¡s, podrÃ¡s disfrutar de fondos diferentes al clÃ¡sico verde de una mesa de pool. Se juega con el ratÃ³n.','http://localhost/upload/games/Pandemonium Pool.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/pandemonium_pool180.jpg','0','swf','',0,'0.0',0,'2014-04-06 03:33:39',1,1,'','pandemonium-pool',0,''),(91,'Lightning Pool 2','Tienes un tiempo lÃ­mite para colar todas las bolas en este juego de billar, recoge los bonus que van apareciendo sobre la mesa.','http://localhost/upload/games/Lightning Pool 2.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Lightning Pool 2.jpg','0','swf','',0,'0.0',0,'2014-04-06 03:40:10',1,1,'','lightning-pool-2',0,''),(92,'Crazy Pool 2','Demuestra tu habilidad con la segunda entrega de este juego donde deberÃ¡s hacer desparecer todas las bolas de la mesa usando la bola blanca. Juega con el ratÃ³n.','http://localhost/upload/games/Crazy Pool 2.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/tn_crazy-pool-2.jpg','0','swf','',0,'0.0',0,'2014-04-06 03:51:40',1,1,'','crazy-pool-2',0,''),(93,'Parkour Master','La gran ciudad estÃ¡ llena de obstÃ¡culos. Es perfecta para un amante del parkour. Demuestra tu habilidad haciendo multitud de acrobacias y recupera energÃ­a con bebidas a lo largo del camino.','http://localhost/upload/games/Parkour Master.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/parkour_master.jpg','0','swf','',0,'0.0',0,'2014-04-06 03:57:38',1,1,'','parkour-master',0,''),(94,'bmx extreme','Haz trucos sobre tu bici y Â¡gana puntos!','http://localhost/upload/games/bmx extreme.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/bmxextreme.jpg','0','swf','Flecha hacia arriba = mover adelante \nFlecha hacia abajo = voltear lateralmente \nFlecha izquierda = voltear con la rueda trasera \nZ = volteo de superman \nC = volteo de batman \nX = girar la rueda',0,'0.0',0,'2014-04-06 04:01:01',1,0,'','bmx-extreme',0,''),(95,'Bugs Bunny Biking','Â¡Vive esta divertida aventura con el conejo mÃ¡s famoso! Ayuda a Bugs Bunny a llegar al final del camino montado en su bicicleta. Ten mucho cuidado con los precipicios. Usa las flechas para conducir.','http://localhost/upload/games/Bugs Bunny Biking.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Bugs-Bunny-Biking1.png','0','swf','',0,'0.0',0,'2014-04-06 04:07:45',1,1,'','bugs-bunny-biking',0,''),(96,'GrandSlam Tennis','Â¡Gana todos los principales torneos y conquista el Grand Slam!','http://localhost/upload/games/GrandSlam Tennis.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/GrandSlam Tennis.jpg','0','swf','',0,'0.0',0,'2014-04-06 04:21:21',1,1,'','grandslam-tennis',0,''),(97,'Big Bird Racing ',' Varios tipos de carreras con grandes pÃ¡jaros. Consigue llegar el primero y saltar todos los obstaculos. ','http://localhost/upload/games/Big Bird Racing.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/big-Big_Birds_Racing.jpg','0','swf','Pueden jugar hasta 4 jugadores, moviendose cada uno con una tecla. Player 1: M, Player 2: Q, Player 3: M, Player 4: P',0,'0.0',0,'2014-04-06 04:28:32',1,1,'','big-bird-racing-',0,''),(98,'Goal Africa 2012','Â¿Quieres ganar la copa del mundo de SudÃ¡frica? Elige tu selecciÃ³n de fÃºtbol favorita y vence al resto de equipos.','http://localhost/upload/games/Goal Africa 2012.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/Goal-Africa-2012.jpg','0','swf','MuÃ©vete con los cursores, pulsa la \"A\" para pasar el balÃ³n y la \"S\" para disparar',0,'0.0',0,'2014-04-06 04:37:03',1,1,'','goal-africa-2012',0,''),(99,'Crystal Loid','Variante del Tetris, en que tu objetivo es agrupar 3 bloques del mismo color para que desaparezcan.','http://localhost/upload/games/Crystal Loid.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/crystalloid-juego-tetris-columns-game.jpg','0','swf','Flechas derecha/izquierda para mover horizontalmente, flecha arriba para rotarla, flecha abajo para hacerla bajar.',0,'0.0',0,'2014-04-10 20:39:38',1,1,'','crystal-loid',0,''),(100,'Castaway 2','Sigues varado en una isla misteriosa y depende de ti salir de allÃ­ con vida. EmbÃ¡rcate en un viaje que te llevarÃ¡ a travÃ©s de terrenos vastos, completando misiones y luchando contra enormes jefes. Los animales domÃ©sticos de la isla te ayudarÃ¡n en la lucha, utiliza sus habilidades Ãºnicas.','http://localhost/upload/games/Castaway 2.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/castaway-2.jpg','0','swf','',0,'0.0',0,'2014-04-10 20:43:37',1,1,'','castaway-2',0,''),(101,'Patchworkz!','Resuelve el puzzle encajando los trozos en el dibujo.','http://localhost/upload/games/Patchworkz!.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/patchworkz_screenbig1.jpg','0','swf','Utiliza el ratÃ³n en este juego.',0,'0.0',0,'2014-04-10 20:53:44',1,1,'','patchworkz!',0,''),(102,'Rome Puzzle','Combina tres o mÃ¡s piezas iguales en la misma fila o columna. Al acabar el nivel recaudarÃ¡s dinero para empezar a crear la antigua ciudad de Roma.','http://localhost/upload/games/Rome Puzzle.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/Rome Puzzle.jpg','0','swf','',0,'0.0',0,'2014-04-10 20:58:19',1,1,'','rome-puzzle',0,''),(103,'Means War','\"This Means War\" - Juego parecido al Worms pero con gatos como protagonistas. No pierdas la batalla. Juego para uno o dos jugadores.','http://localhost/upload/games/Means War.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/Means-War.jpg','0','swf','',0,'0.0',0,'2014-04-10 21:05:47',1,1,'','means-war',0,''),(104,'Domino','Â¡El clÃ¡sico juego de dominÃ³ que tantas horas te entretuvo de chico!','http://localhost/upload/games/Domino.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/Domino.jpg','0','swf','',0,'0.0',0,'2014-04-10 21:10:59',1,1,'','domino',0,''),(105,'StarBall','Divertido y novedoso juego con aires.','http://localhost/upload/games/star ball.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/star_ball.jpg','0','swf','Utiliza el ratÃ³n para guiar la barra y no dejar que la bola caiga.',0,'0.0',0,'2014-04-10 21:15:17',1,1,'','starball',0,''),(106,'Golf Solitaire','Queda absorbido en esta adictiva versiÃ³n del juego de cartas, el solitario.','http://localhost/upload/games/Golf Solitaire.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/golf-solitaire.jpg','0','swf','Haz clic para colocar una carta correlativa a la carta expuesta en el mazo, o saca una nueva carta. Â¡Intenta que todas las cartas acaben en el mazo!',0,'0.0',0,'2014-04-10 21:25:43',1,1,'','golf-solitaire',0,''),(111,'Rise of Atlantis','Conquista los diferentes territorios del mediterrÃ¡neo haciendo combinar los distintos objetos.','http://localhost/upload/games/rise_of_atlantis.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/Rise of Atlantis.jpg','0','swf','',0,'0.0',0,'2014-04-10 21:50:42',1,1,'','rise-of-atlantis',0,''),(108,'Drop Dlocks!','El objetivo de este juego es eliminar a todos los gigantes lanzÃ¡ndoles diferentes tipos de humanos que serÃ¡ tu municiÃ³n. Â¡Consigue dominar el mundo! Juego al estilo Worms.','http://localhost/upload/games/Drop Blocks!.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/drop_blocks.jpg','0','swf','',0,'0.0',0,'2014-04-10 21:36:31',1,1,'','drop-dlocks!',0,''),(109,'Svetlograd','VersiÃ³n del clÃ¡sico Zuma, completa todos los niveles eliminando todas las bolas de colores','http://localhost/upload/games/Svetlograd.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/zuma-svetlograd.jpg','0','swf','',0,'0.0',0,'2014-04-10 21:41:59',1,1,'','svetlograd',0,''),(110,'Bad Ice-Cream','Elige tu sabor de helado favorito y comienza el juego recogiendo todas las frutas de cada nivel mientras esquivas a los enemigos creando barreras de cubitos de hielo. Juego para uno o dos jugadores.','http://localhost/upload/games/Bad Ice-Cream.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/bad_ice-cream_screen1.jpg','0','swf','',0,'0.0',0,'2014-04-10 21:45:54',1,1,'','bad-ice-cream',0,''),(112,'Ghost Fighter','Divertido clon del Bubble Bobble o Snow Bros, pero con los cazafantasmas, tienes que capturar fantasmas, moustros o esqueletos, tipo Snowbros.','http://localhost/upload/games/Ghost Fighter.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/Ghost-Fighter.jpg','0','swf','',0,'0.0',0,'2014-04-10 21:56:19',1,1,'','ghost-fighter',0,''),(113,'Flash Ludo','Remake de un clasico juego de mesa tipo el parchis! Tira el dado y mueve tus fichas de ludo para llegar a la meta antes que los demas!','http://localhost/upload/games/flash ludo.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/flashludo.jpg','0','swf','',0,'0.0',0,'2014-04-10 22:00:16',1,1,'','flash-ludo',0,''),(114,'Super Mario 63','Espectacular versiÃ³n en flash de Super Mario. Completa todos niveles recogiendo moneditas y acabando con los enemigos.','http://localhost/upload/games/supermario64.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/Super-Mario-63_2.jpg','0','swf','',0,'0.0',0,'2014-04-10 22:06:30',1,1,'','super-mario-63',0,''),(115,'Super Mario 3','Â¡Mario estÃ¡ preparado para nuevas aventuras! Ayuda a Mario a recoger todas las estrellas de cada nivel para derrotar al malvado Bowser y asÃ­ salvar el Reino de los ChampiÃ±ones.','http://localhost/upload/games/Super Mario 3.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/Super-Mario-63_2.jpg','0','swf','',0,'0.0',0,'2014-04-10 22:11:40',1,1,'','super-mario-3',0,''),(116,'Mario Combat','En esta versiÃ³n de Mario deberÃ¡s adentrarte en el castillo de Bowser y acabar con Ã©l y su ejÃ©rcito de tortugas. MuÃ©vete con los cursores y la A para golpear.','http://localhost/upload/games/Mario Combat.swf',2,0,1,1,'0','700','500','http://localhost/upload/games/images/mariocombat.jpg','0','swf','',0,'0.0',0,'2014-04-10 22:17:09',1,1,'','mario-combat',0,''),(117,'Super Mario Bros 2','Explora los mundos de Mario de antaÃ±o en este clÃ¡sico retro de los 80.','http://localhost/upload/games/Super Mario Bros 2.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/Super-Mario-Bros-2.jpg','0','swf','',0,'0.0',0,'2014-04-10 22:22:39',1,1,'','super-mario-bros-2',0,''),(118,'Toki','Este fue uno de los juegos de plataformas para las recreativas de 1989. La princesa Mohio es raptada por el malvado doctor Vookimedlo y te ha convertido en un primate. Acaba con todos los enemigos y dirÃ­gete al castillo dorado para rescatarla.','http://localhost/upload/games/TOKI.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/toki.png','0','swf','',0,'0.0',0,'2014-04-10 22:28:17',1,1,'','toki',0,''),(119,'Woobies','Â¡Estas adorables bolitas de pelo estÃ¡n atrapadas! Â¡LibÃ©ralas con tu punterÃ­a y sÃ© el hÃ©roe de los Woobies!','http://localhost/upload/games/woobies.swf',6,0,0,1,'0','700','500','http://localhost/upload/games/images/woobies.jpg','0','swf','RatÃ³n = apuntar\nClic = disparar\n\nConecta al menos 3 Woobies del mismo color para que puedan salir volando.\nLas bombas Woobie negras liberan a todos los Woobies que toquen. ConseguirÃ¡s una bomba si haces 5 combos consecutivos y al conseguir 15.000 puntos. Las bombas que ya se encuentren en el campo de juego explotarÃ¡n cuando otro Woobie las golpee.\nConseguirÃ¡s una vida extra cada 100.000 puntos.',0,'0.0',0,'2014-04-10 22:31:57',1,1,'','woobies',0,''),(120,'Flash Chess','Juega al Ajedrez contra un Pentium II o si te crees que eres el maestro intÃ©ntalo contra un Pentium III.','http://localhost/upload/games/Flash Chess.swf',4,0,0,1,'0','700','500','http://localhost/upload/games/images/flash-chess-game (1).jpg','0','swf','',0,'0.0',0,'2014-04-10 22:37:08',1,1,'','flash-chess',0,'');

/*Table structure for table `ava_highscores` */

DROP TABLE IF EXISTS `ava_highscores`;

CREATE TABLE `ava_highscores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game` int(5) DEFAULT NULL,
  `user` int(5) DEFAULT NULL,
  `score` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `leaderboard` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game` (`game`),
  KEY `user` (`user`),
  KEY `leaderboard` (`leaderboard`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_highscores` */

/*Table structure for table `ava_kongregate` */

DROP TABLE IF EXISTS `ava_kongregate`;

CREATE TABLE `ava_kongregate` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `k_id` int(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `width` int(4) NOT NULL,
  `height` int(4) NOT NULL,
  `author` varchar(60) NOT NULL,
  `category` varchar(40) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '0',
  `instructions` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gametag` (`k_id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_kongregate` */

/*Table structure for table `ava_leaderboards` */

DROP TABLE IF EXISTS `ava_leaderboards`;

CREATE TABLE `ava_leaderboards` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(5) NOT NULL,
  `leaderboard_id` varchar(120) NOT NULL,
  `leaderboard_name` varchar(30) NOT NULL,
  `data_type` varchar(10) NOT NULL,
  `order_by` char(4) NOT NULL,
  `label` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`),
  KEY `leaderboard_id` (`leaderboard_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_leaderboards` */

/*Table structure for table `ava_links` */

DROP TABLE IF EXISTS `ava_links`;

CREATE TABLE `ava_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL,
  `sitewide` varchar(10) NOT NULL,
  `published` char(1) NOT NULL,
  `inbound` int(11) NOT NULL,
  `outbound` int(11) NOT NULL,
  `submitter` int(11) NOT NULL,
  `submitter_email` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ava_links` */

insert  into `ava_links`(`id`,`name`,`url`,`description`,`sitewide`,`published`,`inbound`,`outbound`,`submitter`,`submitter_email`) values (1,'AV Scripts','','The home of AV Arcade','1','1',0,0,0,'');

/*Table structure for table `ava_messages` */

DROP TABLE IF EXISTS `ava_messages`;

CREATE TABLE `ava_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` text NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `date` text NOT NULL,
  `read` int(1) NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL,
  `highscore_game_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_messages` */

/*Table structure for table `ava_mochi` */

DROP TABLE IF EXISTS `ava_mochi`;

CREATE TABLE `ava_mochi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `gametag` varchar(50) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `width` varchar(4) NOT NULL,
  `height` varchar(4) NOT NULL,
  `author` varchar(60) NOT NULL,
  `author_link` varchar(255) NOT NULL,
  `category` varchar(40) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '0',
  `instructions` text NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `tags` varchar(200) NOT NULL,
  `highscores` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gametag` (`gametag`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_mochi` */

/*Table structure for table `ava_news` */

DROP TABLE IF EXISTS `ava_news`;

CREATE TABLE `ava_news` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `user` int(5) NOT NULL,
  `date` text NOT NULL,
  `image` text NOT NULL,
  `seo_url` varchar(100) NOT NULL,
  `meta_tags` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ava_news` */

insert  into `ava_news`(`id`,`title`,`content`,`user`,`date`,`image`,`seo_url`,`meta_tags`) values (3,'Welcome to our new arcade','<p>Welcome to our new arcade website built with AV Arcade!</p>',1,'March 16 2014','site_news.png','welcome-to-our-new-arcade','new site, welcome, arcade news');

/*Table structure for table `ava_news_comments` */

DROP TABLE IF EXISTS `ava_news_comments`;

CREATE TABLE `ava_news_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `link_id` varchar(10) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_id` (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_news_comments` */

/*Table structure for table `ava_pages` */

DROP TABLE IF EXISTS `ava_pages`;

CREATE TABLE `ava_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `page` text NOT NULL,
  `menu` tinyint(1) NOT NULL,
  `seo_url` varchar(100) NOT NULL,
  `meta_tags` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_pages` */

/*Table structure for table `ava_playtomic` */

DROP TABLE IF EXISTS `ava_playtomic`;

CREATE TABLE `ava_playtomic` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `gametag` varchar(50) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `width` int(4) NOT NULL,
  `height` int(4) NOT NULL,
  `author` varchar(60) NOT NULL,
  `author_link` varchar(255) NOT NULL,
  `category` varchar(40) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '0',
  `instructions` text NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `tags` varchar(200) NOT NULL,
  `highscores` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gametag` (`gametag`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_playtomic` */

/*Table structure for table `ava_posts` */

DROP TABLE IF EXISTS `ava_posts`;

CREATE TABLE `ava_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_content` text,
  `topic` int(11) DEFAULT NULL,
  `first_post` int(11) DEFAULT '0',
  `date` int(11) DEFAULT NULL,
  `edit_time` int(11) DEFAULT '0',
  `username` varchar(80) DEFAULT NULL,
  `edit_username` varchar(80) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` char(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic` (`topic`),
  FULLTEXT KEY `post_content` (`post_content`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_posts` */

/*Table structure for table `ava_ratings` */

DROP TABLE IF EXISTS `ava_ratings`;

CREATE TABLE `ava_ratings` (
  `game_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `rating` char(1) NOT NULL,
  `ip` char(15) NOT NULL,
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_ratings` */

insert  into `ava_ratings`(`game_id`,`user_id`,`rating`,`ip`) values ('64','1','5','127.0.0.1'),('22','1','5','::1');

/*Table structure for table `ava_reported` */

DROP TABLE IF EXISTS `ava_reported`;

CREATE TABLE `ava_reported` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `report` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_reported` */

/*Table structure for table `ava_seonames` */

DROP TABLE IF EXISTS `ava_seonames`;

CREATE TABLE `ava_seonames` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seo_name` varchar(255) NOT NULL,
  `type` varchar(40) DEFAULT NULL,
  `uses` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

/*Data for the table `ava_seonames` */

insert  into `ava_seonames`(`id`,`seo_name`,`type`,`uses`) values (1,'turn-based-battle','game',1),(2,'shift','game',1),(3,'default-category','category',1),(4,'welcome-to-our-new-arcade','news',1),(5,'coches','category',2),(6,'paintball-racers','game',2),(7,'renegade-racing','game',1),(8,'rich-cars-2','game',1),(9,'stunt-master','game',1),(10,'uphill-rush-6','game',1),(11,'uphill-rush-5','game',1),(12,'fmx-team','game',1),(13,'moto-run','game',1),(14,'vehicles-2','game',1),(15,'v8-muscle-cars','game',1),(16,'monster-truck-demolisher','game',1),(17,'formula-racer','game',1),(18,'create-a-ride','game',1),(19,'monster-racer-3d','game',1),(20,'tractors-power-2','game',1),(21,'new-york-taxi-3d','game',2),(22,'mining-truck','game',1),(23,'solid-racer','game',1),(24,'truck-mania','game',1),(25,'red-driver-3','game',1),(26,'street-racer','game',1),(27,'offroaders','game',1),(28,'mario-go-kart','game',1),(29,'animal-dash','game',1),(30,'war-machine','game',1),(31,'alex-trax','game',1),(32,'neon-rider','game',1),(33,'jetski-mario','game',1),(34,'coaster-racer','game',1),(35,'rush-hour-motocross','game',1),(36,'tt-racer','game',1),(37,'accion-','category',1),(38,'destructo-dog-2','game',1),(39,'crazy-penguin-catapult','game',1),(40,'papa-louie','game',1),(41,'eb2','game',1),(42,'dirk-valentine','game',1),(43,'cactus-mccoy-2','game',1),(44,'carreras','category',1),(45,'gun-mayhem-2','game',1),(46,'-undercover-ops','game',1),(47,'strike-force-heroes','game',1),(48,'dragon-ball-fighting','game',1),(49,'alien-attack-team','game',1),(50,'mass-mayhem-zombie','game',1),(51,'wolverine-tokyo-fury','game',1),(52,'penguinz','game',1),(53,'flash-sonic','game',1),(54,'sonic-in-mario-world-2','game',1),(55,'adventures-of-gyro-atoms-2','game',1),(56,'tribot-fighter','game',1),(57,'warzone-getaway-2','game',1),(58,'warzone-getaway-3','game',1),(59,'blym','game',1),(60,'armed-with-wings-culmination','game',1),(61,'king-of-fighters-2','game',1),(62,'-speedboat-shooting','game',1),(63,'bang-heroes','game',1),(64,'leila-and-the-magic-ball','game',1),(65,'marvel-tribute','game',1),(66,'mortal-kombat','game',1),(67,'king-of-fighters-4','game',1),(68,'stoneage-sam','game',1),(69,'deportes','category',1),(70,'aventura','category',1),(71,'flappy-birds','game',1),(72,'basketball-championship','game',1),(73,'big-head-football','game',1),(74,'the-champions-4-world-domination','game',1),(75,'4x4-soccer','game',1),(76,'zombie-soccer','game',1),(77,'cyclomaniacs','game',1),(78,'baseball-team','game',1),(79,'baseball','game',1),(80,'pinch-hittler-2','game',1),(81,'simpsons-bike-rally','game',1),(82,'tiros-de-golpe-a-la-porterÃa','game',1),(83,'istunt-2','game',1),(84,'ice-run','game',1),(85,'moto-rush','game',1),(86,'electro-hockey','game',1),(87,'mario-mini-golf','game',1),(88,'3d-championship','game',1),(89,'skateboard-city','game',1),(90,'bart-skateboarding','game',1),(91,'raid-air','game',1),(92,'dragon-ball-football','game',1),(93,'billiard-blitz-hustle','game',1),(94,'goosy-pool','game',1),(95,'deluxe-pool','game',1),(96,'big-diamond-2','game',1),(97,'pandemonium-pool','game',1),(98,'lightning-pool-2','game',1),(99,'crazy-pool-2','game',1),(100,'parkour-master','game',1),(101,'bmx-extreme','game',1),(102,'bugs-bunny-biking','game',1),(103,'grandslam-tennis','game',1),(104,'big-bird-racing-','game',1),(105,'goal-africa-2012','game',1),(106,'clÃ¡sicos','category',1),(107,'crystal-loid','game',1),(108,'castaway-2','game',1),(109,'patchworkz!','game',1),(110,'rome-puzzle','game',1),(111,'means-war','game',1),(112,'domino','game',1),(113,'starball','game',1),(114,'golf-solitaire','game',1),(115,'drop-blocks!','game',1),(116,'drop-dlocks!','game',1),(117,'svetlograd','game',1),(118,'bad-ice-cream','game',1),(119,'rise-of-atlantis','game',1),(120,'ghost-fighter','game',1),(121,'flash-ludo','game',1),(122,'super-mario-63','game',1),(123,'super-mario-3','game',1),(124,'mario-combat','game',1),(125,'super-mario-bros-2','game',1),(126,'toki','game',1),(127,'woobies','game',1),(128,'flash-chess','game',1);

/*Table structure for table `ava_settings` */

DROP TABLE IF EXISTS `ava_settings`;

CREATE TABLE `ava_settings` (
  `name` varchar(20) NOT NULL,
  `value` varchar(240) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_settings` */

insert  into `ava_settings`(`name`,`value`) values ('site_name','juegosfild'),('site_url','http://localhost/upload'),('template_url','/templates/macaw'),('facebook_on','0'),('adsense','0'),('cat_numbers','0'),('seo_on','3'),('email_on','0'),('add_to_site','0'),('plays','10'),('language','Espanol'),('featured_games','1'),('play_limit','0'),('site_description','Welcome to juegosfild, home to all the best games!'),('site_keywords','games, arcade'),('admin_email','jesusfsg06@gmail.com'),('seo_extension',''),('default_ad','0'),('skip_ads','1'),('use_captcha','0'),('captcha_pubkey',''),('captcha_privkey',''),('points_play','2'),('points_rate','5'),('points_comment','10'),('points_refer','50'),('points_report','15'),('points_submission','500'),('points_highscore','10'),('points_challenge','0'),('facebook_appid',''),('facebook_secret',''),('user_ads','3'),('report_permissions','1'),('module_thumbs','1'),('default_leaderboard','0'),('default_banner','0'),('default_square','0'),('version','5.7'),('site_offline','0'),('offline_message','We are down for maintenance right now, back soon!'),('fullscreen_mode','1'),('homepage_order','random'),('submissions_folder','games/submissions'),('allow_submissions','1'),('date_format','Y-m-d'),('link_exchange','1'),('all_games','1'),('email_template','default'),('abg_countdown','30'),('email_notifications','1'),('use_qa_captcha','0'),('qa_captcha_question','Captcha Question: What country is New York in?'),('qa_captcha_answers','america, usa, united states, united states of america, 1'),('use_mb_strlen','0'),('forums_installed','0'),('flood_control_time','120'),('points_forum_post','10'),('points_forum_topic','20'),('point_spam_time','120'),('allow_double_posts','0'),('double_post_time','3600'),('posts_per_page','10'),('topics_per_page','20'),('forum_template','default');

/*Table structure for table `ava_spil` */

DROP TABLE IF EXISTS `ava_spil`;

CREATE TABLE `ava_spil` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `spil_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `width` int(4) NOT NULL,
  `height` int(4) NOT NULL,
  `author` varchar(60) NOT NULL,
  `author_link` varchar(255) NOT NULL,
  `category` varchar(40) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '0',
  `instructions` text NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `tags` varchar(200) NOT NULL,
  `highscores` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gametag` (`spil_id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_spil` */

/*Table structure for table `ava_submissions` */

DROP TABLE IF EXISTS `ava_submissions`;

CREATE TABLE `ava_submissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `instructions` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `width` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_submissions` */

/*Table structure for table `ava_tag_relations` */

DROP TABLE IF EXISTS `ava_tag_relations`;

CREATE TABLE `ava_tag_relations` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(5) NOT NULL,
  `tag_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=489 DEFAULT CHARSET=latin1;

/*Data for the table `ava_tag_relations` */

insert  into `ava_tag_relations`(`id`,`game_id`,`tag_id`) values (1,8,1),(2,8,2),(3,9,3),(4,9,4),(5,10,5),(6,10,6),(100,11,5),(99,11,4),(98,11,7),(10,12,8),(11,12,5),(12,12,4),(13,13,9),(14,13,10),(15,13,4),(112,14,12),(111,14,11),(110,14,10),(19,15,13),(20,15,14),(21,15,5),(22,15,4),(23,16,4),(24,16,5),(25,16,15),(106,17,4),(105,17,5),(104,17,16),(103,18,4),(102,18,5),(101,18,16),(32,19,17),(33,19,18),(34,20,3),(35,20,4),(36,20,2),(109,21,20),(108,21,19),(107,21,17),(40,22,4),(41,22,10),(42,22,21),(43,22,14),(44,23,21),(45,23,22),(46,23,5),(47,23,4),(48,24,23),(49,24,4),(50,24,24),(51,25,25),(52,25,5),(53,25,4),(54,26,26),(55,26,4),(56,27,10),(57,27,27),(58,27,4),(59,27,28),(60,28,29),(61,28,4),(62,28,28),(63,28,30),(64,29,31),(65,29,4),(66,29,10),(67,30,25),(68,30,4),(69,30,32),(70,31,5),(71,31,4),(72,31,33),(97,32,2),(96,32,28),(95,32,3),(94,33,33),(93,33,34),(92,33,4),(91,33,3),(80,34,35),(81,34,36),(82,34,37),(83,35,38),(84,36,39),(85,36,40),(86,38,41),(87,38,42),(88,39,43),(89,39,41),(90,39,37),(113,40,44),(114,40,45),(115,40,46),(209,41,36),(208,41,47),(207,42,48),(206,42,28),(205,42,44),(204,43,52),(203,43,51),(202,43,50),(201,43,49),(200,43,48),(199,43,44),(198,44,56),(197,44,55),(196,44,54),(195,44,53),(194,44,44),(193,45,61),(192,45,60),(191,45,59),(190,45,58),(189,45,57),(188,45,56),(187,45,44),(172,46,63),(171,46,62),(170,46,58),(169,46,53),(168,46,44),(155,47,38),(154,47,65),(153,47,56),(152,47,26),(151,47,64),(150,47,44),(210,48,44),(211,48,53),(212,48,66),(213,48,67),(214,49,44),(215,49,53),(216,49,66),(217,49,68),(218,49,67),(219,50,44),(220,50,69),(221,50,53),(222,51,44),(223,51,48),(224,51,70),(225,52,71),(226,52,72),(227,52,73),(228,53,72),(229,53,73),(230,54,69),(231,54,74),(232,54,75),(233,54,28),(234,55,44),(235,55,69),(236,56,44),(237,56,48),(238,56,66),(239,57,44),(240,57,48),(241,57,54),(242,57,56),(243,57,76),(244,57,77),(245,57,78),(246,58,44),(247,59,44),(248,59,28),(249,59,53),(250,60,44),(251,60,48),(252,60,58),(253,61,44),(254,61,48),(255,61,66),(256,62,44),(257,62,48),(258,62,49),(259,62,79),(260,62,80),(261,62,81),(262,63,69),(274,64,83),(273,64,82),(272,64,40),(275,65,84),(276,65,85),(277,65,86),(278,66,84),(279,66,49),(280,66,87),(281,67,84),(282,67,28),(283,67,88),(284,68,10),(285,68,84),(286,68,89),(287,68,90),(288,69,84),(289,69,91),(290,69,92),(291,69,58),(292,69,90),(293,69,93),(294,69,94),(295,70,84),(296,70,95),(297,70,4),(298,70,58),(299,70,96),(300,71,97),(301,71,84),(302,71,98),(303,72,97),(304,72,84),(305,72,98),(306,73,99),(307,73,97),(308,73,84),(309,74,100),(310,74,29),(311,74,84),(312,75,75),(313,75,28),(314,75,84),(315,75,101),(316,76,84),(317,76,28),(318,76,102),(319,77,103),(320,77,104),(321,77,84),(322,77,101),(323,78,3),(324,78,4),(325,79,105),(326,79,106),(327,80,25),(328,80,107),(329,80,84),(330,81,107),(331,81,108),(332,81,14),(333,81,84),(334,82,109),(335,82,84),(336,82,110),(337,83,84),(338,83,28),(339,83,58),(340,83,111),(341,83,100),(342,83,112),(343,84,84),(344,84,113),(354,85,52),(353,85,50),(352,85,51),(351,85,49),(350,85,84),(355,86,84),(356,86,28),(357,86,114),(358,87,84),(359,87,114),(360,87,115),(361,88,84),(362,88,49),(363,88,114),(364,88,115),(365,89,115),(366,89,84),(367,89,114),(368,90,114),(369,90,115),(370,90,49),(371,91,84),(372,91,28),(373,91,114),(374,91,115),(375,92,114),(376,92,115),(377,92,49),(378,93,84),(379,93,28),(380,93,102),(381,94,116),(382,94,117),(383,94,95),(384,94,118),(385,94,84),(386,95,29),(387,95,119),(388,95,120),(389,96,121),(390,96,122),(391,97,123),(392,97,124),(393,98,125),(394,98,126),(395,98,127),(396,99,128),(397,99,79),(398,100,79),(399,100,129),(400,100,40),(401,101,130),(402,101,79),(403,101,131),(404,102,36),(405,102,132),(406,102,133),(407,103,44),(408,103,64),(409,103,28),(410,103,49),(411,103,26),(412,103,134),(413,103,135),(414,104,136),(415,105,137),(416,105,138),(417,105,139),(418,105,28),(419,106,136),(420,106,140),(421,106,141),(442,111,150),(441,111,36),(424,108,44),(425,108,64),(426,108,28),(427,108,26),(428,108,58),(429,108,143),(430,109,36),(431,109,144),(432,109,58),(433,109,145),(434,109,146),(435,110,44),(436,110,28),(437,110,49),(438,110,147),(439,110,148),(440,110,149),(443,112,41),(444,112,40),(445,112,79),(446,113,151),(447,113,79),(448,114,28),(449,114,66),(450,114,68),(451,115,69),(452,115,28),(453,115,53),(454,115,68),(455,115,149),(456,115,152),(488,116,68),(487,116,79),(486,116,153),(485,116,26),(484,116,48),(483,116,28),(482,116,64),(481,116,44),(465,117,69),(466,117,154),(467,118,44),(468,118,28),(469,118,53),(470,118,79),(471,118,155),(472,118,156),(473,119,157),(474,119,28),(475,120,36),(476,120,158),(477,120,159),(478,120,160),(479,120,161),(480,120,162);

/*Table structure for table `ava_tags` */

DROP TABLE IF EXISTS `ava_tags`;

CREATE TABLE `ava_tags` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(40) NOT NULL,
  `seo_url` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

/*Data for the table `ava_tags` */

insert  into `ava_tags`(`id`,`tag_name`,`seo_url`) values (1,'moto','moto'),(2,'maniobras','maniobras'),(3,'motos','motos'),(4,'carreras','carreras'),(5,'autos','autos'),(6,'policias','policias'),(7,'muscle cars','muscle-cars'),(8,'moster truck','moster-truck'),(9,'formula1','formula1'),(10,'coches','coches'),(11,'tunear','tunear'),(12,'modificar','modificar'),(13,'Monster truck','monster-truck'),(14,'3d','3d'),(15,'tractores','tractores'),(16,'taxi','taxi'),(17,'camion','camion'),(18,'mina','mina'),(19,'carrera','carrera'),(20,'agilidad','agilidad'),(21,'modificados','modificados'),(22,'tuning','tuning'),(23,'camiones','camiones'),(24,'offroad','offroad'),(25,'mario','mario'),(26,'animales','animales'),(27,'militar','militar'),(28,'habilidad','habilidad'),(29,'bike','bike'),(30,'destreza','destreza'),(31,'neon','neon'),(32,'motos de agua','motos-de-agua'),(33,'1era persona','1era-persona'),(34,'simulador','simulador'),(35,'disparo','disparo'),(36,'estrategia','estrategia'),(37,'',''),(38,'pinguinos','pinguinos'),(39,'frutas','frutas'),(40,'aventura','aventura'),(41,'disparos','disparos'),(42,'cielo','cielo'),(43,'plantas','plantas'),(44,'ACCIÃ“N','acciÃ“n'),(45,'LUCHA','lucha'),(46,'PELEASPLATAFORMAS','peleasplataformas'),(47,'Accion','accion'),(48,'LUCHA Y PELEAS','lucha-y-peleas'),(49,'2 JUGADORES','2-jugadores'),(50,'DRAGON BALL','dragon-ball'),(51,'ANIME Y MANGA','anime-y-manga'),(52,'GOKU','goku'),(53,'PLATAFORMAS','plataformas'),(54,'TIROS Y DISPAROS','tiros-y-disparos'),(55,'ALIEN','alien'),(56,'ARMAS','armas'),(57,'BESTIAS','bestias'),(58,'COLECCIONES','colecciones'),(59,'HALLOWEEN','halloween'),(60,'TEMPORADAS','temporadas'),(61,'ZOMBIS','zombis'),(62,'PELICULAS','peliculas'),(63,'SUPERHEROES','superheroes'),(64,'GESTIÃ“N','gestiÃ“n'),(65,'METRALLETAS','metralletas'),(66,'CLÃSICOS','clÃsicos'),(67,'SONIC','sonic'),(68,'MARIO BROS','mario-bros'),(69,'AVENTURAS','aventuras'),(70,'ROBOTS','robots'),(71,'Sniper','sniper'),(72,'Gun','gun'),(73,'War','war'),(74,'Esquivar y correr','esquivar-y-correr'),(75,'Juegos con rÃ©cords','juegos-con-rÃ©cords'),(76,'BARCOS','barcos'),(77,'DEFENSAS','defensas'),(78,'LANCHAS','lanchas'),(79,'CLASICOS','clasicos'),(80,'KING OF FIGTHERS','king-of-figthers'),(81,'STREET FIGHTER','street-fighter'),(82,'aves','aves'),(83,'birds','birds'),(84,'deportes','deportes'),(85,'barketball','barketball'),(86,'encestar','encestar'),(87,'FÃšTBOL','fÃštbol'),(88,'APUNTAR Y DISPARAR','apuntar-y-disparar'),(89,'4X4','4x4'),(90,'FUTBOL','futbol'),(91,'LOGROS','logros'),(92,'PUNTUACIONES','puntuaciones'),(93,'TIROS DE FALTA','tiros-de-falta'),(94,'ZOMBIES','zombies'),(95,'BICICLETAS','bicicletas'),(96,'TIEMPO','tiempo'),(97,'BÃ©isbol','bÃ©isbol'),(98,'Juegos De Equipo','juegos-de-equipo'),(99,'Juegos De Balones','juegos-de-balones'),(100,'Simpsons','simpsons'),(101,'Deportes de invierno','deportes-de-invierno'),(102,'ACROBACIAS','acrobacias'),(103,'Juegos en 3D','juegos-en-3d'),(104,'AcciÃ³n','acciÃ³n'),(105,'Hockey','hockey'),(106,'Electro','electro'),(107,'Golf','golf'),(108,'Simulacion','simulacion'),(109,'Juegos de Patinetas','juegos-de-patinetas'),(110,'Juegos Mundiales','juegos-mundiales'),(111,'BART','bart'),(112,'SKATEBOARDING','skateboarding'),(113,'BALONCESTO','baloncesto'),(114,'BILLAR','billar'),(115,'POOL','pool'),(116,'Juegos De Bicis','juegos-de-bicis'),(117,'Juegos Bmx','juegos-bmx'),(118,'Juegos Extremos','juegos-extremos'),(119,'BICI','bici'),(120,'TRUCOS','trucos'),(121,'TENNIS','tennis'),(122,'SLAM','slam'),(123,'RACING','racing'),(124,'BIRD','bird'),(125,'GOAL','goal'),(126,'AFRICA','africa'),(127,'SOCCER ','soccer-'),(128,'TETRIS','tetris'),(129,'RPG','rpg'),(130,'PUZZLE','puzzle'),(131,'ESTRATEGICOS','estrategicos'),(132,'LÃ“GICA','lÃ“gica'),(133,'PUZZLES Y ROMPECABEZAS','puzzles-y-rompecabezas'),(134,'BATALLAS','batallas'),(135,'GATOS','gatos'),(136,'Juegos de mesa ','juegos-de-mesa-'),(137,'Escaparte','escaparte'),(138,'Juegos Guays','juegos-guays'),(139,'Retrojuegos','retrojuegos'),(140,'Juegos de cartas','juegos-de-cartas'),(141,'Solitarios','solitarios'),(142,'Combinar bloques','combinar-bloques'),(143,'LANZAR','lanzar'),(144,'BOLAS','bolas'),(145,'VIDEO JUEGOS','video-juegos'),(146,'ZUMA','zuma'),(147,'CONTRARRELOJ','contrarreloj'),(148,'HELADOS','helados'),(149,'RECOGER','recoger'),(150,'CONQUISTAR','conquistar'),(151,'LUDO','ludo'),(152,'SALTAR','saltar'),(153,'CASTILLOS','castillos'),(154,'Juegos de Mario','juegos-de-mario'),(155,'MONOS','monos'),(156,'PRINCESAS','princesas'),(157,'Bubble Shooter','bubble-shooter'),(158,'AJEDREZ','ajedrez'),(159,'FICHAS','fichas'),(160,'LOGICA','logica'),(161,'MESA','mesa'),(162,'PENSAR','pensar');

/*Table structure for table `ava_topics` */

DROP TABLE IF EXISTS `ava_topics`;

CREATE TABLE `ava_topics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `last_post_time` int(11) DEFAULT NULL,
  `start_date` int(11) DEFAULT NULL,
  `topic_starter` varchar(80) DEFAULT NULL,
  `topic_starter_id` int(11) DEFAULT NULL,
  `locked` int(11) DEFAULT '0',
  `pinned` int(11) DEFAULT '0',
  `last_post_user` varchar(80) DEFAULT NULL,
  `last_post_user_id` int(11) DEFAULT NULL,
  `total_replies` int(11) DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '1',
  `seo_url` varchar(100) DEFAULT NULL,
  `first_post_content` text,
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`),
  KEY `forum_id` (`forum_id`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_topics` */

/*Table structure for table `ava_users` */

DROP TABLE IF EXISTS `ava_users`;

CREATE TABLE `ava_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(120) NOT NULL DEFAULT '',
  `activate` char(1) NOT NULL DEFAULT '',
  `about` varchar(200) NOT NULL DEFAULT '',
  `group` varchar(40) NOT NULL DEFAULT '',
  `location` varchar(50) NOT NULL DEFAULT '',
  `interests` text NOT NULL,
  `msn` varchar(40) NOT NULL DEFAULT '',
  `website` varchar(200) NOT NULL DEFAULT '',
  `admin` char(2) NOT NULL DEFAULT '',
  `plays` varchar(20) NOT NULL DEFAULT '0',
  `joined` text NOT NULL,
  `favourites` text NOT NULL,
  `avatar` varchar(25) NOT NULL,
  `points` int(20) NOT NULL DEFAULT '0',
  `ratings` int(5) NOT NULL DEFAULT '0',
  `comments` int(5) NOT NULL DEFAULT '0',
  `messages` int(5) NOT NULL,
  `referrer` tinyint(5) NOT NULL DEFAULT '0',
  `facebook` tinyint(1) NOT NULL DEFAULT '0',
  `facebook_id` bigint(20) unsigned NOT NULL,
  `lastip` char(15) NOT NULL,
  `last_comment` datetime NOT NULL,
  `seo_url` varchar(100) NOT NULL,
  `last_activity` datetime NOT NULL,
  `friend_requests` int(11) NOT NULL DEFAULT '0',
  `email_friend_request` int(11) DEFAULT '1',
  `email_new_message` int(11) DEFAULT '1',
  `email_highscore_challenge` int(11) DEFAULT '1',
  `banned` int(11) NOT NULL DEFAULT '0',
  `last_pm` datetime NOT NULL,
  `forum_posts` int(11) NOT NULL DEFAULT '0',
  `forum_signature` text,
  `forum_last_post` int(11) NOT NULL DEFAULT '0',
  `last_points_time` int(11) DEFAULT NULL,
  `last_points_game` int(11) DEFAULT NULL,
  `new_pms` int(1) NOT NULL DEFAULT '0',
  `new_frs` int(1) NOT NULL DEFAULT '0',
  `new_topic` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`),
  KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `activate` (`activate`),
  KEY `banned` (`banned`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ava_users` */

insert  into `ava_users`(`id`,`username`,`password`,`email`,`activate`,`about`,`group`,`location`,`interests`,`msn`,`website`,`admin`,`plays`,`joined`,`favourites`,`avatar`,`points`,`ratings`,`comments`,`messages`,`referrer`,`facebook`,`facebook_id`,`lastip`,`last_comment`,`seo_url`,`last_activity`,`friend_requests`,`email_friend_request`,`email_new_message`,`email_highscore_challenge`,`banned`,`last_pm`,`forum_posts`,`forum_signature`,`forum_last_post`,`last_points_time`,`last_points_game`,`new_pms`,`new_frs`,`new_topic`) values (1,'admin','81dc9bdb52d04dc20036dbd8313ed055','jesusfsg06@gmail.com','1','','','','','','','1','8','March 16 2014',', 64, 22','',21,1,0,0,0,0,0,'127.0.0.1','0000-00-00 00:00:00','admin','2014-04-15 17:27:41',0,1,1,1,0,'0000-00-00 00:00:00',0,NULL,0,1397525884,60,0,0,0);

/*Table structure for table `ava_usersonline` */

DROP TABLE IF EXISTS `ava_usersonline`;

CREATE TABLE `ava_usersonline` (
  `session_id` char(100) NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ava_usersonline` */

insert  into `ava_usersonline`(`session_id`,`time`,`user_id`) values ('u81hi68td6ka17169c6llkrh82',1397576693,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
