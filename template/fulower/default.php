<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

$form = $this->data->form;
?>
<?php $this->extend('html'); ?>

<?php $this->block('content');?>
<h1>Fulower</h1>

<form action="<?php echo $this->data->uri->request;?>" method="post">
<div class="toolbar">
	<button type="submit" class="btn btn-primary">Save</button>
</div>

<fieldset>
	<legend>Fields</legend>

	<?php echo $form->renderFields();?>
</fieldset>

</form>
<?php $this->endblock();?>
