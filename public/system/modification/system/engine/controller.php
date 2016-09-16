<?php
abstract class Controller {
	protected $registry;

	public function __construct($registry) {
		$this->registry = $registry;
 
                      $registry->set('mercadolivre', new Mercadolivre($registry));  
                   
	}

	public function __get($key) {
		return $this->registry->get($key);
	}

	public function __set($key, $value) {
		$this->registry->set($key, $value);
	}
}