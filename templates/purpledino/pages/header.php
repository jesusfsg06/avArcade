<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'includes/header_data.inc.php' ?>
<link rel="stylesheet" href="<?php echo $setting['site_url'];?>/templates/purpledino/style.css" type="text/css" />
<?php if (isset($is_forum_page)) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo $setting['site_url'].$setting['template_url'];?>/forums/forums.css" />
<?php } ?>
<script type='text/javascript' src='<?php echo $setting['site_url'].$setting['template_url'];?>/tooltip.js'></script>
<script type='text/javascript' src='<?php echo $setting['site_url'].$setting['template_url'];?>/spin.js'></script>
<script type='text/javascript' src='<?php echo $setting['site_url'].$setting['template_url'];?>/misc.js'></script>

<script type="text/javascript">

$(document).ready(function(){
$('#tabs > div').hide();
$('#tabs div:first').show();
$('#tabs ul li:first').addClass('active');
$('#tabs ul li a').click(function(){ 
$('#tabs ul li').removeClass('active');
$(this).parent().addClass('active'); 
var currentTab = $(this).attr('href'); 
$('#tabs > div').hide();
$(currentTab).show();
return false;
});
});
</script>

</head>
<body>
<?php
if ($setting['site_offline'] == 1) {
	echo '<div style="background-color:#73000b;text-align:center;color:#fff;font-family:Arial;padding:10px;">Matinence mode active - site not accessible to non-admins</div>';
}
?>
	<div class="header">
	
	  <div class="logoBOX">
	    <a href="<?php echo $setting['site_url'];?>"><img class="logo" src="<?php echo $setting['site_url'];?>/templates/purpledino/images/logo.png" alt="" /></a>
	  </div>
	  
	  <?php include('./templates/purpledino/sections/SHARE.php');
echo $share; ?>
	
	 <div class="userareaBOX">
	   <div class="user_area">
         <?php include './templates/purpledino/sections/user_area.php';?>
       </div>
	 </div>
	 <!-- end of userbox -->
	 
	</div>
	<div class="topmenu">
	 <ul>
	 <?php include('./includes/modules/pages_horizontal.php');?>
	 </ul>
	</div>
	<div class="category">
	 <ul>
	 <?php include('./includes/modules/categories_menu.php');?>
	 </ul>
	</div>
<div class="maincontent">
	   <div class="searchbox">
	   <p>Search Games</p>
	      <form action="<?php echo $setting['site_url']?>/index.php?task=search" method="get" onsubmit="<?php echo $search_function;?>">
	      <input name="task" type="hidden" value="search" />
	      <input name="q" type="text" size="20" id="search_textbox" value="<?php echo $search_val;?>" onclick="clickclear(this, '<?php echo SEARCH_DEFAULT;?>')" onblur="clickrecall(this,'<?php echo SEARCH_DEFAULT;?>')" class="searchINPUT"/>
	      <input id="box" type="image" src="<?php echo $setting['site_url'];?>/templates/purpledino/images/searchbtn.png" name="submit" value="search" class="searchBUTTON" />
  		</form>		
		
	   </div>
	   <div class="leaderad">
	   <?php include('./templates/purpledino/sections/advert.php');
echo $default_leaderboard; ?>
	   </div>