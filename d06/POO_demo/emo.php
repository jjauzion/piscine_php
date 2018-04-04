#!/usr/bin/php
<?PHP

class Exemple {

	public $foo = 0;
	private $_privateFoo = 'hello';

	function __construct() {
		print('construct called' . PHP_EOL);
		print('$this->foo: ' . $this->foo . PHP_EOL);
		$this->foo = 42;
		print('$this->foo: ' . $this->foo . PHP_EOL);
		print('$this->_privateFoo: ' . $this->_privateFoo . PHP_EOL);
		$this->_privateFoo = world;
		print('$this->_privateFoo: ' . $this->_privateFoo . PHP_EOL);
		$this->bar();
		$this->_privatebar();B
		return;
	}

	function __destruct() {
		print('destruct called' . PHP_EOL);
		return;
	}

	function bar() {
		print('Method bar called' . PHP_EOL);
		return;
	}
	private function _privateBar() {
		print('Method private bar called' . PHP_EOL);
		return;
	}

}

$instance = new Exemple();

print('$instance->foo: ' . $instance->foo . PHP_EOL);
$instance->foo = 100;
print('$instance->foo: ' . $instance->foo . PHP_EOL);

$instance->bar();

?>
