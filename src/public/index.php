<?php

declare(strict_types=1);

const STORAGE_PATH = __DIR__ . '/../storage';

use App\Router;

require __DIR__ . '/../vendor/autoload.php';
session_start();

$router = new Router();

$router
    ->get('/', [App\Classes\Home::class, 'index'])
    ->post('/upload', [App\Classes\Home::class, 'upload'])
    ->get('/invoices', [App\Classes\Invoice::class, 'index'])
    ->get('/invoices', [App\Classes\Invoice::class, 'index'])
    ->get('/invoices/create', [App\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [App\Classes\Invoice::class, 'store'])
    ->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));







