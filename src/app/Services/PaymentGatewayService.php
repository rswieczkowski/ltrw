<?php

namespace App\Services;

class PaymentGatewayService
{

    public function charge($customer, float $amount, float $tax): bool
    {
        sleep(1);

        return (bool)mt_rand(0, 1);
    }

}