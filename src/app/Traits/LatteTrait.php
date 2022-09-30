<?php

namespace App\Traits;

trait LatteTrait
{


    public function makeLatte(): void
    {
        echo static::Class . ' is making latte with ' . $this->getMilkType() . '!' . PHP_EOL;
    }

    public function getMilkType(): string
    {
        if (property_exists($this, 'milkType')) {
            return $this->milkType;
        }
        return '';
    }


}