<?php namespace Acoustep\DatController;

trait DatResourceTrait {
	use DatTrait,
			DatIndexTrait,
			DatCreateTrait,
			DatStoreTrait,
			DatEditTrait,
			DatUpdateTrait,
			DatDestroyTrait,
			DatShowTrait;
}
