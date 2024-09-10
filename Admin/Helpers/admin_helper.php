<?php
if(!function_exists('yesno')) {

    function yesno(bool $value = false) : string 
    {
        return $value ? "Yes" : "No";
    };
}