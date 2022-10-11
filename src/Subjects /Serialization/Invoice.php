<?php

namespace App\Serialization;

class Invoice
{
    private string $id;


    public function __construct(
        private float $amount,
        private string $description,
        private string $creditCardNumber
    ) {
        $this->id = uniqid('Invoice_');
    }

//
//    public function __sleep(): array
//    {
//        return ['id', 'amount', 'description'];
//    }

    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'creditCardNumber' => base64_encode($this->creditCardNumber),
            'foo' => 'bar'
        ];
    }


    public function __unserialize(array $data): void
    {
        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->description = $data['description'];
        $this->creditCardNumber = base64_decode($data['description']);
    }


//    public function __wakeup(): void
//    {
//        // TODO: Implement __wakeup() method.
//    }


}