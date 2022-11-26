<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Application;
use App\Models\InvoiceModel;
use App\Models\SignUp;
use App\Models\UserModel;
use App\View;
use JetBrains\PhpStorm\NoReturn;
use PDO;
use PDOException;


class HomeController
{

    /**
     * @throws \Throwable
     */
    public function index(): View
    {
        $userModel = new UserModel();
        $invoiceModel = new InvoiceModel();

        $name = $_GET['name'];
        $email = $_GET['email'];
        $password = $_GET['email'];
        $amount = $_GET['amount'];


        $invoiceId = (new SignUp($userModel, $invoiceModel))->register([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ], [
            'amount' => $amount
        ]);

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }

    public function download(): void
    {
        header('Content-type: application/txt');
        header('Content-Disposition: attachment;filename="file.txt"');

        readfile(STORAGE_PATH . 'test.txt');
    }

    #[NoReturn] public function upload(): void
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
        exit;
    }

}