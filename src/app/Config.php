<?php

namespace App;

/**
 * @property-read ?array $db
 */
class Config
{

    protected array $config;

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
            'driver' => $_ENV['DB_DRIVER'],
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD']
        ]];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }

}