<?php
require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

include "../common/fonction.php";

// initialisation de l'application
$app = new Silex\Application();
$app['debug'] = true;


// initialisation des services
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// intercepteur
$app->before(function (Request $request) {
    if ($request->get("cas")=="NO") {
        return new RedirectResponse('/formation/web/login');
    }
});
$app->after(function (Request $request, Response $response) {
    $response->setContent(
        str_replace("nom", "coucou", $response->getContent())
    );
});

// traitement des erreurs
$app->error(function (\Exception $e, $code) {
    switch ($code) {
        case 404:
            return new RedirectResponse("/formation/web/login");
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message);
});


// définition des routes
include "../controller/accueil.php";

$app->get('/login', function () use ($app) {
    return $app['twig']->render('login.twig');
});
$app->get('/blog/{id}', function ($id, Request $request) {
    $val = $request->get("val", 'valeur par défaut');
//    $val = $_GET["val"];
    return "blogId=$id ; val=$val";
});
$app->get('/form', function () {
    $form = <<< END_OF_FORM
    <form action="/formation/web/do_form?val=TEST2" method="POST">
        Name : <input name="name" value=""/><br/>
        <input type="submit" value="valider"/>
    </form>
END_OF_FORM;
    return $form;
});
$app->post("/do_form", function(Request $request) {
    $name = $request->get("name");
    $val = $request->get("val");
    return "name=".$name." ; $val";
});

// lancement du moteur
$app->run();
