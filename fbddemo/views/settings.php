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

<h1><?php echo __('FBDDemo Settings'); ?></h1>
    <table class="index" cellspacing="0" cellpadding="0" border="0">
        <thead>
            <tr>
                <td><?php echo __('Name'); ?></td>
				<td><?php echo __('Update'); ?></td>
				<td><?php echo __('Delete'); ?></td>
            </tr>
        </thead>

        <?php foreach($fbddemo as $fbddemo_data) { ?>

        <tr class="<?php echo odd_even(); ?>">
			<td><?php echo $fbddemo_data->getFBDDemoName(); ?></td>
			<?php
				echo "<td align='right'><a href='".get_url('plugin/fbddemo/Update_Existing_Name/'.$fbddemo_data->id)."'><img src='".PLUGINS_URI."/fbddemo/images/yes.gif' alt='Update' /></a></td>";
				echo "<td align='right'><a href='".get_url('plugin/fbddemo/Delete_Existing_Name/'.$fbddemo_data->id)."'><img src='".PLUGINS_URI."/fbddemo/images/no.gif' alt='Delete' /></a></td>";
			?>
        </tr>
        <?php } ?>
    </table>
