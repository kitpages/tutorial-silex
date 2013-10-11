<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;
// initialisation des services
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// les pages
$app->get('/', function () use ($app) {
    return $app['twig']->render('home.twig', array(
        'val' => "ma valeur",
    ));
});

$app->get('/2e-page-twig', function () use ($app) {
    return $app['twig']->render('2e-page-twig.twig', array(
        'val' => "un élément <em>en italique</em> dans ma valeur.",
    ));
});

// le lancement de l'application
$app->run();
