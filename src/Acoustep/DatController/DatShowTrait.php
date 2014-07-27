<?php namespace Acoustep\DatController;

trait DatShowTrait {
	/**
	 * show
	 *
	 * @param integer $id
	 */
	public function datShow($id)
	{
		$data = $this->getModel()->find($id);

		return \View::make($this->getViews().'.show')
			->with($this->getSingular(), $data);
	}
}





