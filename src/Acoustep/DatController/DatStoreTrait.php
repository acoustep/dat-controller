<?php namespace Acoustep\DatController;

trait DatStoreTrait {

	/**
	 * store
	 *
	 */
	public function datStore()
	{
		$validator = \Validator::make($data = \Input::all(), $this->getRules());

		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}

		$this->getModel()->create($data);

		return \Redirect::route($this->getViews().'.index');
	}
}



