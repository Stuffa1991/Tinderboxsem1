<?php

class Language
{
    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();   
    }

    public function handleLanguage()
    {
        //Set default language eg. from session or w/e
    }
}