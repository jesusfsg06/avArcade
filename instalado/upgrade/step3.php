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

$query = mysql_query("SELECT * FROM ava_users ORDER BY id DESC");
while ($go = mysql_fetch_array($query)) {
	
	$total_comments = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_comments WHERE user=$go[id]"), 0);
	$total_ratings = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_ratings WHERE user_id=$go[id]"), 0);	
	$total_messages = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_messages WHERE `read` = 0 AND user_id=$go[id]"),0);

	mysql_query("UPDATE ava_users SET comments=$total_comments, ratings=$total_ratings, messages=$total_messages WHERE id=$go[id]") or die (mysql_error());

}

echo '<div class="em">User information updated</div>';
echo '<br /><div class="thelinks"><a href="step4.php">Next step</a></div>';
?>
</div>
</body>
</html>