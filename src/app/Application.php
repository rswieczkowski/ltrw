<?php

namespace App;

use App\Exceptions\RouteNotFoundException;


class Application
{
    private static Db $db;

    public function __construct
    (
        protected Router $router,
        protected array $request,
        protected Config $config

    ) {
        static::$db = new Db($config->db ?? []);
    }


    public static function db(): Db
    {
        return static::$db;
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (RouteNotFoundException) {
            http_response_code(404);
            echo View::make('errors/404');
        }
    }


}