<?php

namespace App\Iterators;

class Invoice
{

    public int $id;

    public function __construct(public float $amount)
    {
        $this->id = rand(100000, 999999);
    }



}