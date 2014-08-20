<?php

class Security
{
    
    public static function WAF_Filter($value)
    {
        return htmlspecialchars($value); // actual code to come..
    }
    
}

?>