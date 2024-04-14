<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and create an application instance...
$app = require_once __DIR__.'/../bootstrap/app.php';

// Capture the current request...
$request = Request::capture();

// Handle the request and get the response...
$response = $app->handle($request);

// Send the response back to the client...
$response->send();

// Terminate the application...
$app->terminate($request, $response);
