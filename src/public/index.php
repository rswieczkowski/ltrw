<?php

declare(strict_types=1);

use App\Application;
use App\Config;
use App\Router;




require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEW_PATH = __DIR__ . '/../views';



$router = new Router();
$router
    ->get('/', [App\Controllers\HomeController::class, 'index'])
    ->post('/upload', [App\Controllers\HomeController::class, 'upload'])
    ->get('/download', [App\Controllers\HomeController::class, 'download'])
    ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [App\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [App\Controllers\InvoiceController::class, 'store']);

(new Application($router, ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']], new Config($_ENV)))->run();








