<?php

use \Mockery as m;
use Acoustep\DatController\DatTrait;
use Acoustep\DatController\DatCreateTrait;
// use Illuminate\View\Factory as View;
use \Post;
use Orchestra\Testbench\TestCase;

class DatResourceTraitTest extends TestCase {

	public $controller;

	public function setUp()
	{
		parent::setUp();
		$this->controller = $this->getObjectForTrait(
			'Acoustep\DatController\DatResourceTrait',
			[],
			'PostsController'
			);
	}

	public function tearDown()
	{
		m::close();
	}

	/**
	 * @test
	 */
	public function get_controller_name()
	{
		$this->assertEquals('Posts', $this->controller->getControllerName());
	}

	/**
	 * @test
	 */
	public function check_create_method()
	{
		$model = m::mock('Post');
		$view = View::shouldReceive('make->with')->once();
		$this->controller->create();
	}

	/**
	 * @test
	 */
	public function check_destroy_method()
	{
		$model = m::mock('Post')->shouldReceive('destroy')->with(1)->andReturn(true);
		$this->controller->setModel($model);
		$view = Redirect::shouldReceive('route')->once();
		$this->controller->destroy(1);
	}

	/**
	 * @test
	 */
	public function check_edit_method()
	{
		$model = m::mock('Post')->shouldReceive('find')->with(1)->andReturn([]);
		$this->controller->setModel($model);
		$view = View::shouldReceive('make->with')->once();
		$this->controller->edit(1);
	}

	/**
	 * @test
	 */
	public function check_index_method()
	{
		$model = m::mock('Post')->shouldReceive('orderBy')->with(['id' => 'desc']);
		$this->controller->setModel($model);
		$view = View::shouldReceive('make->with')->once();
		$this->controller->index();
	}

	/**
	 * @test
	 */
	public function check_show_method()
	{
		$model = m::mock('Post')->shouldReceive('find')->with(1)->andReturn([]);
		$this->controller->setModel($model);
		$view = View::shouldReceive('make->with')->once();
		$this->controller->show(1);
	}

	/**
	 * @test
	 */
	public function check_store_method()
	{
		$input = Input::shouldReceive('all')->andReturn(['title' => 'test', 'content' => 'test']);
		$this->controller->setRules(['title' => 'required']);
		$validator = Validator::shouldReceive('make->fails')->andReturn(false);
		$model = m::mock('Post')->shouldReceive('create')->with($input);
		$this->controller->setModel($model);
		$view = Redirect::shouldReceive('route')->once();
		$this->controller->store();
	}


}

