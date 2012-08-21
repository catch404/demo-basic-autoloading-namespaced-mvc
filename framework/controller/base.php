<?php

/* notice the namespace is the exact same as the directory structure, except
that the directories are lowercase. by accepting the default spl_autoload i
accepted the fact that the directory structure should be lowercased */

namespace Framework\Controller;

class Base {

	public function view() {
		// see if this controller has a matching view. else load the default
		// base view.

		$vclass = str_replace('Controller','View',get_class($this));

		if(class_exists($vclass,true)) $view = new $vclass($this);
		else $view = new \Framework\View\Base($this);

		$view->render();
		return;
	}

	public function run() {
		$this->view();
		return;
	}

}
