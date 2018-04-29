<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mc_recaptcha {
	protected $CI = NULL;
	protected $secret_key = "6LejJlYAIZAlVFhH32MDY7-ma8fxm_5P"; // Set your key here and you're ready to go...
	protected $site_key = "6LejJlYUABTB3AZchm0wCqZJu3rya46kyPA-"; // Set your site key here..

	function __construct(){
		$this->CI =& get_instance();
        }
	
	function set_secret_key($key) {
		$this->secret_key = $key;
	}
	
	function get_secret_key() {
		return $this->secret_key;
	}
	
	function set_site_key($key) {
		$this->site_key = $key;
	}
	
	function get_site_key() {
		return $this->site_key;
	}
	
	public function validated(){
		$grr_post = $this->CI->input->post('g-recaptcha-response');
		$output = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$this->get_secret_key()."&response={$grr_post}");
		$output = json_decode($output, TRUE);

		if ($output['success']=='1') {
			return TRUE;
		}
		
		return FALSE;
	}
}

?>
