<?php

class View
{
    private $template = null;
    private $var_pair = array();
    
    public function __construct($template)
    {
        $this->template = $template;
    }
    
    public function register_var($var, $value)
    {
        array_push($this->var_pair, array($var, $value));
    }
    
    public function register_var_array($array)
    {
        foreach ($array as $key => $value)
        {
            array_push($this->var_pair, array($key, $value));
        }
    }
    
    public function show()
    {
        $output = file_get_contents('./application/views/' . $this->template . '.htm');
        foreach ($this->var_pair as $var)
        {
            $output = str_replace('{' . $var[0] . '}', $var[1], $output);
        }
        echo $output;
    }
    
}

?>