<?php
/**
 * Part of flower project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\View;

use Joomla\View\AbstractHtmlView;
use Windwalker\Data\Data;
use Windwalker\Renderer\PhpRenderer;
use Windwalker\Renderer\RendererInterface;

/**
 * The HtmlView class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class HtmlView extends AbstractHtmlView
{
	/**
	 * Property data.
	 *
	 * @var  array
	 */
	protected $data = array();

	/**
	 * Property renderer.
	 *
	 * @var  RendererInterface
	 */
	protected $renderer;

	/**
	 * Class init.
	 *
	 * @param array             $data
	 * @param RendererInterface $renderer
	 */
	public function __construct($data = array(), RendererInterface $renderer = null)
	{
		$this->data = ($data instanceof Data) ? $data : new Data($data);

		$this->renderer = $renderer ? : new PhpRenderer;
	}

	/**
	 * render
	 *
	 * @return  string
	 */
	public function render()
	{
		return $this->renderer
			->setPaths($this->paths)
			->render($this->getLayout(), $this->data);
	}

	/**
	 * get
	 *
	 * @param string $name
	 * @param string $default
	 *
	 * @return  mixed|null
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
	 * @param string $name
	 * @param string $value
	 *
	 * @return  $this
	 */
	public function set($name, $value)
	{
		$this->data[$name] = $value;

		return $this;
	}

	/**
	 * Method to get property Data
	 *
	 * @return  array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * Method to set property data
	 *
	 * @param   array $data
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}
}
 