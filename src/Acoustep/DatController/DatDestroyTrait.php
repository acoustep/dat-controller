<?php namespace Acoustep\DatController;

trait DatDestroyTrait {
	public function destroy($id)
	{
		$data = $this->getModel()->destroy($id);

		return \Redirect::route($this->getViews().'.index');
	}
}
