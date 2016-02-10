<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: Upgrade</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head">AV Arcade: Upgrade</div>
<div class="main">
<?php
include('../../config.php');


//////////////////////////////////////////////////////////////////////////////////////////////

$query = mysql_query("SELECT * FROM ava_games ORDER BY id DESC");
while ($go = mysql_fetch_array($query)) {
	
	$cat_numb = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_ratings WHERE game_id='$go[id]'"),0);
	$total_plays1 = mysql_query("SELECT sum(rating) AS rating FROM ava_ratings WHERE game_id='$go[id]'");
	$total_plays2 = mysql_fetch_array($total_plays1);

	if ($cat_numb == 0) { 
		$rating = 0; 
	}
	else {
		$rating = ($total_plays2['rating'] / $cat_numb);
	}
	
	mysql_query("UPDATE ava_games SET rating=$rating WHERE id=$go[id]") or die (mysql_error());
	
}

echo '<div class="em">Game ratings updated.</div>';
echo '<br /><div class="thelinks"><a href="../upgrade51">Next</a></div>';
?>
</div>
</body>
</html>