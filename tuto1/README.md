Tuto 1 : Installation de base de Silex
======================================

## Installer Silex

* Créer un répertoire tuto1 et aller dedans
* Installer l'outil composer

```bash
curl -s http://getcomposer.org/installer | php
```

* créer un fichier composer.json

```javascript
{
    "require": {
        "silex/silex": "~1.0"
    }
}
```

* Installer silex et ses dépendances

```bash
php composer.phar install
```

## Créer son premier site Silex

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app->get('/', function () {
    return "Home";
});
$app->get('/blog/{id}', function ($id) {
    return "blogId=$id";
});
// definitions
$app['debug'] = true;
$app->run();
```

## Configurer son apache

```apache
<VirtualHost *>
    ServerName silex.dev.com
    ServerAdmin admin@hotmail.com
    DocumentRoot /home/webadmin/eclipse/silex/tuto1/web
    addDefaultCharset UTF-8

    <Location />
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [QSA,L]
    </Location>
</VirtualHost>
```
