<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Dashboard extends Fuel_base_controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->config('google_analytics');
		$config = $this->config->item('google_analytics');
		$this->_validate_user($config['permission'], NULL, FALSE);
		$this->load->vars($config);
	}
	
	function index()
	{
		$this->load->view('google_analytics_dashboard');
	}

}