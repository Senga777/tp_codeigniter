<?php

/* 
 * Vue de toutes les recettes
 */

?>
<h1>Toutes les recettes</h1>
<ul>
    <?php 
    foreach($recipes as $recipe):
        echo '<li><a href="'. base_url("recipe/".$recipe->id).'">'.$recipe->name.'</a></li>';
    endforeach;  
    ?>
</ul>