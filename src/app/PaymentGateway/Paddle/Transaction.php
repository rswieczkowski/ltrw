<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;


use App\Enum\Status;

class Transaction
{

    private static int $count = 0;


    public function __construct(
        private string $status,
        private float $amount,
        private string $description,
    ) {
        $this->status = 'pending';
        self::$count++;
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


    public function process()
    {
        echo 'Processing paddle transaction...';
    }

    public static function getCount(): int
    {
        return self::$count;
    }
}