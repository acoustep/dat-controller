<?php namespace Acoustep\DatController;

trait DatDestroyTrait {

	public function destroy($id)
	{
		$data = $this->model->destroy($id);

		return \Redirect::route($this->views.'.index');
	}
}
