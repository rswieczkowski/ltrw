<?php

namespace Inheritance;

class FancyOven
{

    private ToasterPro $toasterPro;

    public function __construct(ToasterPro $toasterPro)
    {
        $this->toasterPro = $toasterPro;
    }

    public function fry()
    {
    }

    public function toast(): void


    {
        $this->toasterPro->toast();
    }

    public function toastBeagle(): void
    {
        $this->toasterPro->toastBeagle();
    }

}