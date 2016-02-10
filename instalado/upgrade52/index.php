<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: Upgrade</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: Upgrade from 5.2+</div>
<div class="main2">
<?php
$install = 1;
include('../../config.php');


//////////////////////////////////////////////////////////////////////////////////////////////

$sql = array();
$sql[1] = "CREATE TABLE `ava_fgd` (
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
  PRIMARY KEY (`id`),
  KEY `gametag` (`fgd_id`,`name`)
) ENGINE=MyISAM";

$sql[2] = "CREATE TABLE `ava_kongregate` (
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
) ENGINE=MyISAM";

$sql[3] = "CREATE TABLE `ava_playtomic` (
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
) ENGINE=MyISAM";

$sql[4] = "INSERT INTO `ava_settings` (`name`, `value`) VALUES\n"
    . "('version','5.3'),
	('site_offline','0'),
	('offline_message','We are down for matinence right now, back soon!'),
	('fullscreen_mode','1');";
	
$sql[5] = "INSERT INTO `ava_mochi_settings` (`setting_id`,`setting_name`,`setting_value`)
VALUES
	(23,'get_tags','1'),
	(24,'feed_params',''),
	(25,'fgd_setup','0'),
	(26,'fgd_cid',''),
	(27,'fgd_hash',''),
	(28,'fgd_adventure','1'),
	(29,'fgd_arcade','1'),
	(30,'fgd_casino','1'),
	(32,'fgd_defense','1'),
	(33,'fgd_driving','1'),
	(34,'fgd_fighting','1'),
	(35,'fgd_gadgets','1'),
	(36,'fgd_multiplayer','1'),
	(37,'fgd_other','1'),
	(38,'fgd_puzzle','1'),
	(39,'fgd_rhythm','1'),
	(40,'fgd_rpg','1'),
	(41,'fgd_shooter','1'),
	(42,'fgd_sports','1'),
	(43,'fgd_strategy','1'),
	(44,'k_action','1'),
	(45,'k_adventure','1'),
	(46,'k_multiplayer','1'),
	(47,'k_more','1'),
	(48,'k_puzzle','1'),
	(49,'k_shooter','1'),
	(50,'k_sports','1'),
	(51,'k_strategy','1');";
	
$sql[6] = "ALTER TABLE `ava_games` CHANGE `filetype` `filetype` varchar(5) NOT NULL";	
	
$sql[7] = "UPDATE ava_games SET filetype = 'swf'";

$sql[8] = 'ALTER TABLE `ava_leaderboards` CHANGE `leaderboard_id` `leaderboard_id` VARCHAR(120)';
$sql[9] = 'ALTER TABLE `ava_highscores` CHANGE `leaderboard` `leaderboard` VARCHAR(120)';

for ($i=1; $i<=9; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

echo '<div class="em">Upgrade to 5.3 complete</div>';
echo '<br /><div class="thelinks"><a href="../upgrade53">Next step >></a></div>';
?>
</div>
</body>
</html>