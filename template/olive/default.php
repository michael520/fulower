<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

?>

<?php
/** @var \Windwalker\Renderer\PhpRenderer $this */
$this->extend('html');
?>



<?php $this->block('content'); ?>
	<?php echo $this->parent(); ?>
	<h1>Olive Default Template</h1>
	<h2><?php echo $this->data->item->title; ?></h2>
	<p>
		<?php echo $this->data->item->meaning; ?>
	</p>
<?php $this->endblock(); ?>
