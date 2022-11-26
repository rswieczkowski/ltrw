<?php

declare(strict_types=1);

namespace App;

abstract class BaseModel
{

    protected Db $db;

    public function __construct(){
       $this->db = Application::db();
    }

}