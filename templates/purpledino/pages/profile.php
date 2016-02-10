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
	    <p>	Profile</p>
	   </div>
	   
	   <div class="generalgames_box_profile" style="float:left; padding: 10px; width: 932px; font: 12px arial; color: #000000;">
	     
	     
	     <div class="profile_container">
		<div class="profile_header_avatar">
			<img src="<?php echo $profile['avatar_url'];?>" alt="Avatar" width="75" height="75" class="profile-header_avatar_img"/>
		</div>
		<div class="profile_header_info">
			<div class="profile_username">
				<?php echo $profile['name'];?>
			</div> 
			<div class="profile_points">
				<?php echo $profile['points'];?> <span class="small_points"><?php echo PROFILE_POINTS;?></span>
			</div>
			<br style="clear:both" />
			<div class="profile_stats">
				<?php echo LAST_ACTIVITY;?>: <?php echo $profile['last_activity'];?> &nbsp;&nbsp;<?php echo PROFILE_PLAYS;?>: <?php echo $profile['plays'];?> &nbsp;&nbsp;<?php echo PROFILE_RATINGS;?>: <?php echo $profile['ratings'];?> &nbsp;&nbsp;<?php echo PROFILE_COMMENTS;?>: <?php echo $profile['comments'];?>
			</div>
		</div>
		
		<div class="profile_header_buttons">
			<div class="profile_button">
				<?php echo $profile['button1'];?>
				<?php echo $profile['button2'];?>
			</div>
		</div>
</div>

<div class="profile_column1">
	<?php if ($setting['forums_installed'] == 1) { ?>
	<div class="profile_content_item">
		<div class="profile_left_header">
			<?php echo PROFILE_SIGNATURE_HEADER;?>
		</div>
		<div class="fav_container">
			<?php include('includes/profile/forum_signature.inc.php'); ?>
		</div>
	</div>
	<?php } ?>

	<div class="profile_content_item">
		<div class="profile_left_header">
			<?php echo $profile['name'].PROFILE_FAV_GAMES_HEADER;?>
		</div>
		<div class="fav_container">
			<?php include('includes/profile/fav_games.inc.php'); ?>
		</div>
	</div>
	
	<div class="profile_content_item">
		<div class="profile_left_header">
			<?php echo $profile['name'].PROFILE_SUBMITTED_GAMES_HEADER;?>
		</div>
		<div class="fav_container">
			<?php include('includes/profile/submitted_games.inc.php'); ?>
		</div>
	</div>
	
	<div class="profile_content_item">
		<div class="profile_left_header">
			<?php echo $profile['name'].PROFILE_COMMENTS_HEADER;?>
		</div>
		<div class="fav_container">
			<?php include('includes/profile/users_comments.inc.php'); ?>
		</div>
	</div>
</div>

<div class="profile_right_container">
<div class="profile_column2">
	<div class="module_header">
		<?php echo PROFILE;?>
	</div>
	<div class="user_info">
		<?php echo $profile['admin_edit'];?><br /><br />
		<?php
		if ($setting['forums_installed'] == 1) {
				echo '<span class="right_title">'.FORUM_POSTS.':</span><br /> <a href="'.$profile['forum_posts_link'].'" style="border:none;text-decoration:underline;">'.$profile['forum_posts'].'</a><br /><br />';
		}
		?>
		<?php
		if ($setting['forums_installed'] == 1) {
				echo '<span class="right_title">'.FORUM_POSTS.':</span><br /><a href="'.$profile['forum_posts_link'].'">'.$profile['forum_posts'].'</a><br /><br />';
		}
		?> 
		<span class="right_title"><?php echo PROFILE_LOCATION;?>:</span><br /><?php echo $profile['location'];?><br /><br />
		<span class="right_title"><?php echo PROFILE_BIO;?>:</span><br /><?php echo $profile['about'];?><br /><br />
		<span class="right_title"><?php echo EP_INTERESTS;?>:</span><br /><?php echo $profile['interests'];?><br /><br />
		<span class="right_title"><?php echo PROFILE_WEBSITE;?>:</span><br /><?php echo $profile['website_link'];?><br /><br />
		<span class="right_title"><?php echo PROFILE_JOINED;?>:</span><br /><?php echo $profile['join_date'];?><br /><br />
	</div>
</div>

<div class="ad_small_square">
		<?php advert('small_square'); ?>
	</div>

<div class="profile_column2">
	<div class="module_header">
		<?php echo USER_HIGHSCORES;?>
	</div>
	<div class="user_info">
		<?php include('includes/profile/user_highscores.inc.php'); ?>
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

</div>

<?php include('footer.php'); ?>	 