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


<div class="gameplayBOX">
	   <div class="newestgamesTop">
	    <p><?php include (  './includes/modules/content_title.php'  ); // Include the page title ?></p>
	   </div>

	  <div class="gameswfBOX">
	  
	      <div class="gameplay">
	      <?php include (  './includes/view_game/game.inc.php'  ); // Include the flash game ?>
          <?php echo $game['game_message'];?>
	      </div>
	      
	      <div class="gamefunctions">
	         <div style="float:left; width: 300px;">
	         <div class="common_btn"><?php echo $game['report_game'];?></div>
	         <div class="common_btn"><?php echo $game['fav_game'];?></div>
	         <div class="common_btn"><a href="<?php echo $game['full_screen_url'];?>">Fullscreen</a></div>    
	         </div>
	         <!-- end of left side -->
	         
	         <div style="float:right; width: 550px;">
	          <div class="gameplay_sharebox">
	           <span class="share_titletext">Share this game on social sites and earn points!</span>
	           <?php include './includes/view_game/social_icons.inc.php'; ?>
	          </div>
	            <div class="ratingbox" style="float:right; font: 12px arial; color: #ffffff;">
	            <?php echo $game['new_rating_form'];?>
	            </div>
	         </div>
	         <!-- end of right side -->
	      </div>
	  
	  </div>
	  <!-- end of gameswfBOX -->

	 </div>
	 <!-- end of gameplayBOX -->



<div class="gamepage_miscBOX">
	    <div style="float:left; width: 162px;">
	       <div class="gamepage_tallad">
	       <?php include('./templates/purpledino/sections/advert.php');
echo $gamepage_160; ?>
	       </div>
	    </div>
	    
	    <div style="float:left; width: 450px;">
	    
	    <div id="tabs" style="float: left; width: 450px;">      
	      <ul class="tab_btns">
	        <li><a href="#tab-1">Game Info</a></li>
	        <li><a href="#tab-2">Comments</a></li>
	        <?php if ($game['highscores'] == 1) { ?>
	        <li><a href="#tab-3">Highscore</a></li>
	        <?php } ?>
	      </ul>
	      <div id="tab-1" class="tab_contents">
	       
	       <div style="float:left; width: 150px;">
	         <a href="#"><img class="gameIMGBOX" src="<?php echo $game['image_url'];?>" width="70" height="70" alt="<?php echo $game['name'];?>" /></a>
	       </div>
	       <div style="float: right; width: 270px;">
	         <p class="gameinfo_txt" style="font-weight:bold; color: #ff4e00;"><?php echo $game['name'];?></p>
	         <p class="gameinfo_txt"><span style="font-weight:bold; color: #000000;">Date added:</span> <?php echo $game['date_added']; ?></p>

             <p class="gameinfo_txt"><span style="font-weight:bold; color: #000000;">Tags:</span><?php echo $game['tags']; ?></p>
             <div style="overall_ratingbox">
               <?php echo $game['rating_image'];?>
             </div>
             
	       </div>
	       
	       <div style="float:left; border-top: 1px solid #ccbae7; margin: 10px 0 10px 0; width: 430px;">
	       
	       <p class="gameinfo_txt" style="margin: 10px 0 0 0; font-weight:bold; color: #ff4e00;">Game Information:</p>
			<p class="gameinfo_txt"><?php echo ''.$game['description'].''; ?></p>
	    
	    <?php if ($game['instructions'] != '') {
			echo '<p class="gameinfo_txt" style="margin: 10px 0 0 0; font-weight:bold; color: #ff4e00;">How to play:</p>
			<p class="gameinfo_txt">'.$game['instructions'].'</p>';
		}
		
		if ($setting['add_to_site'] == 1) {
			echo '<p class="gameinfo_txt" style="margin: 10px 0 0 0; font-weight:bold; color: #ff4e00;">'.GAME_EMBED.':</p>';
			include (  './includes/view_game/embed_game.inc.php'  ); // Include comments
		} 
		
		if ($game['submitter'] != 0) {
			echo '<div class="gameinfo_txt"><span style="font-weight:bold; color: #000000;">Game Submitter:</span><a href="'.$game['submitter_url'].'">'.$game['submitter_name'].'</a></div>';
		}
		
		?>

<div stype="margin: 10px 0 5px 0;" class="social_ref_url">
	<p class="gameinfo_txt" style="margin: 10px 0 0 0; font-weight:bold; color: #ff4e00;"><?php echo $your_url_title;?>:</p>
	<input name="ref_url" class="refer_textbox" value="<?php echo $short_url;?>" onclick="this.select();" />
</div>

<?php if($user['admin'] == 1) {?>
<div class="common_btn_rev"><?php echo $game['admin_options'];?></div>
<?php } ?>
		
		
	       </div>
	       
	      </div>
	      
	      <div id="tab-2" class="tab_contents">
	        
	        
	        <div class="comments_container">
			
			<?php include (  './includes/forms/add_comment_form.php'  ); // Include comments ?>
			<?php include (  './includes/view_game/game_comments.inc.php'  ); // Include comments ?>
			
			</div>
	        
	        
	        
	      </div>
	      
	      <?php if ($game['highscores'] == 1) { ?>
	      <div id="tab-3" class="tab_contents">
	      
	      
	<div class="game_column2">
		<div class="game_info_header">
			<?php echo GAME_HIGHSCORES;?>
		</div>
		<div id="highscores_ajax">
			<?php include (  './includes/view_game/highscores.inc.php'  ); // Include highscores ?>
		</div>
	</div>

	      	      
	      </div>
	      <?php } ?>
	      <!-- end of tab 3 -->

	    </div>
	    
	    	    <?php include('./templates/purpledino/sections/SHARE.php');
echo $FB_LIKE; ?>
</div>
	    <!-- end of left side -->
	    
	    <div style="float:right; width:302px;">
	    
	    <div class="gamepage_boxad">
	    <?php include('./templates/purpledino/sections/advert.php');
echo $gamepage_300; ?>
	    </div>
	    
	    <div class="gamepage_moregames">
	     
	     <div class="random_game_title">More games you may like...</div>
	      
	      <?php include (  './includes/view_game/random_games.inc.php'  ); // Include comments ?>

	    </div> 
	 </div>
	 <!-- end of gamepage_miscBOX -->
	 
	 </div>
	 <!-- end of right side -->

<?php if ($user['login_status'] == 1) { ?>
	 <div class="favgamesBOX">
	   <p class="favgame_title">Your Favorite Games 
	   <?php echo '<span style="float:right; font: 12px arial;">
	   <a href="'.ProfileUrl($user['id'], $user['seo_url']).'" style="color: #ffffff; text-transform: lowercase; text-decoration:none; background-color: #007293; padding: 5px 10px 5px 10px; -webkit-border-radius: 5px;-moz-border-radius: 5px; border-radius: 5px;">'.FAVOURITES_VIEW_ALL.' &raquo;</a></span></p> '; ?>

<?php include (  './includes/modules/favourites.php'  ); ?>

</div>

<?php } ?>



<?php include('footer.php'); ?>