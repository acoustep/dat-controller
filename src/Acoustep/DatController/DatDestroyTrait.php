<?php namespace Acoustep\DatController;

trait DatDestroyTrait {
	/**
	 * destroy
	 *
	 * @param integer $id
	 */
	public function datDestroy($id)
	{
		$data = $this->getModel()->destroy($id);

		return \Redirect::route($this->getViews().'.index');
	}
}
