<?php
session_start();
use App\core\Application;
use App\core\View;

require_once __DIR__ . '/../vendor/autoload.php';

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../');
    $dotenv->load();
}

require_once __DIR__ . '/../src/core/Funtions.php';
require_once __DIR__ . '/../src/helpers/functions.php';

require_once __DIR__ . '/../src/core/Application.php';

$routes = require_once __DIR__ . '/../src/routes.php';

$app = new Application();

$uri = getURI();
$httpMethod = $_SERVER['REQUEST_METHOD'];

if (empty($uri)) {
    die('Error');
}


$flag = false;
foreach ($routes as $route) {
    if ($route['name'] == $uri and $route['method'] == $httpMethod) {
        $controller = new $route['controller'];
        $controller->{$route['action']}();
        $flag = true;
    }
}

if (!$flag) {
    $view = new View();
    $view->view('error');
    die;
}


if (isset($_SESSION['init']) && $_SESSION['init'] === 0){
    unset($_SESSION['flash']);
}

if (isset($_SESSION['init'])) $_SESSION['init'] = 0;