#!/usr/bin/php
<?PHP

class Exemple {

	const CST1 = 1;
	const CST2 = 1;

	function __construct(array $kwargs) {
		print('construct called' . PHP_EOL);
		if ($kwargs['arg'] == self::CST1)
			echo "arg is CST1\n";
		else if ($kwargs['arg'] == self::CST2)
			echo "arg is CST2\n";
		else
			echo "arg is not constant\n";
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

$instance = new Exemple(array('arg' => 1));

$instance = new Exemple(array('arg' => Exemple::CST1));
$instance = new Exemple(array('arg' => Exemple::CST2));
$instance = new Exemple(array('arg' => 42));

?>
