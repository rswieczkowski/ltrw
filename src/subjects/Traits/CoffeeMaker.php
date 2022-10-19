<?php

namespace Traits;

class CoffeeMaker
{

    public function makeCoffee(): void
    {
        echo static::Class . ' is making coffee!' . PHP_EOL;
    }

}