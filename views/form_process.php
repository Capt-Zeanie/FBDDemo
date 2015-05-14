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
print_r($vars);
?>
<h2>You form has been processed</h2><br>Here are the POSTED variables<br>
<?php if (!empty($vars)) : ?>
<pre>
<?php print_r($vars); ?>
</pre>
<?php endif; ?>