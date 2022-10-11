<?php

namespace App\Polymorphism;

interface DebtCollector
{

    public function __construct();

    public function getName();

    public function collect(float $owedAmount): int;

}