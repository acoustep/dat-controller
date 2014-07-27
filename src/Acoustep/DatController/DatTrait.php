<?php namespace Acoustep\DatController;

trait DatTrait {

	/**
	 * controllerName
	 *
	 * @var string
	 */
	protected $controllerName;

	/**
	 * getControllerName
	 *
	 * ControllerName if set manually.
	 * The current class name with "Controller" cut from the end.
	 *
	 * @return string
	 */
	public function getControllerName()
	{
		if ($this->controllerName) return $this->controllerName;

		$this->controllerName = preg_replace(
			'/Controller$/', 
			'', 
			__CLASS__
		);
		return $this->controllerName;
	}

	/**
	 * setControllerName
	 *
	 * @param string $value
	 */
	public function setControllerName($value)
	{
		$this->controllerName = $value;
	}

	/**
	 * singular
	 *
	 * Singular is set manually.
	 * Singular version of controller name in snake case.
	 *
	 * @return string
	 */
	protected $singular;

	public function getSingular()
	{
		return $this->singular ?: snake_case(str_singular($this->getControllerName()));
	}

	/**
	 * setSingular
	 *
	 * @param string $value
	 */
	public function setSingular($value)
	{
		$this->singular = $value;
	}

	/**
	 * plural
	 *
	 * @var string
	 */
	protected $plural;

	/**
	 * getPlural
	 *
	 * Plural if set manually.
	 * Plural version of controller name in snake case.
	 *
	 * @return string
	 */
	public function getPlural()
	{
		return $this->plural ?: snake_case(str_plural($this->getControllerName()));
	}

	/**
	 * setPlural
	 *
	 * @param string $value
	 */
	public function setPlural($value)
	{
		$this->plural = $value;
	}

	/**
	 * model
	 *
	 * @var mixed
	 */
	protected $model;

	/**
	 * getModel
	 *
	 * New instance of model if set manually.
	 * New instance of controller name singular. Follows Laravel naming convention.
	 *
	 * @return instance
	 */
	public function getModel()
	{
		$singular_model = str_singular($this->getControllerName());
		return ($this->model) ? new $this->model : new $singular_model;
	}


	/**
	 * setModel
	 *
	 * @param string $value
	 */
	public function setModel($value)
	{
		$this->model = $value;
	}

	/**
	 * getStaticModel
	 *
	 * Same as getModel() without creating an instance.
	 *
	 * @return string
	 */
	public function getStaticModel()
	{
		$singular_model = str_singular($this->getControllerName());
		return ($this->model) ? $this->model : $singular_model;
	}

	/**
	 * rules
	 *
	 * @var array
	 */
	protected $rules;

	/**
	 * getRules
	 *
	 * Rules if set manually.
	 * Looks for public static $rules in model.
	 *
	 * @return array
	 */
	public function getRules()
	{
		$staticModel = $this->getStaticModel();
		return ($this->rules) ? $this->rules : $staticModel::$rules;
	}

	/**
	 * setRules
	 *
	 * @param array $rules
	 */
	public function setRules($rules)
	{
		$this->rules = $rules;
	}

	/**
	 * views
	 *
	 * @var string
	 */
	protected $views;

	/**
	 * getViews
	 *
	 * Views if set manually.
	 * Uses getPlural() otherwise.
	 *
	 * @return string
	 */
	public function getViews()
	{
		return $this->views ?: $this->getPlural();
	}


	/**
	 * setViews
	 *
	 * @param string $value
	 */
	public function setViews($value)
	{
		$this->views = $value;
	}

	function __call($method, $args)
	{
		$action = "dat".ucwords($method);

		$send_arguments = true;

		if(count($args) > 1)
			$arg = end($args);
		elseif(count($args) === 1)
			$arg = $args[0];
		else
			$send_arguments = false;

		if(method_exists($this, $action)) {
			if($send_arguments)
				return $this->$action($arg);
			else
				return $this->$action();
		}
	}
}


