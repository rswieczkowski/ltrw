<?php

namespace Polymorphism;

class CollectorAgency implements DebtCollector
{

    private string $name;

    public function __construct()
    {
        $this->name = 'Collector Agency';
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
        $guaranteed = (int) ($owedAmount * 50 / 100);

        return ceil(mt_rand($guaranteed, $owedAmount));
    }


}