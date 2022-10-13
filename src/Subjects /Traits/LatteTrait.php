<?php

namespace Traits;

trait LatteTrait
{
    protected string $milkType = 'whole-milk';

    public function makeLatte(): void
    {
        echo static::Class . ' is making latte with ' . $this->milkType . '!' . PHP_EOL;
    }

    public function setMilkType(string $milk): static
    {
        $this->milk = $milk;
        return $this;
    }


}