<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {
	protected $CI = NULL;

	function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
        }
	
	public function valid_recaptcha($g_recaptcha_response) {
		$this->CI->load->library('Mc_recaptcha');
		
		if ($this->CI->mc_recaptcha->validated() == TRUE) {
			return TRUE;
		}

		return FALSE;
    }
}

?>
