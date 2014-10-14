<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

/**
 * @var $this \Windwalker\Renderer\PhpRenderer
 * @var $form \Windwalker\Form\Form
 */

$form = $this->data->form;
$this->extend('html');
?>

<?php $this->block('content'); ?>
<h1 class="page-header">Flower</h1>

<form action="<?php echo $this->data->uri->request; ?>" method="post">
	<div class="toolbar">
		<button type="submit" class="btn btn-primary">Save</button>
	</div>

	<fieldset>
		<legend>Fields</legend>

		<?php echo $form->renderFields(); ?>
	</fieldset>
</form>

<?php $this->endblock(); ?>
