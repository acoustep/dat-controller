<?php namespace Acoustep\DatController;

trait DatStoreTrait {

	public function store()
	{
		$staticModel = $this->staticModel;
		$validator = \Validator::make($data = \Input::all(), $staticModel::$rules);

		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}

		$this->model->create($data);

		return \Redirect::route($this->views.'.index');
	}
}



