<?php
include('../../config.php');
include '../secure.php';
if ($login_status != 1) exit();
mysql_query("UPDATE ava_mochi SET visible='1' WHERE id='$_POST[id]'");
?>