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
