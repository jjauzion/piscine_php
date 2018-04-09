<?PHP

require_once "TLibft.class.php";

class Fleet {

	use TLibft;

	private $_ship = array();

	public static $verbose = FALSE;

	public static function doc () {
		return file_get_contents(dirname(__FILE__)."/Fleet.class.txt");
	}

	function __toString () {
		return;
	}

	public function move_ship($ship, ) {
		if ($ship['inertia'] == 0)
	}

	private function add_ship($ship) {
		if (!is_a($ship, 'Starship')) {
			echo ("Commander, a fleet can only contain startship...");
			return;
		}
		$this->_ship[] = $ship;
	}

	function __construct (array $kwargs) {
		foreach ($kwargs as $ship) {
			if (!is_a($ship, "Starship")) {
				echo "Fleet must only be composed of Starship\n";
				return;
			}
			else
				$this->add_ship($ship);
		}
		return;
	}

	function __destruct () {
		return;
	}
}

?>
