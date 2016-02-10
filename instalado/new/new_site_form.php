<?php
function curPageURL() {
 $pageURL = 'http';
 if (isset($_SERVER["HTTPS"])) {
 	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 }
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

$url = str_replace("/install/new/index.php", "", "".curPageURL()."");

?>

<form id="form1" name="form1" method="post" action="finish.php">
<b>Site info: </b><br />
  <label>Site name<br />
  <input name="site_name" type="text" id="site_name" value="AV Arcade" class="tb" />
  </label>
  <p>
    <label>AV Arcade root url<br />
    <input name="site_url" type="text" id="site_url" value="<?php echo $url; ?>" class="tb" />
    </label>
  </p>
   <p>
    <label>Site Email address<br />
    <input type="text" name="site_email" id="site_email" class="tb" />
    </label>
  </p>
  <br />
  <b>Admin info: </b><br />
  <label>Username<br />
  <input type="text" name="admin_user" id="admin_user" class="tb" />
  </label>
  <p>
    <label>Password<br />
    <input type="password" name="admin_pass" id="admin_pass" class="tb" />
    </label>
  </p>
  <p>
    <label>Email address<br />
    <input type="text" name="admin_email" id="admin_email" class="tb" />
    </label>
  </p>
  <p>
    <label>
    <input type="submit" name="go" id="go" value="Submit details" />
    </label>
  </p>
</form>