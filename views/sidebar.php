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

// WolfCMS Security measure
if (!defined('IN_CMS')) { exit(); }

?>
<div class="box">
<p class="button"><a href="<?php echo get_url('plugin/fbddemo/new_name'); ?>"><img src="<?php echo PLUGINS_URI; ?>/fbddemo/images/new_name.png" align="middle" alt="Docs" /> <?php echo __('New Name'); ?></a></p>
<p class="button"><a href="<?php echo get_url('plugin/fbddemo/documentation'); ?>"><img src="<?php echo PLUGINS_URI; ?>/fbddemo/images/docs.png" align="middle" alt="Docs" /> <?php echo __('Documentation'); ?></a></p>
</div>

<div class="box">
    <h3>Simple fbddemo Form</h3>
    <p>There various ways to display your fbddemo functions in your layout, page or snippet.</p>
</div>

