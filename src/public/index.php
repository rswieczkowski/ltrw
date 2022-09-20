<?php

declare(strict_types=1);

use App\Enum\Status;
use App\PaymentGateway\Paddle\Transaction;


require __DIR__ . '/../vendor/autoload.php';

$paddleTransaction = new Transaction();



$status = $paddleTransaction->setStatus(Status::DECLINED);

echo '<pre>';
var_dump($status->setStatus(Status::PAID));
echo '</pre>';
exit;








