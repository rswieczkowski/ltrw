<?php

$paymentStatus = 1;


match($paymentStatus) {
    1 => print 'Paid',
    2 => print 'Payment Declined',
    0 => print 'Payment Pending',
    default => print 'Unknown Payment Status'
};
