<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	protected $CI;

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->load->library('session');
    }

    public function HandleLogin()
    {
    	if($CI->session->login == FALSE){
    		redirect('/');
    		exit;
    	}
    }
}