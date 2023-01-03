<?php

namespace App\Services;

class EmailService
{

    public function send($to, string $template): bool
    {
        sleep(1);
        return true;
    }

}