<?php namespace Acoustep\DatController;

trait DatUpdateTrait {
	/**
	 * update
	 *
	 * @param integer $id
	 */
	public function update($id)
	{
		$staticModel = $this->getStaticModel();
		$model = $this->getModel()->findOrFail($id);
		$validator = \Validator::make($data = \Input::all(), $this->getRules());

		if ($validator->fails())
		{
			return \Redirect::back()->withErrors($validator)->withInput();
		}

		$model->update($data);
		return \Redirect::route($this->getViews().'.index');
	}
}




