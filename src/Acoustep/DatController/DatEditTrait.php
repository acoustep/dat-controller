<?php namespace Acoustep\DatController;

trait DatEditTrait {
	/**
	 * edit
	 *
	 * @param integer $id
	 */
	public function edit($id)
	{
		$data = $this->getModel()->find($id);

		return \View::make($this->getViews().'.edit')
			->with($this->getSingular(), $data);
	}
}




