<?php

namespace App\MagicMethods;

class Invoice
{

    protected array $data;


    public function __construct()
    {
        $this->data = [];
    }

    protected function process(float $amount,string $description){
        var_dump('process');
    }


    public function __get(string $name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

    public function __set(string $name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset(string $name): bool
    {
        return array_key_exists($name, $this->data);
    }

    public function __unset(string $name): void
    {
        unset($this->data[$name]);
    }

    public function __call(string $name, array $arguments)
    {
       if(method_exists($this, $name)) {
           call_user_func_array([$this, $name], $arguments);
       }
    }

    public function __toString(): string
    {
        return  'hello';
    }


}