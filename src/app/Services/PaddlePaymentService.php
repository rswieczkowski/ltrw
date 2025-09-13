<?php

namespace App\Services;

class PaddlePaymentService implements PaymentGatewayServiceInterface
{

    public function charge(array $customer, float $amount, float $tax): bool
    {
        echo 'Charging from Paddle <br />';
        return true;
    }
}