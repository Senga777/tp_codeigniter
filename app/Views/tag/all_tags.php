<html>
    <head>
        <title>Tags</title>
    </head>
    <body>
<h1>Toutes les tags</h1>
<ul>
    <?php 
    foreach($tags as $tag):
        echo '<li><a href="'. base_url("tag/".$tag->id).'">'.$tag->name.'</a></li>';
    endforeach;  
    ?>
</ul>

    <a href="<?= base_url(""); ?>">Retour</a>

</body>
</html>