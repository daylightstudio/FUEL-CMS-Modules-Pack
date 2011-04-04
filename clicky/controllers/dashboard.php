<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Dashboard extends Fuel_base_controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->config('clicky');
		$config = $this->config->item('clicky');
		$this->_validate_user($config['permission'], NULL, FALSE);
	}
	
	function index()
	{
		if (!extension_loaded('curl')) show_error(lang('error_no_curl_lib'));
		
		$vars = $this->config->item('clicky');

		// scrape html from page running on localhost
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $vars['api']);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$api_data = curl_exec($ch);
		curl_close($ch); 
		
		$vars['api_data'] =  unserialize($api_data);
		$this->load->view('clicky_dashboard', $vars);
	}

}