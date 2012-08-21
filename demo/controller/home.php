<?php

/* notice the namespace is the exact same as the directory structure, except
that the directories are lowercase. by accepting the default spl_autoload i
accepted the fact that the directory structure should be lowercased */

namespace Demo\Controller;

/* here i will alias Framework to FW. this basically means instead of typing
\Framework\whatever all the time (including the preceeding slash) i can instead
just type FW\whatever. the preceedign slash is required because being in a
totally different namespace (Demo\Controller) the only way to reference
the Framework is from the root of the namespace structure, which is what \
stands for. */

use \Framework as FW;

/* here my home class will extend the framework's base controller class. note
at this point nothing has ever referenced \Framework\Controller\Base yet.
that class will be autoloaded because this class extended it. (that's the cool
factor) */

class Home extends FW\Controller\Base {

}
