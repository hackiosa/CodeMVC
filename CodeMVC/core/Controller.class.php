<?php

class Controller
{
    public $load = null;
    
    public function __construct()
    {
        $this->load = new Loader($this);
    }
}

?>