<?php

namespace App\Traits;

class AllInOneCoffeeMaker extends CoffeeMaker
{

    use CappuccinoTrait;

    public string $milkType = 'whole-milk';

}