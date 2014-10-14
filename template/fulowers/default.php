<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
?>
<?php $this->extend('html'); ?>

<?php $this->block('content');?>
<h1>Fulowers</h1>

<div class="toolbar">
	<a href="<?php echo $this->data->uri->base->path;?>fulower" class="btn btn-success">NEW</a>
</div>

<table class="table">
	<thead>
		<tr>
			<td>id</td>
			<td>title</td>
		</tr>
	</thead>
<?php foreach($this->data->items as $item) : ?>
	<tr>
		<td><?php echo $item->id;?></td>
		<td><?php echo $item->title;?></td>
	</tr>
<?php endforeach;?>
</table>
<?php $this->endblock();?>
