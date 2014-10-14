<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Flower\Model;

use Flower\Form\FlowerDefinition;
use Windwalker\Data\Data;
use Windwalker\Data\DataSet;
use Windwalker\DataMapper\DataMapper;
use Windwalker\Form\Field\TextField;
use Windwalker\Form\Form;
use Windwalker\Model\DatabaseModel;

/**
 * The FlowerModel class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class FlowerModel extends DatabaseModel
{
	/**
	 * getItem
	 *
	 * @param int $pk
	 *
	 * @return  Data
	 */
	public function getItem($pk = null)
	{
		$pk = $pk ? : $this->state->get('item.id');

		return (new DataMapper('#__flower'))->findOne($pk);
	}

	/**
	 * getItems
	 *
	 * @return  DataSet
	 */
	public function getItems()
	{
		$limit = $this->state->get('list.limit', 10);
		$start = $this->state->get('list.start', 0);
		$ordering = $this->state->get('list.ordering', 'id');
		$direction = $this->state->get('list.direction', 'desc');

		return (new DataMapper('#__flower'))->find(
			array(),
			$ordering . ' ' . $direction,
			$start,
			$limit
		);
	}

	/**
	 * getForm
	 *
	 * @return  Form
	 */
	public function getForm()
	{
		return (new Form('windwalker'))
			->defineFormFields(new FlowerDefinition)
			->loadFile(__DIR__ . '/../Form/flower.xml');
	}

	/**
	 * save
	 *
	 * @param array $data
	 *
	 * @return  Data
	 */
	public function save($data = array())
	{
		return (new DataMapper('#__flower'))->saveOne($data, 'id');
	}
}
 