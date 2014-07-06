<?php namespace Acoustep\DatController;

trait DatUpdateTrait {

	public function update($id)
	{
		$staticModel = $this->staticModel;
		$model = $this->model->findOrFail($id);
		$validator = \Validator::make($data = \Input::all(), $staticModel::$rules);

		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}

		$model->update($data);
		return \Redirect::route($this->views.'.index');
	}
}




