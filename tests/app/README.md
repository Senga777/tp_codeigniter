# Test Unitaire

## Installation de PhpUnit avec Composer :

Placer vous à la racine du projet puis exécuter la commande suivante

```bash
composer require --dev phpunit/phpunit
```

## Exécution des tests

```bash
./vendor/bin/phpunit
```

Utiliser une autre base de données pour effectuer les tests. 

Dans app/Config/DataBase.php
```php
/**
 * This database connection is used when
 * running PHPUnit database tests.
 *
 * @var array
 */
public $tests = [
    'DSN' => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'ma_bdd_test',
    'DBDriver' => 'MySQLi',
    'DBPrefix' => '',
    'pConnect' => TRUE,
    'DBDebug' => TRUE,
    'charset' => 'utf8',
    'DBCollat' => 'utf8_general_ci',
    'swapPre' => '',
    'compress' => FALSE,
    'encrypt' => FALSE,
    'strictOn' => FALSE,
    'failover' => []
];
    ```
