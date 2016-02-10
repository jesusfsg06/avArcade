<?php
// mySQL information
$server = '23.253.3.3';                   // MySql server
$username = '351333_Gameusr';                      // MySql Username
$password = 'Ju3gospass' ;                         // MySql Password
$database = '351333_game';                  // MySql Database

// The following should not be edited
  $con = mysql_connect("$server","$username","$password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("$database", $con); 


// Get settings
if (!isset($install)) {
	$sql = mysql_query("SELECT * FROM ava_settings");
	while ($get_setting = mysql_fetch_array($sql)) {
		$setting[$get_setting['name']] = $get_setting['value'];
	}
}
?>