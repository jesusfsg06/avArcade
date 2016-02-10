<?php include('header.php'); ?>

<div class="randomBOX">
	   <p class="randomBOX_title">Random Games</p>
	    <?php include './templates/macaw/sections/randomSLIDE.php';?> 
	  </div>
	  <div style="float:left; width: 973px;">
	  <div class="yellowBOX">
	    <form action="<?php echo $setting['site_url']?>/index.php?task=search" method="get" onsubmit="<?php echo $search_function;?>">
	    <div><input name="task" type="hidden" value="search" /></div>
	    <div class="searchBOX">
	      <input name="q" type="text" size="20" id="search_textbox" value="<?php echo $search_val;?>" onclick="clickclear(this, '<?php echo SEARCH_DEFAULT;?>')" onblur="clickrecall(this,'<?php echo SEARCH_DEFAULT;?>')" class="searchINPUT"/>
	      <input id="box" type="image" name="submit" class="searchBUTTON" src="<?php echo $setting['site_url'];?>/templates/macaw/images/search.png" />
  		</div>
  		</form>
  		<div class="shareBOX">
          <?php include './templates/macaw/sections/SHARE.php';?> 
     	</div>
	  </div>
	  </div>


<div class="gameBOX">
	     <div class="gameBOX_top">
	       <h1><?php include (  './includes/modules/content_title.php'  ); // Include the page title ?></h1>
	     </div>
	     <div class="gameBOX_bg">
	       <center><?php include (  './includes/view_game/game.inc.php'  ); // Include the flash game ?></center>
	
	<?php echo $game['game_message'];?>
	        <div class="game-optionsBOX">
	          <div style="float:left; width: 400px;">
	            <?php if ($setting['report_permissions'] == "1" || $setting['report_permissions'] == "2" && $user['login_status'] == 1) { ?>

			<?php echo $game['report_game'];?>

		<?php } ?>
            <?php echo $game['fav_game'];?>
            
            <div class="normal_button"><a href="<?php echo $game['full_screen_url'];?>"><?php echo GAME_FULL_SCREEN;?></a></div>
            <div style="float:left; width: 400px; padding: 10px 0 0 10px;">
              <?php include './includes/view_game/social_icons.inc.php'; ?>
            </div>
	          </div>
	          <div style="float:right; width: 400px;">
	                <div class="starsBOX">
                       <p class="stars_title"><?php echo GAME_RATING;?>:</p>
                       <?php echo $game['rating_image'];?>
                    </div>
                    <div class="starsBOX">
                       <p class="stars_title"><?php echo GAME_YOUR_RATING;?>:</p>
                       <?php echo $game['new_rating_form'];?>
                    </div>
                    <div style="float:left; width: 400px;">
                       
<div class="social_ref_url">
	<div class="social_text">Share this game with your friends ( <?php echo $your_url_title;?> )</div>
	<input name="ref_url" class="refer_textbox" value="<?php echo $short_url;?>" onclick="this.select();" />
</div>
                    </div>
	          </div>
	        </div>
	     </div>
	     <div class="gameBOX_bottom">
	     </div>
</div>

<?php include('sidebar.php'); ?>

<div class="BOXRIGHT">
	    <div class="advertisement_leader">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- ads6 728x90 -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-2441810032412224"
                 data-ad-slot="1660674197"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>


	    </div>

