<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mc_recaptcha {
	protected $CI = NULL;
	protected $secret_key = "6LejJlYUAAAAAIZAlVFhH32MDY7-ma8fx3HZm_5P"; // Set your key here and you're ready to go...
	protected $site_key = "6LejJlYUAAAAABTB3AZchm0wCqZJu3rya46kyPA-"; // Set your key here and you're ready to go...

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
		$user_ip = $this->CI->input->ip_address();
		$output = $this->http_get("https://www.google.com/recaptcha/api/siteverify?secret=".$this->get_secret_key()."&response={$grr_post}&remoteip=".$user_ip);
		$output = json_decode($output, TRUE);
		
		if ($output['success']=='1') {
			return TRUE;
		}
		
		return FALSE;
	}
	
	// HTTP Helper Class
	public function http_get($url){
		$output = @file_get_contents($url);

		if($output === FALSE) {
			if (function_exists('curl_init')){ 
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($curl, CURLOPT_TIMEOUT, 15);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); 
				$output = curl_exec($curl);
				curl_close($curl);
			}
		}
		
		return $output;
	}
}

?>
