
<?php
$errors = $session->getFlashdata('errors') ?? [];
if (!empty($errors)) :
    ?> 
    <h2>Errors</h2>
    <ul>
        <?php
        if (is_array($errors)) {
            foreach ($errors as $e) :
                echo '<li>' . $e . '</li>';
            endforeach;
        } else {
            echo $errors;
        }
        ?>
    </ul>
    <?php

 endif;
