<?php

namespace App\Exceptions;

use Exception;

class ViewNotFoundException extends Exception
{

    protected $meassage = 'View not found';
}