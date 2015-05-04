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

<form action="<?php echo BASE_URL; ?>testy<?php echo URL_SUFFIX; ?>" method="post">
    <fieldset style="padding:0.5em;">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;"><?php echo __('FBDDemo Settings'); ?></legend>
		<table class="fieldset" cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td>
					<label for="fbddemo-yourname"><?php echo __('Name'); ?>&nbsp;</label>
					<input type="text" id="fbddemo-yourname" name="fbddemo[yourname]" class="textbox" value="<?php echo $vars[0]; ?>" />
				</td>
			</tr>
		
        </table>
    </fieldset>
	<p class="buttons" align="right">
        <input class="button" type="submit" name="save" value="<?php echo __('Save'); ?>" /> or <a href="<?php echo get_url('plugin/fbddemo/settings'); ?>"><?php echo __('Cancel'); ?></a>
    </p>
</form>
<?php if (!empty($vars)) : ?>
<pre>
<?php print_r($vars); ?>
</pre>
<?php endif; ?>