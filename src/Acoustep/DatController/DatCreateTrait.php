<?php namespace Acoustep\DatController;

trait DatCreateTrait {

	public function create()
	{
		$model = $this->model;

		return \View::make($this->views.'.create')
			->with($this->singular, $model);
	}
}


