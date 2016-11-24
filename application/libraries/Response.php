<?php

class Response
{
	private $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	/**
	 * Param $status
	 * Param $statusText
	 * Param $response
	 */
	public function response($status, $statusText, $response) {

		// Validate
		if(!is_int($status) && $status > 0) { 
			//die('Wrong data');
			die('Wrong data: status is not an int');
		}

		if(!is_string($statusText)) { 
			//die('Wrong data');
			die('Wrong data: statustext is not a string');
		}

		// Sanitize
		$status = trim(strip_tags($status)); // This would be considered safe
		$statusText = trim(strip_tags($statusText)); // This would be considered safe

		// Escape
		$safeHttpStatus = sprintf('HTTP/1.1 %d %s', (int)$status, (string)$statusText);

		if(is_string($response) || is_object($response) || is_array($response)) { 
		
			$this->ci->output
				->set_header($safeHttpStatus)
				->set_header('Content-Type: application/json')
				->set_output(json_encode($response))
				->_display();

			die();	
		}

		die('Wrong data');
	}
}