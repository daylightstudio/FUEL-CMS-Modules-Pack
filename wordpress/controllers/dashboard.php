<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Dashboard extends Fuel_base_controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->config('wordpress');
		$config = $this->config->item('wordpress');
		$this->_validate_user($config['permission']);
		$this->load->vars($config);
	}
	
	function index()
	{
		$this->load->view('wordpress_dashboard');
	}

}