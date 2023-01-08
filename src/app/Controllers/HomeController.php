<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Application;
use App\Container;
use App\Models\InvoiceModel;
use App\Models\SignUp;
use App\Models\UserModel;
use App\Services\InvoiceService;
use App\View;
use JetBrains\PhpStorm\NoReturn;
use PDO;
use PDOException;
use Throwable;


class HomeController
{

    public function __construct(private InvoiceService $invoiceService)
    {
    }


    /**
     * @throws Throwable
     */
    public function index(): View
    {
        $this->invoiceService->process([], 125);

        return View::make('index');
    }


}