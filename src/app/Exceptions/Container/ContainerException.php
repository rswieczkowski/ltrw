<?php

namespace App\Exceptions\Container;

use Psr\Container\ContainerExceptionInterface;
use \Exception;

class ContainerException extends Exception implements ContainerExceptionInterface
{

}