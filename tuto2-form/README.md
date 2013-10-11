Tuto 2 : Gestion d'un formulaire
======================================

Tout se passe dans le index.php. Voyons avec quelques commentaires les lignes intéressantes :

```php
<?php
// utilisé pour avoir accès aux données de la requête http
use Symfony\Component\HttpFoundation\Request;

// ...

// Affichage du formulaire
$app->get('/form', function () {
    $form = <<< END_OF_FORM
    <form action="/tuto2-form/web/do_form" method="POST">
        Name : <input name="name" value=""/><br/>
        <input type="submit" value="valider"/>
    </form>
END_OF_FORM;
    return $form;
});

// traitement du formulaire (notez le "post" à la place du "get")
$app->post('/do_form', function (Request $request) {
    $nameSubmitted = $request->get("name");
    return "Hello $nameSubmitted";
});

//...
