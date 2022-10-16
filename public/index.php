<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;

$obApp = new Application();

$obApp->router->get('/', function (){
    return 'Hello World!';
});

$obApp->run();