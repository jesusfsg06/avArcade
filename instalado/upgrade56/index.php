<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: Upgrade</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: Upgrade from 5.6+</div>
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

$sql[1] = "CREATE TABLE `ava_topics` (
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
) ENGINE=MyISAM;";

$sql[2] = "CREATE TABLE `ava_posts` (
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
) ENGINE=MyISAM;";

$sql[3] = "CREATE TABLE `ava_forums` (
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
) ENGINE=MyISAM;";

$sql[4] = "INSERT INTO `ava_settings` (`name`, `value`) VALUES\n"
    . "('forums_installed','0'),
	('flood_control_time','120'),
	('points_forum_post','10'),
	('points_forum_topic','20'),
	('point_spam_time','120'),
	('allow_double_posts','0'),
	('double_post_time','3600'),
	('posts_per_page','10'),
	('topics_per_page','20'),
	('forum_template','default');";
       
$sql[5] = "ALTER TABLE `ava_users` ADD `forum_posts` int(11) NOT NULL DEFAULT '0'";
$sql[6] = "ALTER TABLE `ava_users` ADD `forum_signature` text";
$sql[7] = "ALTER TABLE `ava_users` ADD `forum_last_post` int(11) NOT NULL DEFAULT '0'";
$sql[8] = "ALTER TABLE `ava_users` ADD `last_points_time` int(11) DEFAULT NULL";
$sql[9] = "ALTER TABLE `ava_users` ADD `last_points_game` int(11) DEFAULT NULL";
$sql[10] = "ALTER TABLE `ava_users` ADD `new_pms` int(1) NOT NULL DEFAULT '0'";
$sql[11] = "ALTER TABLE `ava_users` ADD `new_frs` int(1) NOT NULL DEFAULT '0'";
$sql[12] = "ALTER TABLE `ava_users` ADD `new_topic` int(1) NOT NULL DEFAULT '0'";

$sql[13] = "ALTER TABLE `ava_messages` ADD `highscore_game_id` int(11) NOT NULL DEFAULT '0'";
$sql[14] = "ALTER TABLE `ava_games` ADD `html_code` text";

$sql[15] = "INSERT INTO `ava_forums` (`id`, `name`, `description`, `forum_order`, `parent_id`, `category`, `last_post_time`, `last_poster`, `last_poster_id`, `last_topic`, `last_topic_id`, `last_topic_seo_url`, `last_topic_forum_seo_url`, `total_topics`, `total_posts`, `seo_url`, `read_only`, `parents`, `children`)
VALUES
	(1,'Main Category','A category.',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'main-category',1,'','2'),
	(2,'Example Forum','Here\'s an example forum. In the admin panel rename me to set up your first forum.',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'example-forum',0,'1','');";
	
$sql[16] = "UPDATE ava_settings SET value = '5.7' WHERE name = 'version'";

for ($i=$start; $i<=16; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}


echo '<div class="em">Upgrade to 5.7 complete - Remember to remove the install directory!</div>';
echo '<br /><div class="thelinks"><a href="../../">Your Homepage</a></div>';
?>
</div>
</body>
</html>