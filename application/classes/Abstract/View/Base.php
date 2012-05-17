<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Abstract_View_Base extends Kostache_Layout {

	protected $_layout = 'layout/default';
	protected $_assets;

	public function __construct($template = NULL, array $partials = NULL)
	{
		$this->_assets = new Assets;

		parent::__construct($template, $partials);
	}

	/**
	 * Returns the lowercased class name without the view_ prefix
	 * Useful for giving pages and widgets a class/id
	 *
	 *     `<body id="{{view_name}}">`
	 *
	 * @return string
	 */
	public function view_name()
	{
		$class = get_class($this);

		// Remove 'View_' prefix and lowercase
		return strtolower(substr($class, 5));
	}

}