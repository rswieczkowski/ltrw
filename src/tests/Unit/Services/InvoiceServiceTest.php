<?php

namespace Tests\Unit\Services;

use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\StripePaymentService;
use App\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;


class InvoiceServiceTest extends TestCase
{
    /** @test */
    public function it_processes_invoice(): void
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $paymentGatewayServiceMock = $this->createMock(StripePaymentService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $paymentGatewayServiceMock->method('charge')->willReturn(true);
        // given the invoice services
        $invoiceService = new InvoiceService($salesTaxServiceMock, $paymentGatewayServiceMock, $emailServiceMock);

        $customer = ['name' => 'Rafał'];
        $amount = 150;

        // when process is called
        $result = $invoiceService->process($customer, $amount);

        // then assert invoice is processed successfully
        $this->assertTrue($result);
    }

    /** @test */
    public function it_sends_receipt_email_when_invoice_is_processed() {

        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $paymentGatewayServiceMock = $this->createMock(StripePaymentService::class);
        $emailServiceMock = $this->createMock(EmailService::class);


        $paymentGatewayServiceMock->method('charge')->willReturn(true);

        $emailServiceMock->expects($this->once())
                            ->method('send')
                            ->with(['name' => 'Rafał'], 'receipt');

        // given the invoice services
        $invoiceService = new InvoiceService($salesTaxServiceMock, $paymentGatewayServiceMock, $emailServiceMock);

        $customer = ['name' => 'Rafał'];
        $amount = 150;

        // when process is called
        $result = $invoiceService->process($customer, $amount);

        // then assert invoice is processed successfully
        $this->assertTrue($result);

    }


}