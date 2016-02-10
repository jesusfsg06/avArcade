
<div class="bottomBOXES">
	    <div class="cubeBOX">
	     <p class="cubeBOX_title">Latest News</p>
	       <ul>
	       <?php
$sql = mysql_query("SELECT * FROM ava_news ORDER BY id desc LIMIT 5");
while($row = mysql_fetch_array($sql)) {
			
	$url = NewsUrl($row['id'], $row['seo_url']);
		
	$title = shortenStr($row['title'], $template['module_max_chars']);
	
	if ($setting['module_thumbs'] == 1) {
		$image_url = $setting['site_url'].'/uploads/news_icons/'.$row['image'];
		$image = '<img src="'.$image_url.'" width="25" height="25" style="vertical-align: middle;" />';
	}
	else {
		$image = '';
	}
	
	echo '<li class="news">'.$image.' <a href="'.$url.'">'.$title.'</a></li>';
}
?>

	       </ul>
	    </div>
	    
	    <div class="cubeBOX">
	     <p class="cubeBOX_title">Newest Games</p>
	       <ul>
	         <?php include('./includes/modules/newest.php');?>
	       </ul>
	    </div>
	    
	    <div class="cubeBOX">
	     <p class="cubeBOX_title">Site Links</p>
	       <ul>
	         <?php include('./includes/modules/links.php');?>
	       </ul>
	    </div>
	    
	    <div class="cubeBOX">
	     <p class="cubeBOX_title">Game Tags</p>
	     <?php include('./includes/modules/tag_cloud.php');?>
	    </div>
	    
	  </div>
	 
	</div>
	<div class="seoBOX">
	  <?php include './templates/macaw/sections/SEO.php';?> 
	</div>
	<div class="footer">
	  <div class="footerlinks">
	   <ul>
	   <?php include('./includes/modules/pages_horizontal.php');?>
	   </ul><br />
	   <p>&copy; Copyright <?php $today = date("Y"); echo $today;?> <?php echo $setting['site_name'];?>. All rights reserved. Powered by YisusDesign.<br />
          <!-- Begin Motigo Webstats counter code -->
          <a id="mws4950820" href="http://webstats.motigo.com/">
              <img width="80" height="15" border="0" alt="Free counter and web stats" src="http://m1.webstats.motigo.com/n80x15.gif?id=AEuLJAsPPwhfaHNX69AtAsItPKpg" /></a>
          <script src="http://m1.webstats.motigo.com/c.js?id=4950820&amp;lang=ES&amp;i=3" type="text/javascript"></script>
          <!-- End Motigo Webstats counter code -->
	  </div>
	  <div class="footerSHARE">
	  <?php include './templates/macaw/sections/FOOTERSHARE.php';?> 
	  </div>
	</div>
<?php include 'includes/footer_data.php';?>
</body>
</html>