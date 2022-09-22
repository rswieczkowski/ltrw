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
        if ($this->setStatus($status)) {
            self::$count++;
        }
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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


    public function process(): void
    {
        echo 'Processing $' . $this->amount . ' of ' . $this->description;
    }

    public static function getCount(): int
    {
        return self::$count;
    }
}