<?php
/*
 * Ajouter un tag à une recette
 */
?>
<html>
    <head>
        <title>Read</title>
    </head>
    <body>
        <h1><?= $recipe->name; ?></h1>
        <?php
        if (isset($validation)) {
            echo $validation->listErrors();
        }
        ?>

        <?= form_open(base_url('recipe/'.$recipe->id.'/add')) ?>

        <label>Nouveau tag</label>
        <input type="text" name="new_tag" value="" size="50" />
        <br>
        <input type="submit" value="Submit" />
    </form>
    <ul>
        <?php
        foreach ($tags as $tag):
            echo '<li><a href="' . base_url("tags/" . $tag->id) . '">' . $tag->name . '</a></li>';
        endforeach;
        ?>
    </ul>


    <a href="<?= base_url(""); ?>">Retour</a>

</body>
</html>