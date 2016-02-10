<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: Upgrade</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: Upgrade from 5.1+</div>
<div class="main2">
<?php
$install = 1;
include('../../config.php');


//////////////////////////////////////////////////////////////////////////////////////////////

$sql = array();
$sql[1] = "CREATE TABLE `ava_adverts` (
  `id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(40) NOT NULL,
  `ad_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql[2] = "CREATE TABLE `ava_highscores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game` int(5) DEFAULT NULL,
  `user` int(5) DEFAULT NULL,
  `score` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `leaderboard` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql[3] = "CREATE TABLE `ava_news_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `link_id` varchar(10) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` char(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql[4] = "CREATE TABLE `ava_reported` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `report` text COLLATE utf8_unicode_ci NOT NULL,
  `link_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql[5] = "CREATE TABLE `ava_tag_relations` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(5) NOT NULL,
  `tag_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;";

$sql[6] = "CREATE TABLE `ava_tags` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM";

$sql[7] = "ALTER TABLE `ava_cats` ADD `cat_order` tinyint(3) NOT NULL";
$sql[8] = "ALTER TABLE `ava_comments` ADD `date` datetime NOT NULL";
$sql[9] = "ALTER TABLE `ava_comments` ADD `ip` char(15) NOT NULL";
$sql[10] = "ALTER TABLE `ava_games` ADD `date_added` datetime NOT NULL";
$sql[11] = "ALTER TABLE `ava_games` ADD `advert_id` tinyint(5) NOT NULL DEFAULT '1'";
$sql[12] = "ALTER TABLE `ava_games` ADD `highscores` tinyint(1) NOT NULL";
$sql[13] = "ALTER TABLE `ava_messages` ADD `ip` char(15) NOT NULL";
$sql[14] = "ALTER TABLE `ava_mochi` ADD `tags` varchar(200) NOT NULL";
$sql[15] = "ALTER TABLE `ava_mochi` ADD `highscores` tinyint(1) NOT NULL";
$sql[16] = "ALTER TABLE `ava_pages` ADD `menu` tinyint(1) NOT NULL";
$sql[17] = "ALTER TABLE `ava_ratings` ADD `ip` char(15) NOT NULL";
$sql[18] = "ALTER TABLE `ava_users` ADD `referrer` tinyint(5) NOT NULL DEFAULT '0'";
$sql[19] = "ALTER TABLE `ava_users` ADD `facebook` tinyint(1) NOT NULL DEFAULT '0'";
$sql[20] = "ALTER TABLE `ava_users` ADD `facebook_id` bigint(20) NOT NULL DEFAULT '0'";
$sql[21] = "ALTER TABLE `ava_users` ADD `lastip` char(15) NOT NULL";

$sql[22] = "RENAME TABLE ava_settings TO ava_settings_old";

$sql[23] = "CREATE TABLE `ava_settings` (
  `name` varchar(20) NOT NULL,
  `value` varchar(240) NOT NULL
) ENGINE=MyISAM;";

$sql[24] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('21', 'mochi_jigsaw', '1')";

$sql[25] = "INSERT INTO `ava_adverts` (`ad_name`, `ad_content`) VALUES\n"
    . "('Default', '');";
    
$sql[26] = "INSERT INTO `ava_adverts` (`ad_name`, `ad_content`) VALUES\n"
    . "('AV Arcade Banner', '<img src=\"images/ad_example.png\"><br>');";
    
$sql[27] = "ALTER TABLE `ava_games` ADD `mochi_id` varchar(20) NOT NULL";

$sql[28] = 'ALTER TABLE `ava_users` CHANGE `points` `points` int(20) NOT NULL'; 

$sql[29] = "CREATE TABLE `ava_leaderboards` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(5) NOT NULL,
  `leaderboard_id` varchar(120) NOT NULL,
  `leaderboard_name` varchar(30) NOT NULL,
  `data_type` varchar(10) NOT NULL,
  `order_by` char(4) NOT NULL,
  `label` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;";

$sql[30] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('22', 'default_ad', '1')";
    
$sql[31] = "ALTER TABLE `ava_users` ADD `last_comment` datetime NOT NULL";

for ($i=1; $i<=31; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

$os = mysql_query("SELECT * FROM ava_settings_old");
$setting_old = mysql_fetch_array($os);

$site_name = addslashes($setting_old['site_name']);
$site_desc = addslashes($setting_old['site_description']);
$site_keywords = addslashes($setting_old['site_keywords']);

$settings_sql = "INSERT INTO `ava_settings` (`name`, `value`) VALUES\n"
    . "('site_name', '$site_name'), \n
    ('site_url', '$setting_old[site_url]'), \n
    ('template_url', '$setting_old[template_url]'),\n
    ('facebook_on', '0'),\n
    ('adsense', '$setting_old[adsense]'),\n
    ('cat_numbers', '$setting_old[cat_numbers]'),\n
    ('seo_on', '$setting_old[seo_on]'),\n
    ('email_on', '$setting_old[email_on]'),\n
    ('add_to_site', '$setting_old[add_to_site]'),\n
    ('plays', '$setting_old[plays]'),\n
    ('language', '$setting_old[language]'),\n
    ('featured_games', '$setting_old[featured_games]'),\n
    ('play_limit', '$setting_old[play_limit]'),\n
    ('site_description', '$site_desc'),\n
    ('site_keywords', '$site_keywords'),\n
    ('admin_email', '$setting_old[admin_email]'),\n
    ('seo_extension', '$setting_old[seo_extension]'),\n
    ('default_ad', '0'),
    ('skip_ads', '1'),
    ('use_captcha', '0'),
    ('captcha_pubkey', ''),
    ('captcha_privkey', ''),
    ('points_play', '2'),
    ('points_rate', '5'),
    ('points_comment', '10'),
    ('points_refer', '50'),
    ('points_report', '15'),
    ('facebook_appid', ''),
    ('facebook_secret', ''),
    ('user_ads', '3'),
    ('report_permissions', '1'),
    ('module_thumbs', '1'),
    ('default_leaderboard', '0'),
    ('default_banner', '0'),
    ('default_square', '0');";

$q = mysql_query($settings_sql);
	if (!$q)
 	{
  		die('Error updating settings: ' . mysql_error());
  	}

echo '<div class="em">Step 1 complete</div>';
echo '<br /><div class="thelinks"><a href="../upgrade52">Next step >></a></div>';
?>
</div>
</body>
</html>