 
<?php
require 'controller/equipe_controller.php';

function routeRequest() {
    $actions = [
        'create' => 'createAction',
        'list' => 'index',
        'destroy' => 'destroyAction',
        'edit' => 'editAction',
        'store' => 'storeAction',
        'update' => 'updateAction',
        'delete' => 'deleteAction',
    ];
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

    // Vérifier si l'action existe dans le tableau
    if (array_key_exists($action, $actions)) {
        // Créer une instance du contrôleur
        $controller = new Controller();

        // Appeler la méthode correspondante
        $methodName = $actions[$action];
        $controller->$methodName();        // ...

    } else {
        // Gérer les cas où aucune action n'est spécifiée
      notFound();
    }
}
}
function notFound() {
    http_response_code(404);
    echo '404 Not Found';
}

