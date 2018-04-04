#!/usr/bin/php
<?PHP

class Exemple {

	private $_x = 0;
	private $_y = 0;

	function __tostring() {
		return 'Exemple = helo';
	}
 
	function getX() { return $this->_x; }
	function getY() { return $this->_y; }

	function setX($x) {$this->_x = $x; return; }
	function setY($y) {$this->_y = $y; return; }

	function __clone () {
		print('Clone called'. PHP_EOL);
	}

	function __invoke() {
		return $this->_x + $this->_y;
	}

	function __construct() {
		print('construct called' . PHP_EOL);
		return;
	}

	function __destruct() {
		print('destruct called' . PHP_EOL);
		return;
	}

	public function __get($att) {
		echo "attemp to access $att\n";
		return;
	}

	function __set($att, $val) {
		echo "attemp to set $att at $val\n";
		return;
	}
}

$instance = new Exemple();

$instance->setX(2);
$instance->setY(20);
print($instance().PHP_EOL);
$instance->setY(40);
print($instance().PHP_EOL);

$clone = $instance;
print($clone().PHP_EOL);
$instance->setY(400);
print('instance : '.$instance().PHP_EOL);
print('clone as changed :'.$clone().PHP_EOL);

$clone = clone $instance;
$instance->setY(40);
print('instance : '.$instance().PHP_EOL);
print('clone hasn\'t changed :'.$clone().PHP_EOL);

?>
