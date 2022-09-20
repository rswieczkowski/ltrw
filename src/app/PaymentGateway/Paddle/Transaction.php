<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;


use App\Enum\Status;

class Transaction
{


    private string $status;
    private float $transfer;

    public function __construct()
    {
        $this->status = 'pending';
    }

    public function setStatus(string $status): self
    {
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid status');
        } else {
            $this->status = $status;
        }

        return $this;
    }
}