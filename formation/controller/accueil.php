<?php
$app->get('/', function () use ($app) {
    return $app['twig']->render('hello.twig', array(
        "name" => "Denis".monInfo()
    ));
});
