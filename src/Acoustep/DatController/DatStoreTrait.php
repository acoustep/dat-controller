<?php namespace Acoustep\DatController;

trait DatStoreTrait {

	public function store()
	{
		$staticModel = $this->getStaticModel();
		$validator = \Validator::make($data = \Input::all(), $staticModel::$rules);

		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}

		$this->getModel()->create($data);

		return \Redirect::route($this->getViews().'.index');
	}
}



