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

class FBDDemoController extends PluginController {
	
	function __construct() {
		AuthUser::load();
		if (defined('CMS_BACKEND')) {
			if (!defined('FBDDEMO_VIEWS_BASE')) {
				define('FBDDEMO_VIEWS_BASE', 'fbddemo/views');
			}
			if (!defined('PLUGIN_FBDDEMO_ROOT')) {
				define('PLUGIN_FBDDEMO_ROOT', PLUGINS_ROOT.'/fbddemo/');
			}
			$this->setLayout('backend');
			$this->assignToLayout('sidebar', new View('../../plugins/fbddemo/views/sidebar'));
		} else {
			if (!defined('FBDDEMO_VIEWS_BASE')) {
				define('FBDDEMO_VIEWS_BASE', 'fbddemo/views');
			}
			$page = $this->findByUri();
			$layout_id = $this->getLayoutId($page);
			$layout = Layout::findById($layout_id);
			$this->setLayout($layout->name);
		} 
	}
	
	// function is required to get the page layout for frontend usage
	private function getLayoutId($page) {
		if ($page->layout_id) {
			return $page->layout_id;
		} else if ($page->parent) {
			return $this->getLayoutId($page->parent);
		} else {
			return 2; // 2 is the standard Wolf layout of a default WolfCMS installation
		}
	}
	
	// Take me to all fbddemo
	public function index() {
		$this->settings();
	}
	
	// Documentation. Display the documentation page in the view directory
	public function documentation() {
		$this->display(FBDDEMO_VIEWS_BASE . '/documentation');
	}
	
	// Show the plugin settings from the database table and then display the settings page in the view directory
	public function settings() {
		$fbddemo = FBDDemo::findAllFrom('FBDDemo', 'id=id ORDER BY id DESC');
		$this->display(FBDDEMO_VIEWS_BASE . '/settings', array(
			'fbddemo' => $fbddemo,
		));
	}
	// Update Existing Name
    public function Update_Existing_Name($id){
        $fbddemo = FBDDemo::findByIdFrom('FBDDemo', $id);
        $this->display(FBDDEMO_VIEWS_BASE.'/update_name', array('fbddemo' => $fbddemo));
    }
	
	// Delete Existing Name
    public function Delete_Existing_Name($id) {
		$fbddemo = FBDDemo::findByIdFrom('FBDDemo', $id);
		$fbddemo->delete();
		Flash::set('success', __('Your name was successfully deleted'));
		redirect(get_url('plugin/fbddemo/settings'));
    }
	
	// Create New Name
    public function New_Name(){
        $this->display(FBDDEMO_VIEWS_BASE.'/new_name');
    }
	
    // Create New name in Database
    public function new_name_2db(){

			if (!isset($_POST['save'])) {
                Flash::set('error', __('Could not save this name'));
            } else {
                $data = $_POST['fbddemo'];
				use_helper('Kses');
                $data['id'] = kses(trim($data['id']), array());
                $fbddemo = new FBDDemo();
				$fbddemo->fbddemoname = $data['name'];
                $fbddemo->save();
                Flash::set('success', __('Settings saved successfully'));
                redirect(get_url('plugin/fbddemo/settings'));
        }
    }
	
	// Update name in Database
    public function Update_Name_2db(){

            if (!isset($_POST['save'])) {
                Flash::set('error', __('Could not update this name'));
            }
            else {
                $data = $_POST['fbddemo'];
                use_helper('Kses');
                $data['id'] = kses(trim($data['id']), array());
                $fbddemo = new FBDDemo();
				$fbddemo->id = $data['id'];
				$fbddemo->fbddemoname = $data['name'];
                $fbddemo->save();
                Flash::set('success', __('Settings saved successfully'));
                redirect(get_url('plugin/fbddemo/settings'));
        }
    }
	

	
	// Test Function to show you can use the dispatcher to reference functions in the FBDDemoController
	// This function will load any POSTED data in the vars array and then display the form page in the view directory passing the vars array as data
	public function test_form() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$vars = isset($_POST) ? $_POST : null;
		} else {
			$vars = [0 => 'Peter',1 => 'Patrick', 2 => 'Dennis',3 =>'Chico'];
			shuffle($vars); // Shuffle to just randomise the array
		}
		$this->display('../../plugins/fbddemo/views/form', array(
			'vars' => $vars,
			));

	}
	
	public function test_form_process() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$vars = isset($_POST) ? $_POST : null;
		}
		$this->display('../../plugins/fbddemo/views/form_process', array(
			'vars' => $vars,
			));
	}
	
	public function content($part = false, $inherit = false) {
		if (!$part) {
			return $this->content;
		} else {
			return false;
		}
	}
	
}
