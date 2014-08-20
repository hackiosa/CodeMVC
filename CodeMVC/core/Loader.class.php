<?php

class Loader
{
    private $instance;
    
    public function __construct($instance)
    {
        require('/../config/config.php');
        
        $this->instance = $instance;
        foreach ($config['preload_libs'] as $lib)
        {
            $this->library($lib);
        }
    }
    
    public function view($template, $data)
    {
        $view = new View($template);
        $view->register_var_array($data);
        $view->show();
    }
    
    public function model($name)
    {
        $this->load_class($name);
    }
    
    public function library($name)
    {
        $this->load_class($name);
    }
    
    private function load_class($name)
    {
        $this->instance->$name = new $name();
    }

}

?>