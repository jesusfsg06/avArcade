<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade Update: 5.0.X to 5.1</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>
<body>
<div class="head2">AV Arcade: v5.0.X to 5.1 update</div>
<div class="main2">
<?php
include('../../config.php');

$sql = array();
$sql[1] = 'ALTER TABLE `ava_mochi` ADD `featured` TINYINT(1) NOT NULL;'; 
$sql[2] = "INSERT INTO `ava_mochi_settings` (`setting_id`, `setting_name`, `setting_value`) VALUES\n"
    . "('20', 'download', '1')";

for ($i=1; $i<=2; $i++)
{
	$q = mysql_query($sql[$i]);
	if (!$q)
 	{
  		die('Error on sql '.$i.': ' . mysql_error());
  	}
}

echo 'Update complete.';

?>
</div>
</body>
</html>