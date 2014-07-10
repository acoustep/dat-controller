<?php namespace Acoustep\DatController;

trait DatTrait {

	/*
	|--------------------------------------------------------------------------
	| Controller name
	|--------------------------------------------------------------------------
	|
	| Name of the controller without the Controller Postfix
	|
	*/

	protected $controllerName;

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

	public function setControllerName($value)
	{
		$this->controllerName = $value;
	}

	/*
	|--------------------------------------------------------------------------
	| Singular
	|--------------------------------------------------------------------------
	|
	| Snakecase singular form for the variable name in create,edit,destroy etc.
	|
	*/

	protected $singular;

	public function getSingular()
	{
		return $this->singular ?: snake_case(str_singular($this->getControllerName()));
	}

	public function setSingular($value)
	{
		$this->singular = $value;
	}

	/*
	|--------------------------------------------------------------------------
	| Plural
	|--------------------------------------------------------------------------
	|
	| Snakecase plural form for the variable name in the index.
	|
	*/

	protected $plural;

	public function getPlural()
	{
		return $this->plural ?: snake_case(str_plural($this->getControllerName()));
	}

	public function setPlural($value)
	{
		$this->plural = $value;
	}

	/*
	|--------------------------------------------------------------------------
	| Model
	|--------------------------------------------------------------------------
	|
	| The model to get the data from.
	|
	*/

	protected $model;

	public function getModel()
	{
		$singular_model = str_singular($this->getControllerName());
		return ($this->model) ? new $this->model : new $singular_model;
	}


	public function setModel($value)
	{
		$this->model = $value;
	}

	/*
	|--------------------------------------------------------------------------
	| Static Model
	|--------------------------------------------------------------------------
	|
	| For retrieving the model name without being initialised.
	|
	*/


	public function getStaticModel()
	{
		$singular_model = str_singular($this->getControllerName());
		return ($this->model) ? $this->model : $singular_model;
	}

	protected $rules;

	public function getRules()
	{
		$staticModel = $this->getStaticModel();
		return ($this->rules) ? $this->rules : $staticModel::$rules;
	}

	public function setRules($rules)
	{
		$this->rules = $rules;
	}

	/*
	|--------------------------------------------------------------------------
	| Views
	|--------------------------------------------------------------------------
	|
	| The name of the directory where the views reside.
	|
	*/

	protected $views;

	public function getViews()
	{
		return $this->views ?: $this->getPlural();
	}


	public function setViews($value)
	{
		$this->views = $value;
	}
}


