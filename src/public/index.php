<?php

declare(strict_types=1);

use App\Db;
use App\Enum\Status;
use App\PaymentGateway\Paddle\Transaction;


require __DIR__ . '/../vendor/autoload.php';

$transaction1 = new Transaction(Status::PAID, 25, 'Transaction 1');
$transaction2 = new Transaction(Status::PAID, 125, 'Transaction 2');
$transaction2 = new Transaction(Status::PAID, 100 , 'Transaction 3');

$db = Db::getInstance([]);


echo '<pre>';
var_dump(Transaction::getCount());
echo '</pre>';
exit;








