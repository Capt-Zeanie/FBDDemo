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
 
 This is a small demo plugin I created that allowed me to understand how a plugin works.
 
 The plugin uses....
 Frontend
 Backend (Administration)
 Dispatcher
 Database
 Form
 
 Just put the contents into your plugin folder and head over to the woldcms administration centre and enable.
 
 Enable.php
 Creates the Database and enables the plugin and then populates the table using data from sql_data.php
 
 Disable.php
 Disables the plugin
 
 Uninstall.php
 Drops the plugin database table

 Index.php
 This file contains the plugin information, loads the controller etc
 
 FBDDemoController.php
 This is the plugin controller.
     function __construct() sets up the plugin constants and set the layouts (Frontend and Backend) and the views.
	 function getLayoutId() This is used to get the layout in use on the site.
	 function documentation() This set up the documentation view
	 function settings() This queries the database for the plugin settings and then loads the view
	 function test_form() This is a function that is called by the dispatcher route. in this example it creates an array then loads a form view
	 function test_form_process() This function is also called by the dispatcher. In the example test form the form action is routed to this function to process the form variables then loads the form process view.
	 function content() This loads the content into the views
	 
 Models
 FBDDemo.php
 This is the plugin models class for the database interaction
 
 i18n
 en-message.php
 This is the english translation file
 
 Views
 form.php
 This is the page view for the form used in the dispatcher test_form function()
 
 form_process.php
 This is the page view for the form process used in the dispatcher test_form_process function()
 
 new_name.php
 This is the page view for the form to create a new name in the administration backend
 
 update_name.php
 This is the page view for the form to update an existing name in the administration backend
 
 documentation.php
 This is the documentation view used in the administration backend
 
 settings.php
 This is the settings view to show the database data and plugin data in the administration backend
 
 sidebar.php
 This is the side bar used in the administration backend