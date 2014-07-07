<?php namespace Acoustep\DatController;

trait DatEditTrait {
	public function edit($id)
	{
		$data = $this->getModel()->find($id);

		return \View::make($this->getViews().'.edit')
			->with($this->getSingular(), $data);
	}
}




