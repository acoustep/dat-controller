# DatController - A Laravel 4 Controller Trait

DatController trait adds methods for all of the Laravel route resources.

## Getting Started

Add the trait into your controller

```
<?php
use Acoustep\DatController\DatResourceTrait;

class PostsController extends BaseController {
	use DatResourceTrait;
}
```

Now the following methods are added to your controller with some basic functionality: ```create```, ```edit```, ```destroy```, ```index```,```update```, ```show``` and ```store```.


## Installation

Add the package to your composer.json file.

```
"acoustep/dat-controller": "dev-master"
```

## View location

By default views are looked for in the name of your controller without the postfix "Controller", snake case and plural. 

Example, if your controller is called ```ImagesController``` then your views will be in the ```images``` directory.  If your controller is called BlogPostsController, then they will be looked for in ```blog_posts```.

To change their location use ```$this->setViews('dir_name');``` in your constructer.

## Accessing model data in the view

In your ```index``` view the same naming convention that applies to your view directory applies to your model data variable name.

```ImagesController``` will have ```$images``` to iterate through.

In your ```create``` and ```edit``` views the singular version of your controller name is used.  So ```ImagesController``` becomes ```$image```.

To change the defaults your can set ```$this->setSingular('name')```and ```$this->setPlural('names')``` in your constructor.

## Index Pagination

By default pagination is off. To turn it on set ```public $pagination = 15``` in your controller. Then you can access the ```$model->links()```method from your model instance.

## Validation

Validator::make is called in the ```store``` and ```update``` methods.  By default it will look for ```public static $rules```in your model.  To override this you can set them manually with ```$this->setRules([])``` in your constructor.

## Overriding Methods

Once you get to a point when you need more control over a method you can simply define it in your controller.

```
<?php
use Acoustep\DatController\DatResourceTrait;

class PostsController extends BaseController {
	use DatResourceTrait;
	
	public function create() {
		return 'custom method';
	}
}
```

## Changing the Model Name

If you wish to change the model use ```$this->setModel('ModelName')``` in your constructor.

## To Do

* Nested Resources
* Allow validation class to be swapped out