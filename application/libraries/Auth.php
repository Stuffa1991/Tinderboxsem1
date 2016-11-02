<?php

class Auth
{
    private $ci;

    public function __construct()
    {
        $this->ci =& get_instance();   
    }

    public function handleLogin()
    {
        $this->ci->load->model('user_model');

        $basicAuth = getallheaders()['Authorization'];
    
        $encodedLogin = explode(' ', $basicAuth)[1];
        $decodedLogin = base64_decode($encodedLogin);
        $credentials = explode(':', $decodedLogin);

        $userdata = $this->ci->user_model
            ->getUserByEmailPassword($credentials[0], $credentials[1]);

        if($userdata === null) {
            $this->ci->output
                ->set_header('HTTP/1.1 401 Unauthorized')
                ->set_header('Content-Type', 'application/json')
                ->set_output(json_encode([
                    'error' => 'Username or password is wrong'
                    ]))
                ->_display();

            die();

        } else {
            return true;
        }
    }
}