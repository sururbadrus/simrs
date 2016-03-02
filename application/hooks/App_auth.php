<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_auth{
    //put your code here
    protected  $CI;
    function app_auth()
    {
       $this->CI = &get_instance();
	    if(!isset($this->CI->session))  //Check if session lib is loaded or not
          $this->CI->load->library('session');  //If not loaded, then load it here
      	$this->CI->load->helper('url');
		
     }    
    
    function index() {
		
         $router =& load_class('Router', 'core');
         $controller = $router->fetch_class();
		 
		 if($controller!='login'){
			
			if(!$this->CI->session->userdata('logged_in')){
				if($this->CI->input->is_ajax_request()){
					echo 'session expired';
				}else{
					redirect(base_url('login'));
				}
			}else{
				if($this->CI->input->is_ajax_request()){
					//var_dump($_REQUEST); die;
				}
				
				}  
		
		 }
    }
    
	
}
