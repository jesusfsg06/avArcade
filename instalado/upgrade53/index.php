<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: Upgrade</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: Upgrade from 5.3+</div>
<div class="main2">
<?php
$install = 1;
include('../../config.php');
include '../../includes/core.php';


//////////////////////////////////////////////////////////////////////////////////////////////

$sql = array();

$sql[1] = "ALTER TABLE `ava_cats` ADD `description` varchar(255) NOT NULL";
$sql[2] = "ALTER TABLE `ava_cats` ADD `keywords` varchar(255) NOT NULL";

$sql[3] = "ALTER TABLE `ava_cats` ADD `seo_url` varchar(100) NOT NULL";
$sql[4] = "ALTER TABLE `ava_games` ADD `seo_url` varchar(100) NOT NULL";
$sql[5] = "ALTER TABLE `ava_news` ADD `seo_url` varchar(100) NOT NULL";
$sql[6] = "ALTER TABLE `ava_pages` ADD `seo_url` varchar(100) NOT NULL";
$sql[7] = "ALTER TABLE `ava_users` ADD `seo_url` varchar(100) NOT NULL";

$sql[8] = "UPDATE ava_settings SET value = '5.4' WHERE name = 'version'";

$sql[9] = "CREATE TABLE `ava_seonames` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seo_name` varchar(255) NOT NULL,
  `type` varchar(40) DEFAULT NULL,
  `uses` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM";

$sql[10] = "INSERT INTO `ava_settings` (`name`, `value`) VALUES\n"
    . "('homepage_order','random');";
    
$sql[11] = "CREATE TABLE `ava_usersonline` (
  `session_id` char(100) NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM";

for ($i=1; $i<=11; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

include '../seoname.php';

echo '<div class="em">Upgrade to 5.4 complete</div>';
echo '<br /><div class="thelinks"><a href="../upgrade54">Next step >></a></div>';
?>
</div>
</body>
</html>