<?php
/**
 * 
 *
 * @name index.php
 * @package IKL
 * @since 2007-06-07
 * @version 2007-07-18
 * @copyright Cylab 2007
 * @author Lukas Kalinski
 */
header('content-type:text/plain');

class Foo {
	private $foo;
	public function __construct() {
		$this->foo = 'abc';
	}
	public function hoho() {
		echo $this->foo;
	}
}
$a = new ReflectionClass('Foo');
$foo = $a->newInstance();
echo $a->getProperty('foo')->getValue();

exit;
echo md5('a');

exit;
interface A {
}

class B implements A {
}

abstract class Foo {
	private $hej = 23;
	public function hej($a){
		throw new Exception('no good');
	}
}

class Bar extends Foo {
	public function hej(B $a) { $this->hej('a'); }
//	function __toString() { return 'a'; }
}
//$bar = new Bar;
//$bar->hej(new B);

//abstract class A {
//  protected function __construct() { echo "in parent\n"; }
//}

//class B extends A {
//  function __construct($name) { parent::__construct(); echo "name: $name"; }
//}

//$a = new B('a');
//$foo = 'F';
//if ($a instanceof $foo) {
//  echo 'hej!';
//}
//exit;
//class Foo {
//  const BARBAR = 'hej hej hej';
//  private $bar = self::BARBAR;
//  function hoho($propName) {
//    return $this->$propName;
//  }
//}
//$f = new Foo;
//echo $f->hoho('bar');

 exit;
// temp stuff:
//header('content-type:text/plain');
//@unlink(PROJECT_ROOT.'data/ikl/cyfram/appreg_freeze.txt');
// end temp stuff

// Start application:
require 'IKL.php';
IKL::start();
?>