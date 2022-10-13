<?php

namespace Polymorphism;

class DebtCollectionService
{

    public function collectDebt(DebtCollector $agency, string $name): void
    {

        $owedMoney = mt_rand(100, 1000);
        $collectedMoney = $agency->collect($owedMoney);

        echo $name . ' collected $' . $collectedMoney . ' of $' . $owedMoney . PHP_EOL;
    }

}