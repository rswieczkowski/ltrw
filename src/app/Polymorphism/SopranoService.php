<?php

namespace App\Polymorphism;

class SopranoService implements DebtCollector
{

    private string $name;

    public function __construct()
    {
        $this->name = 'Soprano Service';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    public function collect(float $owedAmount): int
    {
        return (int)($owedAmount * 80 / 100);
    }
}