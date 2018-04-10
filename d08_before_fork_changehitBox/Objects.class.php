<?PHP

require_once "Starship.class.php";

class Objects extends Starship {

	public static $verbose = FALSE;

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."/Cuirasse_imperial.class.txt");
		return;
	}

	function __toString () {
		return;
	}

	function __construct () {
		$ship['id'] = "X";
		$ship['name'] = "Objects";
		$ship['image'] = "resources/cuirasse_imperial.png";
		$ship['size'] = array ('x' => 5, 'y' => 5);
		$ship['hull'] = 0;
		$ship['power'] = 0;
		$ship['speed'] = 0;
		$ship['agility'] = 0;
		$ship['shield'] = 0;
		$ship['weapons'] = null;
		parent::__construct($ship);
		return;
	}

	function __destruct () {
		return;
	}

}

?>
