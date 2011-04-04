<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
$config['nav']['tools']['tools/campaign_monitor'] = 'Campaign Monitor';


/*
|--------------------------------------------------------------------------
| TOOL SETTING: Validation settings
|--------------------------------------------------------------------------
*/
$config['campaign_monitor'] = array();

// validator url
$config['campaign_monitor']['account_name'] = ''; // account name is sub domain (e.g. http://daylightstudio.createsend.com) 
$config['campaign_monitor']['api_key'] = ''; // Campaign Monitor API key
$config['campaign_monitor']['client_name'] = ''; // client name you want to display reports for
$config['campaign_monitor']['num_campaigns'] = 5; // number of campaigns to list
$config['campaign_monitor']['use_cache'] = TRUE; // use caching... Recommended
$config['campaign_monitor']['cache_ttl'] = 600; //default time to live = 600 seconds 10 mins
$config['campaign_monitor']['cache_folder'] = 'campaign_monitor'; //used as the subfolder name for caching


