<?php namespace Acoustep\DatController;

trait DatCreateTrait {
	/**
	 * create
	 *
	 */
	public function datCreate()
	{
		$model = $this->getModel();

		// return View::make($this->getViews().'.create')
		// 	->with($this->getSingular(), $model);

		return \View::make($this->getViews().'.create')
			->with($this->getSingular(), $model);
	}
}


