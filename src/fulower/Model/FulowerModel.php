<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Model;


use Fulower\Form\FulowerDefinition;
use Fulower\Windwalker\Model\DatabaseModel;
use test\FulowerModelTest;
use Windwalker\DataMapper\DataMapper;
use Windwalker\Form\Form;

class FulowerModel extends DatabaseModel
{

	/**
	 * getItem
	 *
	 * @param null $pk
	 *
	 * @return  mixed
	 */
	public function getItem($pk = null)
	{
		$pk = $pk ? : $this->state->get('item.id');

		return (new DataMapper('#__flower'))->findOne($pk);
	}

	/**
	 * getItems
	 *
	 * @return  mixed
	 */
	public function getItems()
	{
		$limit = $this->state->get('list.limit', 10);
		$start = $this->state->get('list.start', 0);
		$ordering = $this->state->get('list.ordering', 'id');
		$direction = $this->state->get('list.direction', 'asc');

		return (new DataMapper('#__flower'))->find(
			array(),
			$ordering . ' ' . $direction,
			$start,
			$limit
		);
	}

	public function getForm()
	{
		return (new Form('windwalker'))
			->defineFormFields(new FulowerDefinition)
			->loadFile(__DIR__ . '/../Form/fulower.xml');
	}

	public function save()
	{
		return (new DataMapper());
	}
}
 