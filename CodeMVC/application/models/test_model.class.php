<?php

class Test_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getData()
    {
        return "TEST!";
    }
    
}

?>