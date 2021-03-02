<html>
    <head>
        <title>Recipes</title>
    </head>
    <body>
        <h1>Tag : <?= $tag->name; ?></h1>
        <!-- formulaire -->
        <?= form_open(base_url('tag/' . $recipe->id . '/update')) ?>
        <label>Modification :</label>
        <input type="text" name="new_tag" value="" size="50" />
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