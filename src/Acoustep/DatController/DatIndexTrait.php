<?php namespace Acoustep\DatController;

trait DatIndexTrait {


	public function index()
	{
		list($pagination, $orderBy) = $this->indexConfig();

		$model = $this->model;
		$model = $this->buildOrder($model, $orderBy);

		if($pagination > 0)
			$model = $model->paginate($pagination);
		else
			$model = $model->get();

		return \View::make($this->views.'.index')
			->with($this->plural, $model);
	}

	protected function indexConfig()
	{
		$pagination = (property_exists(
			$this->controllerName.'Controller', 
			'pagination'
		)) ? $this->pagination : 0;

		$orderBy = (property_exists(
			$this->controllerName.'Controller', 
			'orderBy'
		)) ? $this->orderBy : ['id' => 'desc'];

		return [$pagination, $orderBy];
	}

	protected function buildOrder($model, $orderBy = ['id' => 'desc'])
	{
		if(count($orderBy) === 0)
			return $model;

			foreach($orderBy as $column => $order) {
				$model = $model->orderBy($column, $order);
			}
			return $model;
	}
}



