<?php

declare(strict_types=1);

use App\Db;
use App\Enum\Status;
use App\PaymentGateway\Paddle\Transaction;


require __DIR__ . '/../vendor/autoload.php';

$transaction1 = new Transaction(Status::PAID, 25, 'transaction 1');
$transaction2 = new Transaction(Status::PAID, 125, 'transaction 2');
$transaction3= new Transaction(Status::PAID, 100, 'transaction 3');
$transaction4 = new Transaction(Status::DECLINED, 100, 'transaction 3');

$reflectionProperty = new ReflectionProperty(Transaction::class, 'amount');
$reflectionProperty->setAccessible(true);

var_dump($reflectionProperty->getValue($transaction3));

echo Transaction::getCount() . '<br/>';

$transaction1->process();










