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
require_once __DIR__ . '/../src/helpers/Message.php';

require_once __DIR__ . '/../src/core/Application.php';

$routes = require_once __DIR__ . '/../src/routes.php';

$app = new Application();

$uri = getURI();
$httpMethod = $_SERVER['REQUEST_METHOD'];

if (empty($uri)) {
    die('Error');
}


$flag = false;
$patch = (filter_input(INPUT_GET, "route", FILTER_DEFAULT) ?? "/");
foreach ($routes as $route) {
    preg_match_all("~\{\s* ([a-zA-Z_][a-zA-Z0-9_-]*) \}~x", $route['name'], $keys, PREG_SET_ORDER);
    $routeDiff = array_values(array_diff(explode("/", $uri), explode("/", $route['name'])));

    $data = [];
    foreach ($keys as $key) {
        $data[$key[1]] = $routeDiff[0] ?? null;
        $route['name'] = str_replace("{{$key[1]}}", '', $route['name']);
    }
    if (($route['name'] == $uri and $route['method'] == $httpMethod) ||
        (isset($key[1]) && isset($data[$key[1]]) && $route['name'] . $data[$key[1]] == $uri and $route['method'] == $httpMethod and
            sizeof(explode('/', $route['name'])) == sizeof(explode('/', $uri)))) {
        $controller = new $route['controller'];
        if (isset($keys[0]) && !empty($data[$key[1]])) {
            $controller->{$route['action']}($data[$key[1]]);
        } elseif ($route['name'] == $uri) {
            $controller->{$route['action']}();
        }
        $flag = true;
    }
}

function process(string $route, array $arguments, array $params = null): string
{
    $params = (!empty($params) ? "?" . http_build_query($params) : null);
    return str_replace(array_keys($arguments), array_values($arguments), $route) . "{$params}";
}

if (!$flag) {
    $view = new View();
    $view->view('error');
    die;
}


if (isset($_SESSION['init']) && $_SESSION['init'] === 0) {
    unset($_SESSION['flash']);
}

if (isset($_SESSION['init'])) $_SESSION['init'] = 0;