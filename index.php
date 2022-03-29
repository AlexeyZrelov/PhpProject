<?php

session_start();

use App\Controllers\LoginController;
use App\Controllers\ApartmentController;
use App\Controllers\BookingController;
use App\Controllers\CommentController;
use App\View;
use App\Redirect;
use Carbon\Carbon;
use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

    $r->addRoute('GET', '/apartment', [ApartmentController::class, 'index']);
    $r->addRoute('POST', '/apartment/show', [ApartmentController::class, 'show']);
    $r->addRoute('POST', '/apartment/search', [ApartmentController::class, 'search']);
    $r->addRoute('GET', '/apartment/search', [ApartmentController::class, 'search']);
    $r->addRoute('GET', '/apartment/{id:\d+}', [ApartmentController::class, 'show']);

    // BookingController
    $r->addRoute('POST', '/booking/{id:\d+}', [BookingController::class, 'index']);
    $r->addRoute('POST', '/booking/save', [BookingController::class, 'save']);
    $r->addRoute('POST', '/booking/{id:\d+}/delete', [BookingController::class, 'delete']);
    $r->addRoute('GET', '/booking/{id:\d+}', [BookingController::class, 'index']);
    $r->addRoute('GET', '/booking/{id:\d+}/delete', [BookingController::class, 'delete']);

    // Login
    $r->addRoute('GET', '/login', [LoginController::class, 'index']);
    $r->addRoute('POST', '/login/signup', [LoginController::class, 'signup']);
    $r->addRoute('POST', '/login/login', [LoginController::class, 'login']);

    // Comments
    $r->addRoute('POST', '/comments/save', [CommentController::class, 'save']);
    $r->addRoute('GET', '/comments', [CommentController::class, 'index']);
    $r->addRoute('GET', '/comments/{id:\d+}/delete', [CommentController::class, 'delete']);

});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        var_dump('404 Not Found');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        var_dump('405 Method Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $controller = $routeInfo[1][0];
        $method = $routeInfo[1][1];

        /** @var View $response */
        $response = (new $controller)->$method($routeInfo[2]);

        $twig = new Environment(new FilesystemLoader('app/Views'));


        if ($response instanceof View) {
            echo $twig->render($response->getPath(), $response->getVariables());
        }

        if ($response instanceof Redirect) {
            header('Location: ' . $response->getLocation());
            exit;
        }

        break;

}

if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

if (isset($_SESSION['inputs'])) {
    unset($_SESSION['inputs']);
}

