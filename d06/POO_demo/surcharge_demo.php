#!/usr/bin/php
<?PHP

class Exemple {

	public $att1 = 0;
	public $att2 = 0;
	public $att3 = 0;

	function __construct(array $kwargs) { //on force le type de parametre a recevoir a etre un array
		print('construct called' . PHP_EOL);
		if (array_key_exists('arg1', $kwargs))
			$this->att1 = $kwarg['arg1'];
		else
			$this->att1 = -1;

		$this->att2 = -1; // arg2 obligatoire !

		if (array_key_exists('arg2', $kwargs))
			$this->att3 = $kwarg['arg3'];
		else
			$this->att3 = -1;
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

$instance = new Exemple(array('arg2' => 42));
$instance = new Exemple(array('arg3' => 50, 'arg2' => 42));

?>
