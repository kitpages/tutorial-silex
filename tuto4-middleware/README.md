Tuto 4 : middleware (ou gestion de la sécurité)
===============================================

Points à noter :

* dans composer.json, demander de récupérer twig
```javascript
{
    "require": {
        "silex/silex": "~1.0",
        "twig/twig": "~1.8"
    }
}
```

* dans index.php
```php
// enregistrement de twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// penser au "use" pour pouvoir utiliser $app dans un controller
$app->get('/', function () use ($app) {

// appeler le template twig :
return $app['twig']->render('2e-page-twig.twig', array(
    'val' => "un élément <em>en italique</em> dans ma valeur.",
));
```

* les templates sont dans le répertoire views.
* noter le layout qui donne la structure générale du site
* noter le système d'extend avec le layout
```twig
{% extends "layout.twig"%}
```

* Noter le système d'échappement automatique dans le fichier 2e-page-twig.twig

