<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Abstract_Controller_Base extends Controller {

	/**
	 * @var object the content View object
	 */
	public $view;

	public function before()
	{
		// Execute the policies for this controller
		foreach ($this->_policies() as $name => $params)
		{
			if ( ! is_array($params))
				throw new Kohana_Exception('Error: policy parameters must be an array.');

			if (array_key_exists('request', $params))
				throw new Kohana_Exception('Error: \'request\' should not be passed through policy parameters.');

			$params['request'] = $this->request;

			$class  = new ReflectionClass($name);
			$policy = $class->newInstance($this->user, $params);

			$class->getMethod('execute')->invoke($policy);
		}

		// Set default title and content views (path only)
		$directory  = $this->request->directory();
		$controller = $this->request->controller();
		$action     = $this->request->action();

		// Removes leading slash if this is not a subdirectory controller
		$controller_path = trim($directory.'/'.$controller.'/'.$action, '/');

		try
		{
			$this->view = Kostache::factory('page/'.$controller_path);
		}
		catch (Kohana_Exception $x)
		{
			/*
			 * The View class could not be found, so the controller action is
			 * repsonsible for making sure this is resolved.
			 */
			$this->view = NULL;
		}
	}

	/**
	 * Assigns the title to the template.
	 *
	 * @param   string   request method
	 * @return  void
	 */
	public function after()
	{
		// Only try to render a view if we have one set
		if ($this->view !== NULL)
		{
			$this->response->body($this->view);
		}
	}

	/**
	 * Returns true if the post has a valid CSRF
	 *
	 * @return  bool
	 */
	public function valid_post()
	{
		if ($this->request->method() !== HTTP_Request::POST)
			return FALSE;

		if (Request::post_max_size_exceeded())
		{
			Notices::add('error', __('Max filesize of :max exceeded.', array(':max' => ini_get('post_max_size').'B')));
			return FALSE;
		}

		$csrf       = $this->request->post('csrf-token');
		$has_csrf   = ! empty($csrf);
		$valid_csrf = $has_csrf AND CSRF::valid($csrf);

		if ($has_csrf AND ! $valid_csrf)
		{
			// CSRF was submitted but expired
			Notices::add('error', __('This form has expired. Please try submitting it again.'));
			return FALSE;
		}

		return ($has_csrf AND $valid_csrf);
	}

	protected function _policies()
	{
		return array();
	}

}