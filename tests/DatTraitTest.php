<?php

use \Mockery as m;
use Orchestra\Testbench\TestCase;

class DatTraitTest extends TestCase {

	public $controller;

	public function setUp()
	{
		$this->controller = $this->getObjectForTrait(
			'Acoustep\DatController\DatTrait',
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
	public function set_controller_name()
	{
		$this->controller->setControllerName('Blogs');
		$this->assertEquals('Blogs', $this->controller->getControllerName());
	}

	/**
	 * @test
	 */
	public function get_singular()
	{
		$this->assertEquals('post', $this->controller->getSingular());
	}

	/**
	 * @test
	 */
	public function set_singular()
	{
		$this->controller->setSingular('blog');
		$this->assertEquals('blog', $this->controller->getSingular());
	}

	/**
	 * @test
	 */
	public function get_plural()
	{
		$this->assertEquals('posts', $this->controller->getPlural());
	}

	/**
	 * @test
	 */
	public function set_plural()
	{
		$this->controller->setPlural('blogs');
		$this->assertEquals('blogs', $this->controller->getPlural());
	}

	/**
	 * @test
	 */
	public function get_model()
	{
		$model = m::mock('Post');
		$this->assertInstanceOf('Post', $this->controller->getModel());
	}

	/**
	 * @test
	 */
	public function set_model()
	{
		$model = m::mock('Blog');
		$this->controller->setModel('Blog');
		$this->assertInstanceOf('Blog', $this->controller->getModel());
	}

	/**
	 * @test
	 */
	public function get_static_model()
	{
		$this->assertEquals('Post', $this->controller->getStaticModel());
	}

	/**
	 * @test
	 */
	public function get_views()
	{
		$this->assertEquals('posts', $this->controller->getViews());
	}

	/**
	 * @test
	 */
	public function set_views()
	{
		$this->controller->setViews('blogs');
		$this->assertEquals('blogs', $this->controller->getViews());
	}
}
