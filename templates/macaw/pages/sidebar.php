<div class="sidebar">

<p class="sidebar_players">Top Players</p>
	    <div class="sidebar_BOX">
	       <ul class="sidebar_members">
	       
	       <?php include('./includes/modules/top_players.php');?>	        
	       </ul>
	    </div>
	    
<p class="sidebar_popular"><?php echo POPULAR_MODULE;?></p>
	    <div class="sidebar_BOX">
	       <ul class="sidebar_games">
	       <?php include('./includes/modules/popular.php');?>	        
	       </ul>
	    </div>

<p class="sidebar_fav"><?php echo FAVOURITE_MODULE;?></p>
	    <div class="sidebar_BOX">
	       <ul class="sidebar_games_list">
	    <?php include('./includes/modules/favourites.php');?>	        
	       </ul>
	    </div>

<div style="float:left; width: 200px; text-align:center; min-height: 200px; margin: 0 0 0 9px;">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- ads 200x200 -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:200px;height:200px"
         data-ad-client="ca-pub-2441810032412224"
         data-ad-slot="6090873793"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
	<?php advert('small_square'); ?>
</div>

</div>