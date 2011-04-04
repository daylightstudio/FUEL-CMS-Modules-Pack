<?php
require_once(FUEL_PATH.'libraries/Fuel_base_controller.php');
class Dashboard extends Fuel_base_controller {
	
	public $nav_selected = 'tools/campaign_monitor|tools/campaign_monitor/:any';
	public $view_location = 'campaign_monitor';
	private $_cm = NULL;
	private $_config = array();
	
	function __construct()
	{
		parent::__construct();
		$this->_validate_user('tools/campaign_monitor');

		$this->load->config('campaign_monitor');
		$this->_config = $this->config->item('campaign_monitor');

		$this->load->library('cache');
		$this->load->module_language(CAMPAIGN_MONITOR_FOLDER, 'campaign_monitor');
	}
	
	function index()
	{
		$this->load->module_model(FUEL_FOLDER, 'pages_model');
		$pages = $this->pages_model->all_pages_including_views(TRUE);
		
		$vars['num_campaigns'] = $this->_config['num_campaigns'];
		$vars['account_name'] = $this->_config['account_name'];
		$vars['client_name'] = $this->_config['client_name'];
		$summaries = array();
		
		$cache_id = fuel_cache_id();
		if ($this->_config['use_cache'])
		{
			$cached_file = $this->cache->get($cache_id, $this->_config['cache_folder']);
			if (!empty($cached_file)) $summaries = $cached_file;
		}
		
		if (empty($summaries))
		{
			$client_id = $this->_get_client_id();
			if (!empty($client_id))
			{
				$campaigns = $this->_get_campaigns($client_id);
				if (!empty($campaigns))
				{
					foreach($campaigns as $campaign)
					{
						$summary = $this->_get_campaign_summary($campaign['CampaignID']);
						if (!empty($summary))
						{
							$summaries[$campaign['Name']] = $summary;
						}
					}
				}
				if ($this->_config['use_cache'])
				{
					$this->cache->save($cache_id, $summaries, $this->_config['cache_folder'], $this->_config['cache_ttl']);
				}
			}
		}
		
		$vars['summaries'] = $summaries;
		if (!is_ajax())
		{
			$this->_render('campaign_monitor', $vars);
		}
		else
		{
			$this->load->view('campaign_monitor', $vars);
		}
	}
	
	function _cm_connect()
	{
		if (!isset($this->_cm))
		{
			require_once(CAMPAIGN_MONITOR_PATH.'libraries/CMBase.php');
			$this->_cm = new CampaignMonitor($this->_config['api_key']);
		}
		return $this->_cm;
	}
	
	function _get_client_id()
	{
		$cm = $this->_cm_connect();
		$clients = $cm->userGetClients();
		if (isset($clients['anyType'], $clients['anyType']['Client']))
		{
			foreach($clients['anyType']['Client'] as $client)
			{
				if ($client['Name'] == $this->_config['client_name'])
				{
					$client_id = $client['ClientID']; 
					return $client_id;
				}
			}
		}
		return NULL;
	}
	
	function _get_campaigns($client_id)
	{
		$cache_id = 'campaigns';
		$cm = $this->_cm_connect();
		$campaigns = $cm->clientGetCampaigns($client_id); 
		
		if (isset($campaigns['anyType'], $campaigns['anyType']['Campaign']))
		{
			return array_slice($campaigns['anyType']['Campaign'], 0, $this->_config['num_campaigns']);
		}
		return NULL;
	}

	function _get_campaign_summary($campaign_id)
	{
		$cm = $this->_cm_connect();
		$summaries = $cm->campaignGetSummary($campaign_id);
		if (isset($summaries['anyType']))
		{
			return $summaries['anyType'];
		}
		return NULL;
	}

}

/* End of file tools.php */
/* Location: ./codeigniter/application/modules/tools/controllers/validate.php */