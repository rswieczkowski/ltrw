<?php

declare(strict_types=1);

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEW_PATH = __DIR__ . '/../views';

use App\Exceptions\RouteNotFoundException;
use App\Router;
use App\View;

require __DIR__ . '/../vendor/autoload.php';
session_start();


try {
    $router = new Router();
    $router
        ->get('/', [App\Controllers\HomeController::class, 'index'])
        ->post('/upload', [App\Controllers\HomeController::class, 'upload'])
        ->get('/download', [App\Controllers\HomeController::class, 'download'])
        ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
        ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
        ->get('/invoices/create', [App\Controllers\InvoiceController::class, 'create'])
        ->post('/invoices/create', [App\Controllers\InvoiceController::class, 'store']);
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (RouteNotFoundException $e) {
    http_response_code(404);
    echo View::make('errors/404');
}








