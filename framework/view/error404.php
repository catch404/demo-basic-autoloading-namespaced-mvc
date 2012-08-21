<?php

namespace Framework\View;

class Error404 extends Base {

	public function render() {
		echo 'The page you requested was not found. (' , get_class($this), ')', PHP_EOL;
		return;
	}

}
