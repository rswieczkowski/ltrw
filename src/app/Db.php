<?php

namespace App;

class Db
{

    public static ?Db $instance = null;

    private function __construct(public array $config)
    {
        echo 'instance of Db created';
    }

    public static function getInstance(array $config): Db
    {
        if (self::$instance === null) {
            self::$instance = new Db($config);
        }
        return self::$instance;
    }

}