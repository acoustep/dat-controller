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

	/*
	|--------------------------------------------------------------------------
	| Singular
	|--------------------------------------------------------------------------
	|
	| Snakecase singular form for the variable name in create,edit,destroy etc.
	|
	*/

	public $singular;

	/*
	|--------------------------------------------------------------------------
	| Plural
	|--------------------------------------------------------------------------
	|
	| Snakecase plural form for the variable name in the index.
	|
	*/

	public $plural;

	/*
	|--------------------------------------------------------------------------
	| Model
	|--------------------------------------------------------------------------
	|
	| The model to get the data from.
	|
	*/

	public $model;

	/*
	|--------------------------------------------------------------------------
	| Static Model
	|--------------------------------------------------------------------------
	|
	| For retrieving the model name without being initialised.
	|
	*/

	public $staticModel;

	/*
	|--------------------------------------------------------------------------
	| Views
	|--------------------------------------------------------------------------
	|
	| The name of the directory where the views reside.
	|
	*/

	public $views;

	public function __construct()
	{
		$this->controllerName = strtolower(preg_replace(
			'/Controller$/', 
			'', 
			__CLASS__
		));

		$this->singular = ($this->singular) ?: snake_case(str_singular($this->controllerName));
		$this->plural = ($this->plural) ?: snake_case(str_plural($this->controllerName));
		$singular_model = str_singular($this->controllerName);
		$this->model = ($this->model) ? new $this->model : new $singular_model;
		$this->staticModel = ($this->staticModel) ? $this->staticModel : $singular_model;
		$this->views = ($this->views) ?: $this->plural;
	}
}


