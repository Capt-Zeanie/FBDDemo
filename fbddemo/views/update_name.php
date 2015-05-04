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

<h1><?php echo __('Update FBDDemo Settings'); ?></h1>

<form action="<?php echo BASE_URL; ?>plugin/fbddemo/update_name_2db" method="post">
    <fieldset style="padding:0.5em;">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('Update Name'); ?></legend>
            <table class="fieldset" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td><label for="fbddemo-id"><?php echo __('FBDDemo ID'); ?>&nbsp;</label><input type="text" readonly="readonly" id="fbddemo-id" name="fbddemo[id]" class="textbox" value="<?php echo $fbddemo->getId(); ?>" /></td>
                </tr>
				 <tr>
				<td>
					<label for="fbddemo-name"><?php echo __('Name'); ?>&nbsp;</label>
					<input type="text" id="fbddemo-name" name="fbddemo[name]" class="textbox" value="<?php echo $fbddemo->getFBDDemoName(); ?>" />
				</td>
				</tr>
		 </table>
    </fieldset>
    <p class="buttons" align="right">
        <input class="button" type="submit" name="save" value="<?php echo __('Save'); ?>" /> or <a href="<?php echo get_url('plugin/fbddemo/settings'); ?>"><?php echo __('Cancel'); ?></a>
    </p>
</form>
<script type="text/javascript">
// <![CDATA[
    function setConfirmUnload(on, msg) {
        window.onbeforeunload = (on) ? unloadMessage : null;
        return true;
    }

    function unloadMessage() {
        return '<?php echo __('You have modified this page. If you navigate away from this page without first saving your data, the changes will be lost.'); ?>';
    }

    $(document).ready(function() {
        // Prevent accidentally navigating away
        $(':input').bind('change', function() { setConfirmUnload(true); });
        $('form').submit(function() { setConfirmUnload(false); return true; });
    });
// ]]>
</script>