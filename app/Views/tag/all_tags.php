<?php
/**
 * @var array<App\Entities\Tag> $tags
 * @var App\Entities\Tag $tag
 */
?>
<html>
    <head>
        <title>Tags</title>
    </head>
    <body>
        <h1>Toutes les tags</h1>
        <ul>
            <?php
            foreach ($tags as $tag):
                echo '<li><a href="' . base_url("tag/" . $tag->id) . '">' . $tag->name . '</a></li>';
            endforeach;
            ?>
        </ul>

        <?php
        echo view("navigation");
        ?>

    </body>
</html>