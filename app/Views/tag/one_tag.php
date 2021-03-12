<?php
/**
 * @var App\Entities\Tag $tag
 * @var App\Entities\Recipe $recipe
 * @var array<App\Entities\Recipe> $recipes
 * @var array<App\Entities\Tag> $tags
 * @var bool $success
 */
?>
<html>
    <head>
        <title>Recipes</title>
    </head>
    <body>
        <h1>Tag : <?= $tag->name; ?></h1>
        <p>Slug : <?= $tag->slug; ?></p>
        <?php
        echo view('alerts/success');
        echo view('alerts/errors');
        ?>

        <!-- formulaire -->
        <?= form_open(base_url('tag/update')) ?>
        
        <label>Modification d'un Tag :</label>
        <input type="hidden" name="tag_id" value="<?= $tag->id ?>">
        <input type="text" name="tag_name" value="" size="50" />
        <br>
        <input type="submit" value="Submit" />
    </form>

    
    
    <p>Les recettes liées : </p>

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