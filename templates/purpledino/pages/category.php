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
	    <p><?php include (  './includes/modules/content_title.php'  ); ?></p>
	   </div>
	   
	   <div class="generalgames_box">
<div class="sort_options">
		<?php if ($cat_info['total_subcats'] != 0) {
						echo '<div class="category_subcats">'.CATEGORY_SUBCATS.': '; include 'includes/category/sub_categories.inc.php'; echo '</div>';
					}
			 include (  './includes/category/sort_options.inc.php'  ); // Include the sort-by options ?>
	</div>
    <div class="category_container">
    <ul>
    	<?php include (  './includes/category/category_main.inc.php'  ); // Include the homepage categories ?>
    </ul>
    	<br style="clear:both" />
    	<div class="category_pages">
    		<?php include (  './includes/category/pages.inc.php'  ); // Include the links to other pages ?>
    	</div>
    </div>
	   </div>
	   
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