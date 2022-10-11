<?php

namespace App\Exceptions;

use Exception;
use InvalidArgumentException;

class Invoice
{
    public function __construct(private Customer $customer)
    {
    }


    public function process(float $amount): void
    {
        if($amount <= 0) {
            throw new InvalidArgumentException('Invalid invoice amount');
        }

        if(empty($this->customer->getBillingInfo())) {
            throw new MissingBillingInfoException();
        }
        echo 'Processing $' . $amount . ' invoice - ' ;
        sleep(1);
        echo  'processed successfully' . PHP_EOL;
    }


}