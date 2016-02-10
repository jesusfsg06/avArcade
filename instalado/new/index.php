<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: New install</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: New install</div>
<div class="main2">
<?php
$install = 1;
include('../../config.php');


//////////////////////////////////////////////////////////////////////////////////////////////

$sql = array();
$sql[1] = "CREATE TABLE IF NOT EXISTS `ava_favourites` (\n"
    . " `user_id` int(5) NOT NULL,\n"
    . " `game_id` int(5) NOT NULL,\n"
    . " KEY `user_id` (`user_id`),\n"
    . " KEY `game_id` (`game_id`)\n"
    . ") ENGINE=MyISAM;";

$sql[2] = "CREATE TABLE IF NOT EXISTS `ava_mochi` (
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
) ENGINE=MyISAM;";

$sql[3] = "CREATE TABLE `ava_cats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `cat_order` decimal(5,1) NOT NULL DEFAULT '1.0',
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `seo_url` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`)
) ENGINE=MyISAM;";

$sql[4] = "CREATE TABLE `ava_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `link_id` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_id` (`link_id`)
) ENGINE=MyISAM;";

$sql[5] = "CREATE TABLE IF NOT EXISTS `ava_games` (
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
) ENGINE=MyISAM;";

$sql[6] = "CREATE TABLE `ava_links` (
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
) ENGINE=MyISAM;";

$sql[7] = "CREATE TABLE `ava_messages` (
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
) ENGINE=MyISAM;";

$sql[8] = "CREATE TABLE `ava_feed_settings` (
  `name` varchar(20) NOT NULL,
  `value` varchar(240) NOT NULL
) ENGINE=MyISAM;";

$sql[9] = "CREATE TABLE `ava_news` (
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
) ENGINE=MyISAM;";

$sql[10] = "CREATE TABLE `ava_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `page` text NOT NULL,
  `menu` tinyint(1) NOT NULL,
  `seo_url` varchar(100) NOT NULL,
  `meta_tags` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`)
) ENGINE=MyISAM;";

$sql[11] = "CREATE TABLE `ava_ratings` (
  `game_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `rating` char(1) NOT NULL,
  `ip` char(15) NOT NULL,
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM;";

$sql[12] = "CREATE TABLE `ava_settings` (
  `name` varchar(20) NOT NULL,
  `value` varchar(240) NOT NULL
) ENGINE=MyISAM;";

$sql[13] = "CREATE TABLE `ava_users` (
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
) ENGINE=MyISAM;";

$sql[14] = "CREATE TABLE `ava_adverts` (
  `id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(40) NOT NULL,
  `ad_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql[15] = "CREATE TABLE `ava_highscores` (
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
) ENGINE=MyISAM;";

$sql[16] = "CREATE TABLE `ava_news_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `link_id` varchar(10) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` char(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_id` (`link_id`)
) ENGINE=MyISAM;";

$sql[17] = "CREATE TABLE `ava_reported` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `report` text COLLATE utf8_unicode_ci NOT NULL,
  `link_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql[18] = "CREATE TABLE `ava_tag_relations` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(5) NOT NULL,
  `tag_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM;";

$sql[19] = "CREATE TABLE `ava_tags` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(40) NOT NULL,
  `seo_url` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seo_url` (`seo_url`)
) ENGINE=MyISAM";

$sql[20] = "CREATE TABLE `ava_leaderboards` (
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
) ENGINE=MyISAM";

$sql[21] = "CREATE TABLE `ava_fgd` (
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
) ENGINE=MyISAM";

$sql[22] = "CREATE TABLE `ava_kongregate` (
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

$sql[23] = "CREATE TABLE `ava_playtomic` (
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

$sql[24] = "CREATE TABLE `ava_seonames` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seo_name` varchar(255) NOT NULL,
  `type` varchar(40) DEFAULT NULL,
  `uses` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM";

$sql[25] = "CREATE TABLE `ava_usersonline` (
  `session_id` char(100) NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM";

$sql[26] = "CREATE TABLE `ava_friend_requests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `from_user` (`from_user`),
  KEY `to_user` (`to_user`)
) ENGINE=MyISAM";

$sql[27] = "CREATE TABLE `ava_friends` (
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  KEY `user1` (`user1`),
  KEY `user2` (`user2`)
) ENGINE=MyISAM";

$sql[28] = "CREATE TABLE `ava_submissions` (
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
) ENGINE=MyISAM";

$sql[29] = "CREATE TABLE `ava_spil` (
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

$sql[30] = "CREATE TABLE `ava_fog` (
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

$sql[31] = "CREATE TABLE `ava_topics` (
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

$sql[32] = "CREATE TABLE `ava_posts` (
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

$sql[33] = "CREATE TABLE `ava_forums` (
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

for ($i=1; $i<=33; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

echo '<div class="em">Tables successfully created on your database</div>';
include 'new_site_form.php';
?>
</div>
</body>
</html>