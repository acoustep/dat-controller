<?php namespace Acoustep\DatController;

trait DatCreateTrait {
	public function create()
	{
		$model = $this->getModel();

		return \View::make($this->getViews().'.create')
			->with($this->getSingular(), $model);
	}
}


