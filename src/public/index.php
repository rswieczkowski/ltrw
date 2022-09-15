<?php

declare(strict_types=1);

use App\PaymentGateway\Paddle\Transaction;
use Ramsey\Uuid\UuidFactory;

require __DIR__ . '/../vendor/autoload.php';

$paddleTransaction = new Transaction();


var_dump($paddleTransaction);


$id = new UuidFactory();

echo $id->uuid4();