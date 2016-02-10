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
    <!-- ads2 728x90 -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-2441810032412224"
         data-ad-slot="4753741398"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

</div>

<h1 class="browse_cat_title"><?php include (  './includes/modules/content_title.php'  ); // Include the page title ?> Games</h1>


<div class="BOXGAMES_BUTTONS">

</div>

	<div class="BOXGAMES_HORIZON" id="Action" style="display: block;">
  <div class="homecat_titles">
<?php if ($cat_info['total_subcats'] != 0) {
						echo '<div class="category_subcats"><p class="category_subcats_nonlink">'.CATEGORY_SUBCATS.': </p> '; include 'includes/category/sub_categories.inc.php'; echo '</div>';
					}
			 include (  './includes/category/sort_options.inc.php'  ); // Include the sort-by options ?>
</div>
<ul>

<?php include (  './includes/category/category_main.inc.php'  ); // Include the homepage categories ?>

</ul>
</div>

<div class="paginationBOX"><?php include (  './includes/category/pages.inc.php'  ); // Include the links to other pages ?></div>

</div>
<?php include('footer.php'); ?>