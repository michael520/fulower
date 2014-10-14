<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Form;

use Windwalker\Form\Field\TextareaField;
use Windwalker\Form\Field\TextField;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;

/**
 * The FlowerDefinition class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class FlowerDefinition implements FieldDefinitionInterface
{
	/**
	 * Define the form fields.
	 *
	 * @param Form $form The Windwalker form object.
	 *
	 * @return  void
	 */
	public function define(Form $form)
	{
		$form->addField(
			new TextField(
				'id',
				'ID',
				array(
					'placeholder' => 'ID',
					'readonly' => true
				)
			),
			'id'
		)->addField(
			new TextField(
				'title',
				'Title',
				array(
					'placeholder' => 'Title Field'
				)
			),
			'basic'
		)->addField(
			new TextareaField(
				'meaning',
				'Meaning',
				array(
					'cols' => 50,
					'rows' => 15
				)
			)
		);
	}
}
 