<?php

namespace Framework\View;

class Base {

	protected $controller;

	public function __construct($controller) {
		$this->controller = $controller;
		return;
	}

	public function render() {
		echo 'Viewing: <b>', get_class($this), '</b><br />';
		echo 'From <b>', get_class($this->controller), '</b>', PHP_EOL;
		return;
	}

}
