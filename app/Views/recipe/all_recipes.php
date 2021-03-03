<?php
/**
 * @var array<App\Entities\Recipe> $recipes
 * @var App\Entities\Recipe $recipe
 */
?>
<html>
    <head>
        <title>Recipes</title>
    </head>
    <body>
        <h1>Toutes les recettes</h1>

        <ul>
        <?php
        foreach ($recipes as $recipe):
            echo '<li><a href="' . base_url("recipe/" . $recipe->id) . '">' . $recipe->name . '</a></li>';
        endforeach;
        ?>
        </ul>
        <?php
        echo view("navigation");
        ?>
    </body>
</html>