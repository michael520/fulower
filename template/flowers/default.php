<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

/** @var \Windwalker\Renderer\PhpRenderer $this */
$this->extend('html');
?>

<?php $this->block('content'); ?>
<h1 class="page-header">Flowers</h1>

<?php foreach ($this->data->flashes as $type => $flash): ?>
	<?php foreach ($flash as $msg): ?>
		<div class="alert alert-<?php echo $type; ?>">
			<?php echo $msg; ?>
		</div>
	<?php endforeach; ?>
<?php endforeach; ?>

<div class="toolbar">
	<a href="<?php echo $this->data->uri->base->path; ?>flower" class="btn btn-success">NEW</a>
</div>

<table class="table table-striped">
	<thead>
	<tr>
		<th class="text-center">ID</th>
		<th class="text-center">Title</th>
		<th class="text-center">Meaning</th>
		<th class="text-center">State</th>
		<th class="text-center">Ordering</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($this->data->items as $item): ?>
	<tr>
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo $item->title; ?>
		</td>
		<td>
			<?php echo $item->meaning; ?>
		</td>
		<td>
			<?php $icon = $item->state ? 'ok text-success' : 'remove text-danger'; ?>
			<span class="glyphicon glyphicon-<?php echo $icon; ?>"></span>
		</td>
		<td>
			<?php echo $item->ordering; ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<?php $this->endblock(); ?>
