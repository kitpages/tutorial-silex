<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app->get('/', function () {
    return "Tuto2 - Forms";
});

$app->get('form', function () {
    $form = <<< END_OF_FORM
    <form action="/tuto2-form/web/do_form" method="POST">
        Name : <input name="name" value=""/><br/>
        <input type="submit" value="valider"/>
    </form>
END_OF_FORM;
    return $form;
});

$app->post('/do_form', function (Request $request) {
    $nameSubmitted = $request->get("name");
    return "Hello $nameSubmitted";
});

// definitions
$app['debug'] = true;
$app->run();
