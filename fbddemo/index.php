<?php
/**
 * FBDDemo plugin for Wolf CMS 
 *
 * Simple fbddemo functions for frontend and admin area.
 *
 * @author Sean Arrowsmith
 * @package Wolf
 * @subpackage plugin.fbddemo
 * @version 0.0.1
 */
// Check if the plugin's settings already exist and create them if not.
	if (Plugin::getSetting('version', 'fbddemo') == true) {
		$Plugin_Version = Plugin::getSetting('version', 'fbddemo');
	} else {
		$Plugin_Version	="0.0.0";
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
          '/' . $frontend_uri =>  '/plugin/fbddemo/test_form',
         '/test_process'    => '/plugin/fbddemo/test_form_process',
        ));