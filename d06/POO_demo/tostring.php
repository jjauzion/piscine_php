#!/usr/bin/php
<?PHP

class Exemple {

	private $_att = 0;

	function __tostring() {
		return 'Exemple $_att = ' . $this->getAtt();
	}

	function getAtt() { return $this->_att; }

	function setAtt($v) {
		if ($this->_att + $v > 50)
			$this->_att = 50;
		else
			$this->_att = $v;
		return;
	}

	function __construct(array $kwargs) {
		print('construct called' . PHP_EOL);
		$this->setAtt($kwargs['arg']);
		print('this->getAtt(): '.$this->getAtt() . PHP_EOL);
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

$instance = new Exemple(array('arg' => 42));

print('$instance->foo: ' . $instance->foo . PHP_EOL);
echo "echo de $instance->foo\n";
print('$instance->_att: ' . $instance->_att . PHP_EOL);
$instance->foo = 21;
$instance->_att = 42;
echo "------------------\n";
echo $instance."\n";

?>
