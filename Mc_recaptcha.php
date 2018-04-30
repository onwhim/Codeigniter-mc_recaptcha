<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mc_recaptcha {
	protected $CI = NULL;
	protected $secret_key = "6LejJlYUADFDFFFlVFhH32MDY7-ma8fx3HZm_5P"; // Set your secret key here..
	protected $site_key = "6LejJlYUAAAAAASDFDFGJWm0wCqZJu3rya46kyPA-"; // Set your site key here...

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
		$output = $this->http_post("https://www.google.com/recaptcha/api/siteverify?secret=".$this->get_secret_key()."&response={$grr_post}&remoteip=".$user_ip);
		$output = json_decode($output, TRUE);
		
		if ($output['success']=='1') {
			return TRUE;
		}
		return FALSE;
	}
	
	// HTTP Helper function
	public function http_post($url){
		$postdata = array();
		
		if(strpos($url,"?") !== FALSE){
			$query_string_array = array();
			$url_array = explode("?", $url);
			$url = $url_array[0];
			parse_str($url_array[1], $query_string_array);
			$postdata = http_build_query($query_string_array);
		}
		
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			)
		);

		$context  = stream_context_create($opts);
		$output = @file_get_contents($url, false, $context);
	
		if($output === FALSE) {
			if (function_exists('curl_init')){ 
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($ch);
				curl_close ($ch);
			}
		}
		
		return $output;
	}
}

?>
