<?php

class Auth
{
    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }
    /*
    public function handleLogin()
    {	
    	//Load Session library
    	$this->ci->load->library(array('session'));

    	//Load url helper
    	$this->ci->load->helper(array('url_helper'));

    	//Get session data
        $loggedIn = $this->ci->session->login;

        //If not logged in
        if($loggedIn == FALSE){
        	redirect('/');
        	die();
        }
    }
    */
}