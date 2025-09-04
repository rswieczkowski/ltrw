<?php

namespace App\Services;

class InvoiceService
{

    public function __construct
    (
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayInterface $paymentGateway,
        protected EmailService $emailService
    ) {
    }

    public function process(array $customer, float $amount): bool
    {
        $tax = $this->salesTaxService->calculate($amount, $customer);

        if (!$this->paymentGateway->charge($customer, $amount, $tax)) {
            return false;
        }

        $this->emailService->send($customer, 'receipt');

        echo 'Invoice has been processed<br />';

        return true;
    }

}