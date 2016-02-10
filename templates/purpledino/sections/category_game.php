<?php
echo '<li><a href="'.$game['url'].'" class="tooltip" title="'.$row['name'].'"><img class="GThumb" src="'.$game['image_url'].'" alt="'.$game['name'].'" /><br /> '.$game['name'].'</a>'.$game['highscore_image'].'</li>';
?>