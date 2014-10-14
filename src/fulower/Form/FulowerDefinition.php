<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Form;


use Windwalker\Form\Field\TextareaField;
use Windwalker\Form\FieldDefinitionInterface;
use Windwalker\Form\Form;
use Windwalker\Form\Field\TextField;

class FulowerDefinition implements FieldDefinitionInterface
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
					'placeholder' => 'ID'
				)
			)
		)->addField(
			 new TextField(
				'title',
				'Title',
				array(
					'placeholder' => 'Title Field'
				)
			)
		)->addField(
			new TextareaField(
				'meaning',
				'Meaning',
				array(
					'cols' => 50,
					'rows' => 15,
				)
			)
		);
	}
}
 