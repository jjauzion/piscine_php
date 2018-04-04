#!/usr/bin/php
<?PHP

class Exemple {

	public static $nb_instance = 0;

	public static function doc() {
		return "This a sample of doc for this class";
	}

	function __construct() {
		print('construct called' . PHP_EOL);
		self::$nb_instance++;
		return;
	}

	function __destruct() {
		print('destruct called' . PHP_EOL);
		self::$nb_instance--;
		echo "destruct nb instace : ".self::$nb_instance."\n";
		return;
	}
}

echo "nb instace : ".Exemple::$nb_instance."\n";
$instance = new Exemple;
echo "nb instace : ".Exemple::$nb_instance."\n";
$instance = new Exemple;
echo "nb instace : ".Exemple::$nb_instance."\n";
$instance1 = new Exemple;
echo "nb instace : ".Exemple::$nb_instance."\n";

?>
