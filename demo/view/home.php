<?php

namespace Demo\View;
use \Framework as FW;

class Home extends FW\View\Base {

	public function render() {

echo <<< LOLDOC
<ul>
	<li><a href="?page=Home">This Page</a></li>
	<li><a href="?page=Basic">A custom controller that does nothing.</a></li>
	<li><a href="?page=ZOMGWTFBBQ">A page that does not exist.</a></li>
</ul>
LOLDOC;

		return;
	}

}
