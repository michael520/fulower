<?php
/**
 * Part of fulower project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Fulower\Windwalker\View;


use Joomla\Model\ModelInterface;
use Joomla\View\AbstractHtmlView;
use Windwalker\Renderer\RendererInterface;
use Windwalker\Renderer\PhpRenderer;

class HtmlView extends AbstractHtmlView
{
	/**
	 * Property data.
	 *
	 * @var  array
	 */
	protected $data = array();

	/**
	 * @param array             $data
	 * @param \SplPriorityQueue $paths
	 */
	public function __construct($data = array(), RendererInterface $renderer = null)
	{
		$this->data = $data;

		$this->renderer = $renderer ? : new PhpRenderer;
	}

	public function render()
	{
		return $this->renderer->render($this->getLayout(), $this->data);
	}

	/**
	 * get
	 *
	 * @param      $name
	 * @param null $default
	 *
	 * @return  null
	 */
	public function get($name, $default = null)
	{
		if (isset($this->data[$name]))
		{
			return $this->data[$name];
		}

		return $default;
	}

	/**
	 * set
	 *
	 * @param $name
	 * @param $value
	 *
	 * @return  $this
	 */
	public function set($name, $value)
	{
		$this->data[$name] = $value;

		return $this;
	}

	/**
	 * getData
	 *
	 * @return  array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * setData
	 *
	 * @param   array $data
	 *
	 * @return  HtmlView  Return self to support chaining.
	 */
	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}

}
 