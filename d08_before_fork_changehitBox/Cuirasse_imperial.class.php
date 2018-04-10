<?PHP

require_once "Starship.class.php";

class Cuirasse_imperial extends Starship {

	public static $verbose = FALSE;

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."/Cuirasse_imperial.class.txt");
		return;
	}

	function __toString () {
		return;
	}

	function __construct (array $kwargs) {
		$ship['name'] = "Cuirasse_imperial";
		$ship['image'] = "resources/cuirasse_imperial.png";
		$ship['size'] = array ('x' => 2, 'y' => 7);
		$ship['hull'] = 8;
		$ship['power'] = 12;
		$ship['speed'] = 10;
		$ship['agility'] = 5;
		$ship['shield'] = 2;
		foreach ($kwargs as $weapon)
		{
			if (!is_a($weapon, "Lance_navale") || count($kwargs) != 2) {
				echo "Error : Cuirassé imperial requires 2 Lance navale\n";
				return;
			}
			$ship['weapons'][] = $weapon;
		}
		parent::__construct($ship);
		$this->setDirection(0, 1);
		return;
	}

	function __destruct () {
		return;
	}

}

?>
