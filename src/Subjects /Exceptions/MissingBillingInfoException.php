<?php

namespace Exceptions;

use Exception;

class MissingBillingInfoException extends Exception
{

    public $message = "Missing billing information!";

}