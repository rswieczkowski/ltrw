<?php

namespace App\Services;

class PaddlePayment implements PaymentGatewayInterface
{

    public function charge(array $customer, float $amount, float $tax): bool
    {
        echo 'Charging from Paddle <br />';
        return true;
    }
}