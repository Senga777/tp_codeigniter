<?php
/*
 * Ajouter un tag à une recette
 */
?>
<html>
    <head>
        <title>Recipe</title>
    </head>
    <body>
        <h1>Recette : <?= $recipe->name; ?></h1>
        <?php
        if (isset($validation)) {
            echo $validation->listErrors();
        }
        ?>    
        <?php
        if (isset($success) && $success == true) {
            // Afficher un message de succes  
            echo view('alerts/success');
        }
        ?>
        <!-- formulaire -->
        <?= form_open(base_url('recipe/' . $recipe->id . '/add')) ?>
        <label>Nouveau tag</label>
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
    const ROOT = '<?= base_url();?>';
    </script>
<script src="<?= base_url('js/app.js'); ?>" type="text/javascript"></script>
</body>
</html>