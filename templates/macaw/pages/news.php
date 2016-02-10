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
	  	  
<?php include('sidebar.php'); ?>

<div class="BOXRIGHT">

<div class="advertisement_leader">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- ads728x90 -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-2441810032412224"
         data-ad-slot="2498278992"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</div>

<div class="browse_cat_title"><?php 
		include (  './includes/modules/content_title.php'  ); // Include the page title 
		echo ' '.$news['rss_icon'];
	?></div>


<div class="MISCBOX" style="float:left; width: 737px;">

<?php include './includes/news/news_main.inc.php'; ?>
	
		
		<?php if ((isset($_GET['id'])) || (isset($_GET['name']))) {
			echo '<div class="news_comments_container">
			<div class="game_info_header">'.NEWS_COMMENTS.'</div>
			<div align="center">';
			include ('./includes/forms/add_news_comment_form.php');
			echo '</div>';
			include ('./includes/news/news_comments.inc.php');
			echo '</div>';
		}
	?>


</div>


</div>
<?php include('footer.php'); ?>