<div class="TABBOX">

	       <ul id="tabut" class="tabuttons">
             <li><a href="#tab-1">Game Info</a></li>
             <li><a href="#tab-2">Comments</a></li>
             <?php if ($game['highscores'] == 1) { ?>
             <li><a href="#tab-3">High Scores</a></li>
             <?php } ?>
           </ul>
           <div id="tabs">
           <div id="tab-1" class="gameinfo_BOX">
                 
            <div style="float:left; width: 407px; padding: 0 0 15px 0; border-bottom: 4px solid #e8e8e8;">
            <div class="gameIMGBOX">
            <img style="width: 123px; height: 114px; padding: 5px; background-color: #ffffff; border:0;" src="<?php echo $game['image_url'];?>" alt="<?php echo $game['name'];?>" />
            </div>
            <p class="boxGAMESINFO_title"><?php echo ''.$game['name'].''; ?></p>
            <p class="boxGAMESINFO_desc"><?php echo ''.$game['description'].''; ?></p> 
            </div>
            
            <div class="gameSTATS">
            <?php 
		echo '<p><span style="color: #4d788b; font-weight:bold;">'.GAME_ADDED.':</span> '.$game['date_added'].'</p>';
		
		if ($game['instructions'] != '') {
			echo '<p><span style="color: #4d788b; font-weight:bold;">'.GAME_INSTRUCTIONS.':</span> '.$game['instructions'].'</p>';
		}
		echo '<p><span style="color: #4d788b; font-weight:bold;">'.GAME_TAGS.':</span> '.$game['tags'].'</p>';
		
		if ($game['submitter'] != 0) {
			echo '<p><span style="color: #4d788b; font-weight:bold;">'.GAME_SUBMITTER.':</span> <a href="'.$game['submitter_url'].'">'.$game['submitter_name'].'</a></p>';
		}
		
		?>
            </div>
                    
            
            
            
            
            <div class="shareBOX">
            
             <?php if ($setting['add_to_site'] == 1) {
			echo '<div style="float:left; width: 407px; min-height: 100px; margin: 10px 0 0 0;"><p class="social_text">'.GAME_EMBED.'</p>';
			include (  './includes/view_game/embed_game.inc.php'  ); // Include comments
			echo '</div>';
		} ?>
            </div>
            
            <div style="float:left; width: 407px; min-height: 300px; margin: 10px 0 0 0;">
              <?php include './templates/macaw/sections/FB.php';?> 
            </div>
            
            
            </div>

           <div id="tab-2" class="gameinfo_BOX">
           <p class="boxGAMESINFO_title" style="font-size: 18px; width:392px; float:left;"><?php echo GAME_COMMENTS;?></p>
           <div style="float:left; width: 407px;">
            <?php include (  './includes/view_game/game_comments.inc.php'  ); // Include comments ?>
            <?php include (  './includes/forms/add_comment_form.php'  ); // Include comments ?>
            </div>
           </div>
           
           <?php if ($game['highscores'] == 1) { ?>
           <div id="tab-3" class="gameinfo_BOX">
             
            

			<p style="font-size: 18px; width:392px; float:left;" class="boxGAMESINFO_title"><?php echo GAME_HIGHSCORES;?></p>
		    <div id="highscores_ajax">
			<?php include (  './includes/view_game/highscores.inc.php'  ); // Include highscores ?>
			</div>

            
           </div>
           <?php } ?>
           
	    </div>	 
	    
	    </div>
	    
	    <div class="gameadvert_BOX">
           <?php advert('banner'); ?>
           
           
           
            <div class="BOXGAMES_HORIZON_SMALL">
	       <p class="BOXGAMES_HORIZON_SMALL_TITLE">More Games</p>
	       <ul>
	        
	       <?php
	       
	        defined( 'AVARCADE_' ) or die( '' );
$sqla = mysql_query("SELECT * FROM ava_games WHERE published=1 ORDER BY rand() LIMIT 8");

while($row = mysql_fetch_array($sqla)) {
	
	$random_game = GameData($row, 'random');
		
$sqla = mysql_query("SELECT * FROM ava_games WHERE published=1 ORDER BY rand() LIMIT 8");

while($row = mysql_fetch_array($sqla)) {
	
	$random_game = GameData($row, 'random');
	
	
	$tuptip = '<div class=\'tooltipBOX_HORIZON\'><div style=\'float:left; width: 200px; padding: 10px 0 0 0px;\'>
	         <img class=\'BOXGAMESTIP_IMG\' src=\''.$random_game['image_url'].'\' alt=\'\' /><br />
	         <span class=\'tooltipBOX_title\'>'.$random_game['name'].'</span><br />
	         <span style=\'display:block; padding: 5px;\'>'.$random_game['description'].'</span>
	         <span style=\'display: block; width: 100px; padding: 0px 0 0 50px;\'>
	         '.$random_game['rating_image'].'
	         </span>
	         <div style=\'float:left; width: 200px; margin: 10px 0 5px 0;\'><span style=\'font-weight:bold; color: #ff7800;\'>'.$random_game['plays'].' People Played</span> </div>
	         </div></div>';

		
echo '
<li><a href="'.$random_game['url'].'" rel="tooltip" title="'.$tuptip.'">
<img class="BOXGAMES_SMALL_IMG" src="'.$random_game['image_url'].'" alt="'.$random_game['name'].'" /><br />
'.$random_game['name'].'
</a>
</li>';

}


} ?>
	       
	       </ul>
	    </div>
  
              
        </div>
        
          
	 
	  </div>

















<?php include('footer.php'); ?>