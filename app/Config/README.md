# Les routes

Les routes sont définies dans app/Config/Routes.php

Vous devez créer vos propres routes en définissant :
- une URL
- la méthode d'envoie (GET ou POST)
- le controleur qui sera appelé
- la méthode exécuter dans le controleur

Exemple : 
```php
$routes->get('/tags', 'TagController::showTags');
```

> Mots clés : URI Routing