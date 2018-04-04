#!/usr/bin/php
<?PHP
class ExA {

	function __construct () {
		echo "construct A\n";
		return;
	}

	function __destruct () {
		echo "destruct A\n";
		return;
	}

	function foo () {
		echo "foo class A\n";
		return;
	}

	function test () {
		self::foo();
		return;
	}
}

class ExB extends ExA {

	function __construct () {
		parent::__construct();
		echo "construct B\n";
		return;
	}

	function __destruct () {
		echo "destruct B\n";
		parent::__destruct();
		return;
	}

	function foo () {
		echo "foo class B\n";
		return;
	}

	function test () {
		parent::foo();
		self::foo();
		return;
	}
}

$instA = new ExA();
$instB = new ExB();
//$instA->foo();
//$instB->foo();
//$instA->test();
//$instB->test();
$instB->test();

?>
