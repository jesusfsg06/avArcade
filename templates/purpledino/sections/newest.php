<div class="newestgames">
	   <div class="newestgamesTop">
	    <p>Newest Games</p>
	   </div>
	   
	   <div class="featuredBoxAD">
       <div style="float:left; width: 300px; height: 250px; background-color: #ffffff;">
       <?php include('advert.php');
echo $newest_300; ?>
       </div>
     </div>

	  <div class="newestgamesBox">
	   <ul>
<?php

$sql = mysql_query("SELECT * FROM ava_games WHERE published=1 ORDER BY id desc LIMIT 8");
while($row = mysql_fetch_array($sql)) {
	
	$url = GameUrl($row['id'], $row['seo_url'], $row['category_id']);
	
	$name = shortenStr($row['name'], $template['module_max_chars']);
	
	if ($setting['module_thumbs'] == 1) {
		$image_url = GameImageUrl($row['image'], $row['import'], $row['url']);
		$image = '<img class="featuredThumb" src="'.$image_url.'" width="135" height="97" alt="'.$row['name'].'" /> ';
	}
	else {
		$image = '';
	}
	
	echo '<li><a href="'.$url.'" class="tooltip" title="'.$row['name'].'">'.$image.'<br />'.$name.'</a></li>';
}

?>

</ul>
	   </div>

	 </div>
<!-- end of newest games -->
