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
> 

## Méthode POST

Exemple pour recevoir les données d'un formulaire : https://codeigniter.com/user_guide/tutorial/create_news_items.html
Récupérer les paramètre $_POST

```
$post_title = $this->request->getPost('title');
```
Ceci est  équivalent à :
```
$post_title = filter_input(INPUT_POST, 'title');
```
> Mot clés : Retrieving Input, Post, Request

Pensez à modifier la route

Quand l'a méthode d'envoi est du GET :
```
$routes->get('news/create', 'News::create');
```
Quand l'a méthode d'envoie est du POST:
```
$routes->post('news/create', 'News::create');
```
Consignes : Utilisez des méthodes POST dès que vous faites de l'écriture en base de données : Create, Update, Delete et utilisez la méthode GET des que vous faites de la lecture de données.
