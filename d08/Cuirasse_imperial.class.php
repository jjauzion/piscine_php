<?PHP

class Cuirasse_imperial extends Starship {

	public static $verbose = FALSE;

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."/Cuirasse_imperial.class.txt");
		return;
	}

	function __toString () {
		return;
	}

	function __construct () {
		$ship['name'] = "cuirasse_imperial";
		$ship['image'] = "resources/cuirasse_imperial.png";
		$ship['size'] = array ('x' => 2, 'y' => 7);
		$ship['hull'] = 8;
		$ship['power'] = 12;
		$ship['speed'] = 10;
		$ship['agility'] = 5;
		$ship['shield'] = 2;
		$ship['weapons'] = th;
		return;
	}

	function __destruct () {
		return;
	}

}

?>

