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
		$this->_ship[]['ship'] = $ship;
		$this->_ship[]['active'] = 0;
		$this->_ship[]['direction'] = array ( 'x' => 0, 'y' => 0);
		$this->_ship[]['inertia'] = 0;
		$this->_ship[]['PP'] = $ship->getPower();
		$this->_ship[]['center_position'] = array (
			'x' => floor($ship->getSizei()['x'] / 2),
			'y' => floor($ship->getSize()['y'] / 2));
		for ($x = 0; $x < $ship->getSize()['x']; $x++)
		{
			for ($y = 0; $y < $ship->getSize()['y']; $y++)
			{
				if ($x == 0 || $x + 1 == $ship->getSize()['x'])
				{
					$this->_ship[]['box']['x'][] = $x;
					$this->_ship[]['box']['y'][] = $y;
				}
				else if ($y == 0 || $y + 1 == $ship->getSize()['y'])
				{
					$this->_ship[]['box']['x'][] = $x;
					$this->_ship[]['box']['y'][] = $y;
				}
			}
		}
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
