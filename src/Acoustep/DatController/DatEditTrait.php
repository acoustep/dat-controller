<?php namespace Acoustep\DatController;

trait DatEditTrait {

	public function edit($id)
	{
		$data = $this->model->find($id);

		return \View::make($this->views.'.edit')
			->with($this->singular, $data);
	}
}




