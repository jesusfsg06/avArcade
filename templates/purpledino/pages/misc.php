<?php include('header.php'); ?>

<div class="featuredgames">

	 <div class="featuredgamesTop">
	  <p>Featured Games</p>
	 </div> 
	 <div class="featuredgamesBox">
	 <div class="randomslides">
	   <ul>
<?php include (  './includes/homepage/featured_games.inc.php'  ); ?>
 </ul>
 </div>
	   </div>
	 
	 </div>
	 <!-- end of featured games -->
	 
	 
	 
<div class="contentleft">
	   <div class="generalgames_top">
	    <p>	<?php include (  './includes/modules/content_title.php'  ); // Include the page title ?></p>
	   </div>
	   
	   <div class="generalgames_box" style="padding: 10px 0 10px 0; font: 12px arial; color: #000000;">
	     <?php include './includes/misc/misc.inc.php';?>	   </div>
	   
	 </div>
	 <!-- end of content left -->

<?php if ($user['login_status'] == 1) { ?>
<div class="favgamesBOX">
	   <p class="favgame_title">Your Favorite Games 
	   <?php echo '<span style="float:right; font: 12px arial;">
	   <a href="'.ProfileUrl($user['id'], $user['seo_url']).'" style="color: #ffffff; text-transform: lowercase; text-decoration:none; background-color: #007293; padding: 5px 10px 5px 10px; -webkit-border-radius: 5px;-moz-border-radius: 5px; border-radius: 5px;">'.FAVOURITES_VIEW_ALL.' &raquo;</a></span></p> '; ?>

<?php include (  './includes/modules/favourites.php'  ); ?>

</div>

<?php } ?>

<?php include('footer.php'); ?>