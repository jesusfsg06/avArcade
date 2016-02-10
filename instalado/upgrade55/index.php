<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: Upgrade</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: Upgrade from 5.5+</div>
<div class="main2">
<?php
$install = 1;
include('../../config.php');

if (isset($_GET['startat'])) {
	$start = $_GET['startat'];
}
else {
	$start = 1;
}

//////////////////////////////////////////////////////////////////////////////////////////////

$sql = array();

$sql[1] = "CREATE TABLE `ava_spil` (
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
) ENGINE=MyISAM;";

$sql[2] = "CREATE TABLE `ava_fog` (
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
) ENGINE=MyISAM;";

$sql[3] = "INSERT INTO `ava_settings` (`name`, `value`) VALUES\n"
    . "('use_qa_captcha','0'),
       ('qa_captcha_question','Captcha Question: What country is New York in?'),
       ('qa_captcha_answers','america, usa, united states, united states of america, 1'),
       ('use_mb_strlen','0');";
       
$sql[4] = "RENAME TABLE ava_feed_settings TO ava_feed_settings_old";

$sql[5] = "CREATE TABLE `ava_feed_settings` (
  `name` varchar(20) NOT NULL,
  `value` varchar(240) NOT NULL
) ENGINE=MyISAM;";

$sql[6] = "INSERT INTO `ava_feed_settings` (`name`, `value`) VALUES\n"
    . "('max_feed','1000'),
	('category_action','1'),
	('category_jigsaw','1'),
	('category_fighting','1'),
	('category_education','1'),
	('category_driving','1'),
	('category_dress_up','1'),
	('category_defense','1'),
	('category_casino','1'),
	('category_board_game','1'),
	('category_arcade','1'),
	('category_adventure','1'),
	('feed_params',''),
	('default_ad','1'),
	('get_tags','0'),
	('download','1'),
	('curl','1'),
	('mochi_secretkey',''),
	('mochi_pubid',''),
	('category_multiplayer','1'),
	('category_other','1'),
	('category_customize','1'),
	('category_puzzle','1'),
	('category_rhythm','1'),
	('category_rpg','1'),
	('category_shooter','1'),
	('category_sports','1'),
	('category_strategy','1'),
	('category_skill','1'),
	('category_autopost','1');";
	
$sql[7] = "UPDATE ava_settings SET value = '5.6' WHERE name = 'version'";

for ($i=$start; $i<=7; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

// Update ava_feed_settings table
$old_settingsq = mysql_query("SELECT * FROM ava_feed_settings_old");
while ($old_settings = mysql_fetch_array($old_settingsq)) {
	mysql_query("UPDATE ava_feed_settings SET value = '$old_settings[setting_value]' WHERE name = '$old_settings[setting_name]'");
}

echo '<div class="em">Upgrade to 5.6 complete</div>';
echo '<br /><div class="thelinks"><a href="../upgrade56">Next step >></a></div>';
?>
</div>
</body>
</html>