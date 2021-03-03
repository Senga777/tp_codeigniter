<?php
/**
 * @var App\Entities\Recipe $recipe
 * @var array<App\Entities\Tag> $tags
 */
?>
<html>
    <head>
        <title>Recipe</title>
    </head>
    <body>        
        <h1>Recette : <?= $recipe->name; ?></h1>
        <?php
        echo view('alerts/success');
        echo view('alerts/errors');
        ?>
        <!-- formulaire -->
        <?= form_open(base_url('recipe/add/tag')) ?>
        <label>Nouveau tag</label>
        <input type="hidden" name="recipe_id" value="<?= $recipe->id ?>" size="50" />
        <input type="text" name="new_tag" value="" size="50" />
        <br>
        <input type="submit" value="Submit" />
    </form>
    <!-- Fin du formulaire -->
    <p>Tous les tags liés :</p>
    <ul data-ir="<?= $recipe->id ?>" id="recipe_tag--list">
        <?php foreach ($tags as $tag): ?>
            <li>
                <a href="<?= base_url("tag/" . $tag->id) ?>"><?= $tag->name ?></a>
                <button class="recipe_tag--remove" data-it="<?= $tag->id ?>">X</button>
            </li>
            <?php
        endforeach;
        ?>
    </ul>


    <?php
    echo view("navigation");
    ?>
    <script type="text/javascript">
        const ROOT = '<?= base_url(); ?>';
    </script>
    <script src="<?= base_url('js/app.js'); ?>" type="text/javascript"></script>
</body>
</html>