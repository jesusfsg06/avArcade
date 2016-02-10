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

<?php include('./templates/purpledino/sections/newest.php');?>

<div class="contentleft">
	   <div class="generalgames_top">
	    <p>Most popular Games</p>
	   </div>
	   
	   <div class="generalgames_box_home">
	     <ul>
	     <?php
$sql = mysql_query("SELECT * FROM ava_games WHERE published=1 ORDER BY hits desc LIMIT 20");
while($row = mysql_fetch_array($sql)) {

$i++;
	
	$url = GameUrl($row['id'], $row['seo_url'], $row['category_id']);
		
	$name = shortenStr($row['name'], 18);
	
	if ($setting['module_thumbs'] == 1) {
		$image_url = GameImageUrl($row['image'], $row['import'], $row['url']);
		$image = '<img class="GThumb_home" src="'.$image_url.'" alt="'.$row['name'].'" /> ';
	}
	else {
		$image = '';
	}
	
	echo '<li><a href="'.$url.'" class="tooltip" title="'.$row['name'].'">'.$image.'<br />'.$name.'</a></li>';
	
	if($i==10){ echo '<div style="float:right; width: 336px; background-color: #d1d1d1; height: 280px; margin: 0 0 6px 0;">'; include('./templates/purpledino/sections/advert.php');
echo $big_square; echo '</div>';
	
	}
}


?>
	 	 </ul>
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