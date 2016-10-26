<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

		protected $CI;

        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
                // Assign the CodeIgniter super-object
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