<?php
/**
 * FBDDemo plugin for Wolf CMS 
 *
 * Welcome to Capt Zeanie's FBDDemo (Frontend, Backend, Dispatcher, Demo) plugin.
 *
 * @author Sean Arrowsmith
 * @package Wolf
 * @subpackage plugin.fbddemo
 * @version 0.0.1
 */
// Check if the plugin's settings for version number else 0.0.0
	if (Plugin::getSetting('version', 'fbddemo') == true) {
		$Plugin_Version = Plugin::getSetting('version', 'fbddemo');
	} else {
		$Plugin_Version	="0.0.0";
	}
	// Check if the plugin's settings for frontend uri. ie how we want to call the plugin from the frontend and place this uri into the dispatcher route.
	if (Plugin::getSetting('uri', 'fbddemo') == true) {
		$Plugin_Frontend_Uri = Plugin::getSetting('uri', 'fbddemo');
	} else {
		$Plugin_Frontend_Uri = "test";
	}
	
Plugin::setInfos(array(
    'id'          => 'fbddemo',
    'title'       => 'FBDDemo',
    'description' => __('Adds a FBDDemo page to your site'),
    'version'     => $Plugin_Version,
    'license'     => 'GPL or other',
    'author'      => 'Sean Arrowsmith',
    'website'     => 'http://www.mydomain.com',
    'update_url'  => 'http://www.mydomain.com/plugins.xml',
    'type'        => 'both',
    'require_wolf_version' => '0.8.2'
));
    // Setup the controller.
    Plugin::addController('fbddemo', 'FBDDemo', 'admin_view', true);

    // Load classes.
    AutoLoader::addFolder(CORE_ROOT.'/plugins/fbddemo/models/');

	// Setup routes to the fbddemo plugin.
	Dispatcher::addRoute(array(
          '/' . $Plugin_Frontend_Uri =>  '/plugin/fbddemo/test_form',
		  '/' . $Plugin_Frontend_Uri.'/test' =>  '/plugin/fbddemo/test_form',
         '/test_process'    => '/plugin/fbddemo/test_form_process',
        ));