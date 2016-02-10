<?php
$sql = array();
$sql[1] = 'ALTER TABLE `ava_cats` CHANGE `name` `name` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[2] = 'ALTER TABLE `ava_cats` ADD INDEX(`name`)';

$sql[3] = 'ALTER TABLE `ava_comments` CHANGE `user` `user` INT(10) NOT NULL'; 
$sql[4] = 'ALTER TABLE `ava_comments` CHANGE `link_id` `link_id` INT(10) NOT NULL'; 
$sql[5] = 'ALTER TABLE `ava_comments` ADD INDEX(`user`)'; 
$sql[6] = 'ALTER TABLE `ava_comments` ADD INDEX(`link_id`)'; 

$sql[7] = 'ALTER TABLE `ava_games` CHANGE `name` `name` VARCHAR(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[8] = 'ALTER TABLE `ava_games` CHANGE `url` `url` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL'; 
$sql[9] = 'ALTER TABLE `ava_games` CHANGE `catergory_id` `catergory_id` INT(10) NOT NULL'; 
$sql[10] = 'ALTER TABLE `ava_games` CHANGE `image` `image` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[11] = 'ALTER TABLE `ava_games` CHANGE `import` `import` TINYINT(1) NOT NULL DEFAULT \'0\''; 
$sql[12] = 'ALTER TABLE `ava_games` ADD INDEX(`name`)'; 
$sql[13] = 'ALTER TABLE `ava_games` ADD INDEX(`import`)'; 

$sql[14] = 'ALTER TABLE `ava_links` CHANGE `name` `name` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL'; 
$sql[15] = 'ALTER TABLE `ava_links` CHANGE `url` `url` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL'; 
$sql[16] = 'ALTER TABLE `ava_links` CHANGE `description` `description` VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[17] = 'ALTER TABLE `ava_links` CHANGE `sitewide` `sitewide` TINYINT(3) NOT NULL'; 
$sql[18] = 'ALTER TABLE `ava_links` CHANGE `published` `published` TINYINT(3) NOT NULL';

$sql[19] = 'ALTER TABLE `ava_messages` CHANGE `user_id` `user_id` INT(10) NOT NULL'; 
$sql[20] = 'ALTER TABLE `ava_messages` CHANGE `sender_id` `sender_id` INT(10) NOT NULL'; 

$sql[21] = 'ALTER TABLE `ava_messages` CHANGE `sender_name` `sender_name` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[22] = 'ALTER TABLE `ava_messages` CHANGE `date` `date` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[23] = 'ALTER TABLE `ava_messages` ADD INDEX(`user_id`)'; 

$sql[24] = 'ALTER TABLE `ava_news` CHANGE `title` `title` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[25] = 'ALTER TABLE `ava_news` CHANGE `user` `user` INT(10) NOT NULL'; 
$sql[26] = 'ALTER TABLE `ava_news` CHANGE `date` `date` VARCHAR(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL'; 
$sql[27] = 'ALTER TABLE `ava_news` CHANGE `image` `image` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[28] = 'ALTER TABLE `ava_pages` CHANGE `name` `name` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';

$sql[29] = 'ALTER TABLE `ava_ratings` CHANGE `game_id` `game_id` INT(10) NOT NULL'; 
$sql[30] = 'ALTER TABLE `ava_ratings` CHANGE `user_id` `user_id` INT(10) NOT NULL'; 
$sql[31] = 'ALTER TABLE `ava_ratings` CHANGE `rating` `rating` TINYINT(1) NOT NULL'; 
$sql[32] = 'ALTER TABLE `ava_ratings` ADD INDEX(`game_id`)'; 
$sql[33] = 'ALTER TABLE `ava_ratings` ADD INDEX(`user_id`)'; 

$sql[34] = 'ALTER TABLE `ava_settings` CHANGE `site_name` `site_name` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[35] = 'ALTER TABLE `ava_settings` CHANGE `site_url` `site_url` VARCHAR(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[36] = 'ALTER TABLE `ava_settings` CHANGE `template_url` `template_url` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[37] = 'ALTER TABLE `ava_settings` CHANGE `max_results` `max_results` INT(5) NOT NULL'; 
$sql[38] = 'ALTER TABLE `ava_settings` CHANGE `image_height` `image_height` INT(5) NOT NULL'; 
$sql[39] = 'ALTER TABLE `ava_settings` CHANGE `image_width` `image_width` INT(5) NOT NULL'; 
$sql[40] = 'ALTER TABLE `ava_settings` CHANGE `adsense` `adsense` TINYINT(1) NOT NULL'; 
$sql[41] = 'ALTER TABLE `ava_settings` CHANGE `cat_numbers` `cat_numbers` TINYINT(1) NOT NULL'; 
$sql[42] = 'ALTER TABLE `ava_settings` CHANGE `seo_on` `seo_on` TINYINT(1) NOT NULL'; 
$sql[43] = 'ALTER TABLE `ava_settings` CHANGE `email_on` `email_on` TINYINT(2) NOT NULL';
$sql[44] = 'ALTER TABLE `ava_settings` CHANGE `add_to_site` `add_to_site` TINYINT(1) NOT NULL DEFAULT \'0\''; 
$sql[45] = 'ALTER TABLE `ava_settings` CHANGE `plays` `plays` INT(5) NOT NULL'; 
$sql[46] = 'ALTER TABLE `ava_settings` CHANGE `language` `language` VARCHAR(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[47] = 'ALTER TABLE `ava_settings` CHANGE `featured_games` `featured_games` CHAR(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[48] = 'ALTER TABLE `ava_settings` CHANGE `play_limit` `play_limit` TINYINT(1) NOT NULL'; 
$sql[49] = 'ALTER TABLE `ava_settings` CHANGE `adsense_id` `adsense_id` VARCHAR(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';

$sql[50] = 'ALTER TABLE `ava_users` CHANGE `email` `email` VARCHAR(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[51] = 'ALTER TABLE `ava_users` CHANGE `activate` `activate` INT(1) NOT NULL'; 
$sql[52] = 'ALTER TABLE `ava_users` CHANGE `interests` `interests` VARCHAR(400) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';
$sql[53] = 'ALTER TABLE `ava_users` CHANGE `admin` `admin` INT(1) NOT NULL'; 
$sql[54] = 'ALTER TABLE `ava_users` CHANGE `plays` `plays` INT(10) NOT NULL DEFAULT \'0\''; 
$sql[55] = 'ALTER TABLE `ava_users` CHANGE `joined` `joined` VARCHAR(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL';

$sql[56] = 'ALTER TABLE `ava_games` ADD INDEX(`catergory_id`)'; 
$sql[57] = 'ALTER TABLE `ava_games` ADD INDEX(`published`)';

for ($i=1; $i<=57; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}