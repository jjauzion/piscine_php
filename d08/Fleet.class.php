<?PHP

require_once "TLibft.class.php";

class Fleet {

	use TLibft;

	private $_ship = array();
	private $_name;
	private $_ship_nb;

	public function getName() { return $this->_name; }
	public function getShip_nb() { return $this->_ship_nb; }
	public function getShip_list() { return $this->_ship; }
	public function getShip($id) { return $this->_ship[$id]; }

	public static $verbose = FALSE;

	public static function doc () {
		return file_get_contents(dirname(__FILE__)."/Fleet.class.txt");
	}

	function __toString () {
		return;
	}

	public function add_ship($ship) {
		if (!is_a($ship, 'Starship')) {
			echo ("Commander, a fleet can only contain startship...");
			return;
		}
		$ship->setId($this->getShip_nb() + 1);
		$this->_ship[$ship->getId()] = $ship;
		$this->_ship_nb++;
		if (Fleet::$verbose === TRUE)
			echo "(".$ship->getName()." has been added to ".$this->getName()." with id ".$ship->getId().")\n";
	}

	function __construct ($name) {
		$this->_name = $name;
		$this->_ship_nb = 0;
		if (Fleet::$verbose === TRUE)
			echo "(Fleet ".$this->getName()." created)\n";
		return;
	}

	function __destruct () {
		return;
	}
}

?>
