<?php

declare(strict_types=1);

namespace App\Classes;

class Invoice
{

    public function index(): void
    {
        echo 'Invoices';
    }

    public function create(): void
    {
        echo 'Create Invoice';

        echo '<form action="/invoices/create" method="post"><label>Amount</label><input type="text" name="amount" /></form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];

        echo '<pre>';
        var_dump($amount);
        echo '</pre>';
    }


}