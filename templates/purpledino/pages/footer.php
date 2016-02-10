<div class="hometagbox" style="margin-left:0; margin-right:0;">
	   <p class="hometagbox_title">Latest News</p>
	   <ul>
	   <?php include('./includes/modules/latest_news.php');?>
	   </ul>
	 </div>
	 
	 <div class="hometagbox">
	   <p class="hometagbox_title">Our Friends</p>
	   <ul>
	         <?php include('./includes/modules/links.php');?>
	   </ul>
	 </div>
	 
	 <div class="hometagbox">
	   <p class="hometagbox_title">Top Players</p>
	   
	   <ul>
	   <?php include('./includes/modules/top_players.php');?>
	   </ul>
	   
	 </div>
	 
	 <div class="hometagbox">
	   <p class="hometagbox_title">Browse Games by Tags</p>
	   
	   <?php include('./includes/modules/tag_cloud.php');?>
	 </div>
	 
	</div>
	<div class="footer">
	  <div class="siteinfoBOX">
	    <?php include './templates/purpledino/sections/SEO.php';?>
	 </div>	 
	  <div class="footer_content">
	  <ul>
	  <?php include('./includes/modules/pages_horizontal.php');?>
	  </ul><br />
	  <p>&copy; Copyright <?php $today = date("Y"); echo $today;?> <?php echo $setting['site_name'];?>. All rights reserved. Powered by avarcade.<br />
All graphics, games, and other multimedia are copyrighted to their respective owners and authors.</p>
	  </div>
	  <div style="float:right; width: 125px;">
	<a href="#" title="AV Arcade Template by Arcade Mug"><img style="width: 125px; height: 46px; border:0;" src="<?php echo $setting['site_url'];?>/templates/purpledino/images/copyright.png" alt="Yisus Design" /></a>
	</div>
	 	</div>
	 <?php include 'includes/footer_data.php';?>
</body>
</html>