<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: Upgrade</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: Upgrade</div>
<div class="main2">
<?php
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
PRIMARY KEY (`id`),
KEY `gametag` (`gametag`,`name`)
) ENGINE=MyISAM;";


$sql[3] = "CREATE TABLE IF NOT EXISTS `ava_mochi_settings` (\n"
    . " `setting_id` varchar(2) NOT NULL,\n"
    . " `setting_name` varchar(30) NOT NULL,\n"
    . " `setting_value` varchar(35) NOT NULL,\n"
    . " PRIMARY KEY (`setting_id`)\n"
    . ") ENGINE=MyISAM;";

$sql[4] = "ALTER TABLE `ava_games` ADD `instructions` TEXT NOT NULL";
$sql[5] = "ALTER TABLE `ava_games` ADD `mochi` TINYINT(1) NOT NULL";
$sql[6] = "ALTER TABLE `ava_games` ADD `rating` DECIMAL(5,1) NOT NULL";
$sql[7] = "ALTER TABLE `ava_games` ADD `featured` TINYINT(1) NOT NULL";

$sql[8] = "ALTER TABLE `ava_users` ADD `favourites` text NOT NULL";
$sql[9] = "ALTER TABLE `ava_users` ADD `avatar` VARCHAR(25) NOT NULL";
$sql[10] = "ALTER TABLE `ava_users` ADD `points` INT(10) NOT NULL";
$sql[11] = "ALTER TABLE `ava_users` ADD `ratings` INT(5) NOT NULL";
$sql[12] = "ALTER TABLE `ava_users` ADD `comments` INT(5) NOT NULL";
$sql[13] = "ALTER TABLE `ava_users` ADD `messages` INT(5) NOT NULL";

$sql[14] = "ALTER TABLE `ava_games` CHANGE `catergory_id` `category_id` INT(10) NOT NULL";

$sql[15] = "ALTER TABLE `ava_settings` ADD `admin_email` VARCHAR(60) NOT NULL";
$sql[16] = "ALTER TABLE `ava_settings` ADD `seo_extension` VARCHAR(10) NOT NULL";

$sql[17] = "UPDATE ava_settings SET template_url='/templates/red',  admin_email='noreply@yoursite.com', seo_extension='.html'";

$sql[18] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('1', 'mochi_action', '1')";
$sql[19] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('2', 'mochi_adventure', '1')";
$sql[20] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('3', 'mochi_board', '1')";
$sql[21] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('4', 'mochi_casino', '1')";
$sql[22] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('5', 'mochi_dressup', '1')";
$sql[23] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('6', 'mochi_driving', '1')";
$sql[24] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('7', 'mochi_education', '1')";
$sql[25] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('8', 'mochi_fighting', '1')";
$sql[26] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('9', 'mochi_other', '1')";
$sql[27] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('10', 'mochi_customize', '1')";
$sql[28] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('11', 'mochi_puzzle', '1')";
$sql[29] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('12', 'mochi_rhythm', '1')";
$sql[30] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('13', 'mochi_shooting', '1')";
$sql[31] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('14', 'mochi_sports', '1')";
$sql[32] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('15', 'mochi_strategy', '1')";
$sql[33] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('16', 'mochi_pubid', '')";
$sql[34] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('17', 'mochi_secretkey', '1')";
$sql[35] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('18', 'max_feed', '1000')";
$sql[36] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('19', 'curl', '1')";
$sql[38] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('20', 'download', '1')";

for ($i=1; $i<=38; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

echo '<div class="em">New tables added to database</div>';
echo '<br /><div class="thelinks"><a href="step3.php">Next step</a></div>';
?>
</div>
</body>
</html>