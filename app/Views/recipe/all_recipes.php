<?php

/* 
 * Vue de toutes les recettes
 */

?>
<h1>Toutes les recettes</h1>
<ul>
    <?php 
    foreach($recipes as $recipe):
        echo '<li>'.$recipe->getName().'</li>';
    endforeach;  
    ?>
</ul>