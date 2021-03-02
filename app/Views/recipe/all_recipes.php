<html>
    <head>
        <title>Recipes</title>
    </head>
    <body>
<h1>Toutes les recettes</h1>
<?php
if(isset($tag)):
    ?>
<h2><?= $tag->name; ?></h2>
<?php
endif;


?>
<ul>
    <?php 
    foreach($recipes as $recipe):
        echo '<li><a href="'. base_url("recipe/".$recipe->id).'">'.$recipe->name.'</a></li>';
    endforeach;  
    ?>
</ul>
  <?php
  echo view("navigation");
  ?>


</body>
</html>