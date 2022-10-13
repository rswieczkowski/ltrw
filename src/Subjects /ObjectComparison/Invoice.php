<?php

namespace ObjectComparison;

class Invoice
{

    private string $id;

    public function __construct()
    {
        $this->id = uniqid('Invoice_');
    }

    public function __clone(): void
    {
        $this->id = uniqid('Invoice_');
    }

    public static function create(): self
    {
        return new static();
    }

}