<?php

namespace Inheritance;

class ToasterPro extends Toaster
{


    public function __construct()
    {
        parent::__construct();
        $this->size = 4;
    }

    public function addSlice(string $slice):void
    {
        echo 'addSlice() from child class';
    }


    public function toastBeagle()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . ': Toasting ' . $slice . ' with beagle option' . PHP_EOL;
        }
    }

}