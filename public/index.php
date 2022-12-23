<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Laminas\Diactoros\Response\RedirectResponse;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

// Index
$map->get('index', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);

// Add Jobs 
$map->get('addJobs', '/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
// Save Jobs
$map->post('saveJobs', '/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);

// Add Projects
$map->get('addPorjects', '/projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);
// Save Projects
$map->post('savePorjects', '/projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);

// Add User
$map->get('addUser', '/user/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUser'
]);
// Save User
$map->post('saveUser', '/user/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'postSaveUser'
]);

// Login
$map->get('loginForm', '/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);
// Logout
$map->get('logout', '/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout'
]);
// Auth
$map->post('auth', '/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'
]);

// Dashboard
$map->get('admin', '/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex', 
    'auth' => true
]);




function printElement($job){    
        
    echo "<ul><li>".$job->title."</li> ";
    
    echo "<li>". $job->description."</li>";

    echo "<li>". $job->file_name."</li>";
    
    echo "<li>". $job->getDurationAssString()."</li>";

    echo "</ul>";  

}

function printProject($project){    
    
    echo "<ul><li>".$project->title."</li> ";    
    echo "<li>". $project->description."</li>"; 
    echo "<li>". $project->file_name."</li>";
    echo "</ul>";  

}

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route){
    echo 'No ruta <br>';
    //var_dump($route);
}

else{   
    $handlerData = $route->handler;

    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $needsAuth = $handlerData['auth'] ?? false;
    $sessionUserId = $_SESSION['userId'] ?? null;

    if($needsAuth && !$sessionUserId){
        header('Location: /login');  
        die;
    }

    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    foreach($response->getHeaders() as $name => $values){
        foreach($values as $value){
           header(sprintf('%s: %s', $name , $value), false); 
        }
    }
    
    //Codigo de Respuesta
    http_response_code($response->getStatusCode());

    echo $response->getBody();
    //var_dump($route->handler);
}

