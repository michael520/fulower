<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
?>
<?php $this->extend('html'); ?>
<!-- Over write the content block from global html.php ->
<?php $this->block('content');?>
	<h1>Olive Default Template</h1>
	<?php echo $this->data->item->title;?>//<?php echo $this->data->item->meaning;?>
<?php $this->endblock();?>
