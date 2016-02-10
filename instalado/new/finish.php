<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: New install</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head">AV Arcade: New install complete</div>
<div class="main">
<?php
$install = 1;
include('../../config.php');
include('../../includes/core.php');

$date_unix = date("Y-m-d H:i:s");

$site_name = mysql_real_escape_string($_POST['site_name']);
//////////////////////////////////////////////////////////////////////////////////////////////

$sql = array();
$sql[1] = "INSERT INTO ava_cats (name, seo_url, description, keywords)
	VALUES ('Default category', '', 'A default category for demonstration', 'games, flash, arcade')";

$sql[2] = "INSERT INTO `ava_settings` (`name`, `value`) VALUES\n"
    . "('site_name', '$site_name'), 
    ('site_url', '$_POST[site_url]'), 
    ('template_url', '/templates/indigo'),
    ('facebook_on', '0'),
    ('adsense', '0'),
    ('cat_numbers', '0'),
    ('seo_on', '3'),
    ('email_on', '0'),
    ('add_to_site', '0'),
    ('plays', '10'),
    ('language', 'English'),
    ('featured_games', '1'),
    ('play_limit', '0'),
    ('site_description', 'Welcome to $site_name, home to all the best games!'),
    ('site_keywords', 'games, arcade'),
    ('admin_email', '$_POST[site_email]'),
    ('seo_extension', ''),
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
    ('points_submission','500'),
    ('points_highscore','10'),
    ('points_challenge','0'),
    ('facebook_appid', ''),
    ('facebook_secret', ''),
    ('user_ads', '3'),
    ('report_permissions', '1'),
    ('module_thumbs', '1'),
    ('default_leaderboard', '0'),
    ('default_banner', '0'),
    ('default_square', '0'),
    ('version','5.7'),
	('site_offline','0'),
	('offline_message','We are down for maintenance right now, back soon!'),
	('fullscreen_mode','1'),
	('homepage_order','random'),
	('submissions_folder','games/submissions'),
	('allow_submissions','1'),
	('date_format','Y-m-d'),
	('link_exchange','1'),
	('all_games','1'),
	('email_template','default'),
	('abg_countdown','30'),
	('email_notifications','1'),
	('use_qa_captcha','0'),
    ('qa_captcha_question','Captcha Question: What country is New York in?'),
    ('qa_captcha_answers','america, usa, united states, united states of america, 1'),
    ('use_mb_strlen','0'),
    ('forums_installed','0'),
	('flood_control_time','120'),
	('points_forum_post','10'),
	('points_forum_topic','20'),
	('point_spam_time','120'),
	('allow_double_posts','0'),
	('double_post_time','3600'),
	('posts_per_page','10'),
	('topics_per_page','20'),
	('forum_template','default');";

$date = date("F j Y");
$password = md5($_POST['admin_pass']);

$sql[3] = "INSERT INTO `ava_users` (`id`, `username`, `password`, `email`, `activate`, `about`, `group`, `location`, `interests`, `msn`, `website`, `admin`, `plays`, `joined`, `favourites`, `avatar`, `points`, `ratings`, `comments`, `messages`, `facebook`, `facebook_id`, `lastip`, `last_comment`, `seo_url`) VALUES\n"
    . "(1, '$_POST[admin_user]', '$password', '$_POST[admin_email]', '1', '', '', '', '', '', '', '1', '0', '$date', '', '', '0', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '')";

$sql[4] = 'INSERT INTO `ava_news` VALUES (3, \'Welcome to our new arcade\', \'<p>Welcome to our new arcade website built with AV Arcade!</p>\', 1, \''.$date.'\', \'site_news.png\', \'welcome-to-our-new-arcade\', \'new site, welcome, arcade news\');';

$sql[5] = "INSERT INTO `ava_feed_settings` (`name`, `value`) VALUES\n"
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

$sql[6] = "INSERT INTO `ava_games` (`id`, `name`, `description`, `url`, `category_id`, `hits`, `published`, `user_submit`, `width`, `height`, `image`, `import`, `filetype`, `instructions`, `mochi`, `rating`, `featured`, `date_added`, `highscores`, `mochi_id`, `seo_url`) VALUES\n"
    . "(1, 'Turn Based Battle', 'Not everything is as it seems when James the Elf has the first Random Encounter of this Adventure. Will he get to the bottom of his mysterious enemy? Or will the entire world crumble to the great evil who presides in an impenetrable fortress?', 'http://games.mochiads.com/c/g/turn-based-battle/TurnBasedBattleMOCHI.swf', '1', 0, 1, '0', '550', '400', 'http://thumbs.mochiads.com/c/g/turn-based-battle/_thumb_100x100.jpg', '0', 'swf', 'Use the mouse to navigate and battle!', 0, 0, 1, '$date_unix', 1, '15ae16d5b1c9f47d', 'turn-based-battle');";
	
$sql[7] = "INSERT INTO `ava_games` (`id`, `name`, `description`, `url`, `category_id`, `hits`, `published`, `user_submit`, `width`, `height`, `image`, `import`, `filetype`, `instructions`, `mochi`, `rating`, `featured`, `date_added`, `highscores`, `mochi_id`, `seo_url`) VALUES\n"
    . "(2, 'Shift', 'Guide your mystery man through a plethora of mazes which will take your sense of perception to the limit in this smash hit game. ', 'http://games.mochiads.com/c/g/shift/Shiftfla5_MOCHI3.swf', '1', 0, 1, '0', '500', '500', 'http://thumbs.mochiads.com/c/g/shift/_thumb_100x100.png', '0', 'swf', 'Run with the arrow keys. Jump with the Space bar Shift with the Shift Key Pause with the P Key', 0, 0, 1, '$date_unix', 1, '0b396fea4f5a54f8', 'shift');";

$sql[8] = "INSERT INTO `ava_links` (`id`, `name`, `url`, `description`, `sitewide`, `published`) VALUES\n"
    . "(1, 'AV Scripts', '', 'The home of AV Arcade', '1', '1');";
    
$sql[9] = "INSERT INTO `ava_adverts` (`ad_name`, `ad_content`) VALUES\n"
    . "('Default', '');";
    
$sql[10] = "INSERT INTO `ava_adverts` (`ad_name`, `ad_content`) VALUES\n"
    . "('AV Arcade Banner', '<img src=\"images/ad_example.png\"><br>');";
    
$sql[11] = "INSERT INTO `ava_forums` (`id`, `name`, `description`, `forum_order`, `parent_id`, `category`, `last_post_time`, `last_poster`, `last_poster_id`, `last_topic`, `last_topic_id`, `last_topic_seo_url`, `last_topic_forum_seo_url`, `total_topics`, `total_posts`, `seo_url`, `read_only`, `parents`, `children`)
VALUES
	(1,'Main Category','A category.',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'main-category',1,'','2'),
	(2,'Example Forum','Here\'s an example forum. In the admin panel rename me to set up your first forum.',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'example-forum',0,'1','');";
    
for ($i=1; $i<=11; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

include '../seoname.php';

echo '<div class="em">Default data added to database</div>';
echo '<div align="center">AV Arcade has been installed! Please <b>remove the install directory NOW</b><br /><br /></div>';
echo '<div class="thelinks"><a href="../../">Go to site</a></div>';
?>
</div>
</body>
</html>