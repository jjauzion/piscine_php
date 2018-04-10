<?PHP

require_once "TLibft.class.php";
require_once "TLibft.class.php";

class Map {

	use TLibft;

	private $_map = array();
	private $_size_x;
	private $_size_y;
	private $_object = array();

	public static $verbose = FALSE;

	public static function doc () {
		return file_get_contents(dirname(__FILE__)."/Fleet.class.txt");
	}

	function __toString () {
		$str = "";
		for ($x = 0; $x < $this->_size_x; $x++) {
			for ($y = 0; $y < $this->_size_y; $y++) {
				$str = sprintf("%s%3s", $str, $this->_map[$x][$y]);
			}
			$str = $str."\n";
		}
		return ($str);
	}

	public function rotate($obj, $rot) {
		if (!is_a($obj, "Starship")) {
			echo "Error : input data not conform, impossible to rotate an object with that...\n";
			return (1);
		}
	}
 
	public function translate($obj, $dest) {
		if (!is_a($obj, "Starship") || !$this->array_keys_exists(['x', 'y'], $dest)) {
			echo "Error : input data not conform, impossible to translate an object with that...\n";
			return (1);
		}
		for ($x = 0; $x < count($obj->getBox()); $x++) {
			for ($y = 0; $y <  count($obj->getBox()[$x]); $y++) {
				$cx = $x + $obj->getAnchor()['x'] + $obj->getCenter_position()['x'];
				$cy = $y + $obj->getAnchor()['y'] + $obj->getCenter_position()['y'];
				if ($this->_map[$cx][$cy] == 0 || $this->_map[$cx][$cy] == $obj->getId())
					$this->_map[$cx][$cy] = 0;
				$cx = $x + $obj->getAnchor()['x'] + $dest['x'];
				$cy = $y + $obj->getAnchor()['y'] + $dest['y'];
				if ($this->_map[$cx][$cy] == 0 || $this->_map[$cx][$cy] == $obj->getId()) {
					$this->_map[$cx][$cy] = $obj->getId();
					$obj->getCenter_position['x'] = $dest['x'];
					$obj->getCenter_position['y'] = $dest['y'];
				}
				else {
					echo "CRAAASHHHHHHHHHHHHH !!!\n";
					return (1);
				}
			}
		}
		return (0);
	}

	public function init_map ($size_x, $size_y) {
		if (!is_int($size_x) || !is_int($size_y)) {
			echo "Error, init_map requires to int parameters\n";
			return;
		}
		for ($x = 0; $x < $size_x; $x++)
			for ($y = 0; $y < $size_y; $y++)
				$this->_map[$x][$y] = 0;
		$this->_size_x = $size_x;
		$this->_size_y = $size_y;
	}

	public function add_object($obj) {
		if (!is_a($obj, "Starship") ||
			(!$this->array_keys_exists(array('x', 'y'), $obj->getCenter_position())) || 
			(!$this->array_keys_exists(array('x', 'y'), $obj->getAnchor())))
		{
			echo "(Object can't be added to map because of wrong object definition)\n";
			return;
		}
		for ($x = 0; $x < count($obj->getBox()); $x++) {
			for ($y = 0; $y <  count($obj->getBox()[$x]); $y++) {
				$cx = $x + $obj->getAnchor()['x'] + $obj->getCenter_position()['x'];
				$cy = $y + $obj->getAnchor()['y'] + $obj->getCenter_position()['y'];
				if ($obj->getBox()[$x][$y] == 1) {
					$this->_map[$cx][$cy] = $obj->getId();
				}
			}
		}
		if (Map::$verbose === TRUE)
			echo "(Object with id '".$obj->getId()."' successfully added to map)\n";
	}

	function __construct ($size_x, $size_y) {
		$this->init_map($size_x, $size_y);
		if (Map::$verbose === TRUE)
			echo "(Map of $size_x x $size_y generated)\n";
		return;
	}

	function __destruct () {
		return;
	}
}

?>
