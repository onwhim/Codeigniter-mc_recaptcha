<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mc_recaptcha {
	protected $CI = NULL;
	protected $secret_key = "6LejJlYUAAAAAIZAlVFhH32MDY7-ma8fx3HZm_5P"; // Set your key here and you're ready to go...

	function __construct(){
		$this->CI =& get_instance();
    }
	
	function set_secret_key($key) {
		$this->secret_key = $key;
	}
	
	function get_secret_key() {
		return $this->secret_key;
	}
	
	public function validated(){
		$grr_post = $this->CI->input->post('g-recaptcha-response');
		$output = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$this->get_secret_key()."&response={$grr_post}");
		$output = json_decode($output, TRUE);

		if ($output['success']===TRUE) {
			return TRUE;
		}
		
		return FALSE;
	}
}

?>