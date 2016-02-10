<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: Upgrade</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: Upgrade from 5.4+</div>
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

$sql[1] = "ALTER TABLE `ava_games` CHANGE `category_id` `category_id` int(11) NOT NULL";
$sql[2] = "RENAME TABLE ava_mochi_settings TO ava_feed_settings";

$sql[3] = "CREATE TABLE `ava_friend_requests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `from_user` (`from_user`),
  KEY `to_user` (`to_user`)
) ENGINE=MyISAM;";

$sql[4] = "CREATE TABLE `ava_friends` (
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  KEY `user1` (`user1`),
  KEY `user2` (`user2`)
) ENGINE=MyISAM;";

$sql[5] = "CREATE TABLE `ava_submissions` (
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
) ENGINE=MyISAM;";

$sql[6] = "ALTER TABLE `ava_cats` ADD `parent_id` int(11) NOT NULL DEFAULT '0'";
$sql[7] = "ALTER TABLE `ava_games` ADD `submitter` int(11) NOT NULL DEFAULT '0'";
$sql[8] = "ALTER TABLE `ava_pages` ADD `meta_tags` varchar(255) DEFAULT ''";
$sql[9] = "ALTER TABLE `ava_users` ADD `last_activity` datetime NOT NULL";
$sql[10] = "ALTER TABLE `ava_users` ADD `friend_requests` int(11) NOT NULL DEFAULT '0'";
$sql[11] = "ALTER TABLE `ava_users` ADD `email_friend_request` int(11) DEFAULT '1'";
$sql[12] = "ALTER TABLE `ava_users` ADD `email_new_message` int(11) DEFAULT '1'";
$sql[13] = "ALTER TABLE `ava_users` ADD `email_highscore_challenge` int(11) DEFAULT '1'";
$sql[14] = "ALTER TABLE `ava_users` ADD `banned` int(11) NOT NULL DEFAULT '0'";
$sql[15] = "ALTER TABLE `ava_users` ADD `last_pm` datetime NOT NULL";
$sql[16] = "ALTER TABLE `ava_tags` ADD `seo_url` varchar(40) DEFAULT NULL";

$sql[17] = "CREATE INDEX seo_url ON ava_cats(seo_url)";

$sql[18] = "INSERT INTO `ava_feed_settings` (`setting_id`,`setting_name`,`setting_value`)
VALUES
	(52,'fgd_action','1');";

$sql[19] = "ALTER TABLE `ava_cats` CHANGE `cat_order` `cat_order` decimal(5,1) NOT NULL DEFAULT '1.0'";

$sql[20] = "CREATE INDEX seo_url ON ava_games(seo_url)";
$sql[21] = "CREATE INDEX category_id ON ava_games(category_id)";
$sql[22] = "CREATE INDEX game ON ava_highscores(game)";
$sql[23] = "CREATE INDEX user ON ava_highscores(user)";
$sql[24] = "CREATE INDEX leaderboard ON ava_highscores(leaderboard)";
$sql[25] = "CREATE INDEX game_id ON ava_leaderboards(game_id)";
$sql[26] = "CREATE INDEX leaderboard_id ON ava_leaderboards(leaderboard_id)";
$sql[27] = "CREATE INDEX user_id ON ava_messages(user_id)";
$sql[28] = "CREATE INDEX seo_url ON ava_news(seo_url)";
$sql[29] = "CREATE INDEX link_id ON ava_news_comments(link_id)";
$sql[30] = "CREATE INDEX seo_url ON ava_pages(seo_url)";
$sql[31] = "CREATE INDEX game_id ON ava_ratings(game_id)";
$sql[32] = "CREATE INDEX game_id ON ava_tag_relations(game_id)";
$sql[33] = "CREATE INDEX seo_url ON ava_tags(seo_url)";
$sql[34] = "CREATE INDEX seo_url ON ava_users(seo_url)"; 
$sql[35] = "CREATE INDEX username ON ava_users(username)";
$sql[36] = "CREATE INDEX email ON ava_users(email)"; 
$sql[37] = "CREATE INDEX activate ON ava_users(activate)"; 
$sql[38] = "CREATE INDEX banned ON ava_users(banned)"; 
$sql[39] = "CREATE INDEX session_id ON ava_usersonline(session_id)"; 
$sql[40] = "CREATE INDEX user_id ON ava_usersonline(user_id)"; 

$sql[41] = "INSERT INTO `ava_settings` (`name`, `value`) VALUES\n"
    . "('submissions_folder','games/submissions'),
       ('allow_submissions','1'),
       ('date_format','Y-m-d'),
       ('link_exchange','1'),
       ('all_games','1'),
       ('email_template','default'),
       ('abg_countdown','30'),
       ('points_submission','500'),
       ('points_highscore','10'),
       ('points_challenge','5'),
       ('email_notifications','1');";
       
$sql[42] = "ALTER TABLE `ava_games` ADD `category_parent` int(11) NOT NULL DEFAULT '0' AFTER `category_id`";

$sql[43] = "ALTER TABLE `ava_links` ADD `inbound` int(11) NOT NULL";
$sql[44] = "ALTER TABLE `ava_links` ADD `outbound` int(11) NOT NULL";
$sql[45] = "ALTER TABLE `ava_links` ADD `submitter` int(11) NOT NULL";
$sql[46] = "ALTER TABLE `ava_links` ADD `submitter_email` varchar(80) NOT NULL DEFAULT ''";

$sql[47] = "ALTER TABLE `ava_news` ADD `meta_tags` varchar(255) DEFAULT ''";

$sql[48] = "UPDATE ava_settings SET value = '5.5' WHERE name = 'version'";

$sql[49] = "ALTER TABLE `ava_messages` CHANGE `user_id` `user_id` int(11) NOT NULL";
$sql[50] = "ALTER TABLE `ava_messages` CHANGE `sender_id` `sender_id` int(11) NOT NULL";

$sql[51] = "ALTER TABLE `ava_fgd` ADD `author_link` varchar(200) DEFAULT NULL";

for ($i=$start; $i<=51; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

include('../../includes/core.php');
function generate_seonames($table, $column, $type) {
	$sql = mysql_query("SELECT * FROM $table ORDER BY id ASC");
	while ($row = mysql_fetch_array($sql)) {
		$seo_name = seoname($row[$column]);
		$seo_name_exists = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_seonames WHERE seo_name = '$seo_name' AND type = '$type'"),0);
		if($seo_name_exists >= 1) {
			$seo_name_count = mysql_fetch_array(mysql_query("SELECT uses FROM ava_seonames WHERE seo_name = '$seo_name' AND type = '$type'"));
		
			$number = $seo_name_count['uses'] + 1;
			$final_seo_name = $seo_name.'-'.$number;
		
			mysql_query("UPDATE $table SET seo_url = '$final_seo_name' WHERE id = $row[id]");
			mysql_query("UPDATE ava_seonames SET uses = uses + 1 WHERE seo_name = '$seo_name'");
		}
		else {
			mysql_query("UPDATE $table SET seo_url = '$seo_name' WHERE id = $row[id]");
			mysql_query("INSERT INTO ava_seonames (seo_name, type, uses) VALUES ('$seo_name', '$type', 1)");
		}
	}
}

generate_seonames('ava_tags', 'tag_name', 'tag');

echo '<div class="em">Upgrade to 5.5 complete</div>';
echo '<br /><div class="thelinks"><a href="../upgrade55">Next step >></a></div>';
?>
</div>
</body>
</html>