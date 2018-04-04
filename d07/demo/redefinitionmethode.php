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
		parent::foo();
		echo "foo class B\n";
		return;
	}
}

$instA = new ExA();
$instA->foo();
$instB = new ExB();
$instB->foo();

?>
