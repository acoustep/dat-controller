<?php namespace Acoustep\DatController;

trait DatShowTrait {
	public function show($id)
	{
		$data = $this->getModel()->find($id);

		return \View::make($this->getViews().'.show')
			->with($this->getSingular(), $data);
	}
}





