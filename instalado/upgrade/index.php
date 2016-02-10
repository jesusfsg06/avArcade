<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AV Arcade: New install</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="head2">AV Arcade: Upgrade</div>
<div class="main2">
<?php
include('../../config.php');


//////////////////////////////////////////////////////////////////////////////////////////////

include ('schema_update.php');

echo '<div class="em">Database schema updated</div>';

echo '<br /><div class="thelinks"><a href="step2.php">Next step</a></div>';
?>
</div>
</body>
</html>