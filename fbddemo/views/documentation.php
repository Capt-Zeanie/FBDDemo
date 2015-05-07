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

// WolfCMS Security measure
if (!defined('IN_CMS')) { exit(); }

?>
<h1><?php echo __('Documentation'); ?></h1>

<h3>Welcome to Sean's FBDDemo (Frontend, Backend, Dispatcher, Demo) plugin.</h3>

<p>
    The purpose of this plugin was to create a test plugin for me to easily understand how a plugin works in WolfCMS.
</p>
<p>/**
 * FBDDemo plugin for Wolf CMS<br>
 *<br>
 * Simple fbddemo functions for frontend, backend and dispatcher.<br>
 *<br>
 * @author Sean Arrowsmith<br>
 * @package Wolf<br>
 * @subpackage plugin.fbddemo<br>
 */<br>
 <br>
 <br>
 The plugin uses....<br>
 Frontend<br>
 Backend (Administration)<br>
 Dispatcher<br>
 Database<br>
 Form<br>
 <br>
 Just put the contents into your plugin folder and head over to the woldcms administration centre and enable.<br>
 <br>
 Installation<br>
 Just put the fbddemo folder into your plugin folder and head over to the woldcms administration centre and enable.<br>
 <br>
 You can access the frontend by either....<br>
 If WolfCMS is installed in your root folder then using www.domain.com/test will show the frontend content. <br>
 If WolfCMS is installed inside another folder othe than your root folder then using www.domain.com/wolf_installation_folder/test will show the frontend content.<br>
 * See the dispatcher code in index.php how the dispatcher takes /test and forwards the route onto /plugin/fbddemo/test_form which is a function in the controller.<br>
 <br>
 Enable.php<br>
 Creates the Database and enables the plugin and then populates the table using data from sql_data.php and also places plugin data in the plugin setting table using Plugin::setAllSettings<br>
 <br>
 Disable.php<br>
 Disables the plugin<br>
 <br>
 Uninstall.php<br>
 Drops the plugin database table and uses Plugin::deleteAllSettings to delete the plugin settings.<br>
<br>
 Index.php
 This file contains the plugin information, loads the controller etc and also loads the dispatcher routes.
 <br>
 FBDDemoController.php<br>
 This is the plugin controller.<br>
     function __construct() sets up the plugin constants and set the layouts (Frontend and Backend) and the views.<br>
	 function getLayoutId() This is used to get the layout in use on the site.<br>
	 function documentation() This set up the documentation view<br>
	 function settings() This queries the database for the plugin settings and then loads the view<br>
	 function test_form() This is a function that is called by the dispatcher route. in this example it creates an array then loads a form view<br>
	 function test_form_process() This function is also called by the dispatcher. In the example test form the form action is routed to this function to process the form variables then loads the form process view.<br>
	 function content() This loads the content into the views<br>
	 <br>
 Models<br>
 FBDDemo.php<br>
 This is the plugin models class for the database interaction<br>
 <br>
 i18n<br>
 en-message.php<br>
 This is the english translation file<br>
 <br>
 Views<br>
 form.php<br>
 This is the page view for the form used in the dispatcher test_form function()<br>
 <br>
 form_process.php<br>
 This is the page view for the form process used in the dispatcher test_form_process function()<br>
 <br>
 new_name.php<br>
 This is the page view for the form to create a new name in the administration backend<br>
 <br>
 update_name.php<br>
 This is the page view for the form to update an existing name in the administration backend<br>
 <br>
 documentation.php<br>
 This is the documentation view used in the administration backend<br>
 <br>
 settings.php<br>
 This is the settings view to show the database data and plugin data in the administration backend<br>
 <br>
 sidebar.php<br>
 This is the side bar used in the administration backend</p><br>
</p>