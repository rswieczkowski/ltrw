<?php

namespace App;

use App\Exceptions\RouteNotFoundException;
use PDO;
use PDOException;

/**
 * @mixin PDO
 */
class Db
{
    private PDO $pdo;

    public function __construct(protected $config)
    {
        try {
            $dsn =
                $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['name'];

            $defaultOptions =
                [
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];

            $this->pdo = new PDO
            (
                $dsn,
                $config['user'],
                $config['password'],
                $config['options'] ?? $defaultOptions
            );

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function __call(string $name, array $arguments)
    {
       return call_user_func_array([$this->pdo, $name], $arguments);
    }


}