<?php

class Application 
{
    private $config = null;
    
    public function __construct()
    {
        require('/../config/config.php');
        
        // Load config
        $this->config = $config;
        
        // install autoloader
        spl_autoload_register('Application::autoload');
        
        // sanitize user input (this ensures system security)
        if ($config['sanitize'])
        {
            foreach ($_GET as $key => $value)
            {
                $_GET["$key"] = Security::WAF_Filter($value); 
            }
            
            foreach ($_POST as $key => $value)
            {
                $_POST["$key"] = Security::WAF_Filter($value);
            }
            
            foreach ($_COOKIE as $key => $value)
            {
                $_COOKIE["$key"] = Security::WAF_Filter($value);
            }
        }
    }
    
    public static function autoload($class)
    {
        require('/../config/config.php');
        
        $dirs = $config['autoload_dir'];
        
        foreach ($dirs as $dir)
        {
            $path = "./$dir/$class.class.php";
            if (file_exists($path))
            {
                require_once($path);
                if (class_exists($class))
                {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    public function run_default()
    {
        $pair = explode('/', $this->config['default_route']);
        $this->navigate($pair[0], $pair[1]);
    }
    
    public function run($controller, $method)
    {
        $this->navigate($controller, $method);
    }
    
    private function navigate($controller, $method)
    {
        $className = null;
        
        if (array_key_exists($controller, $this->config['controller']))
        {
            $className = $this->config['controller'][$controller];
        } else {
            $className = $controller . "_controller";
        }
        
        $inst = new $className();
        $inst->$method();
    }
    
}

?>