Tuto 4 : middleware (ou gestion de la sécurité)
===============================================

Points à noter :

$app->before(function (Request $request) {
    if ($request->get("cas")=="NO") {
        return new RedirectResponse('/tuto4-middleware/web/login');
    }
});
