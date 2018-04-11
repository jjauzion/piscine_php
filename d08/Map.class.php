<?PHP

require_once "TLibft.class.php";
require_once "TLibft.class.php";

class Map {

	use TLibft;

	private $_map = array();
	private $_size_x;
	private $_size_y;

	public static $verbose = FALSE;

	public static function doc () {
		return file_get_contents(dirname(__FILE__)."/Fleet.class.txt");
	}

	function __toString () {
		$str = "";
		for ($x = -1; $x < $this->_size_x; $x++) {
			for ($y = -1; $y < $this->_size_y; $y++) {
				if ($x == -1)
					$str = sprintf("%s%3s", $str, $y);
				else if ($y == -1)
					$str = sprintf("%s%3s", $str, $x);
				else
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
		for ($i = 0; $i < count($obj->getBox()['x']); $i++) {
			$cx = $obj->getBox()['x'][$i] + $obj->getCenter_position()['x'];
			$cy = $obj->getBox()['y'][$i] + $obj->getCenter_position()['y'];
			$this->_map[$cx][$cy] = 0;
		}
		for ($i = 0; $i < count($obj->getBox()['x']); $i++) {
			$new_box['x'][] = $rot[0][0] * $obj->getBox()['x'][$i] +
				$rot[0][1] * $obj->getBox()['y'][$i];
			$new_box['y'][] = $rot[1][0] * $obj->getBox()['x'][$i] +
				$rot[1][1] * $obj->getBox()['y'][$i];
		}
		for ($i = 0; $i < count($new_box['x']); $i++) {
			$cx = $new_box['x'][$i] + $obj->getCenter_position()['x'];
			$cy = $new_box['y'][$i] + $obj->getCenter_position()['y'];
			if ($this->_map[$cx][$cy] !== $obj->getId() &&
				$this->_map[$cx][$cy] !== 0) {
				echo "CRAAAAAAAAASSSHHH !!\n";
				return (1);
			}
			$this->_map[$cx][$cy] = $obj->getId();
		}
		$obj->setBox($new_box);
		$cx = $rot[0][0] * $obj->getDirection()['x'] +
			$rot[0][1] * $obj->getDirection()['y'];
		$cy = $rot[1][0] * $obj->getDirection()['x'] +
			$rot[1][1] * $obj->getDirection()['y'];
		$obj->setDirection($cx, $cy);
		return (0);
	}
 
	public function translate($obj, $dest) {
		if (!is_a($obj, "Starship") || !$this->array_keys_exists(['x', 'y'], $dest)) {
			echo "Error : input data not conform, impossible to translate an object with that...\n";
			return (1);
		}
		for ($i = 0; $i < count($obj->getBox()['x']); $i++) {
			$cx = $obj->getBox()['x'][$i] + $obj->getCenter_position()['x'];
			$cy = $obj->getBox()['y'][$i] + $obj->getCenter_position()['y'];
			if ($this->_map[$cx][$cy] === $obj->getId())
				$this->_map[$cx][$cy] = 0;
			else if ($this->_map[$cx][$cy] === "$")
				$this->_map[$cx][$cy] = $obj->getId();
			$cx = $obj->getBox()['x'][$i] + $dest['x'];
			$cy = $obj->getBox()['y'][$i] + $dest['y'];
			if ($this->_map[$cx][$cy] === 0 || $this->_map[$cx][$cy] === $obj->getId()) {
				if ($this->_map[$cx][$cy] === $obj->getId())
					$this->_map[$cx][$cy] = "$";
				else
					$this->_map[$cx][$cy] = $obj->getId();
			}
			else {
				$obj->setCenter_position($cx, $cy);
				echo "CRAAASHHHHHHHHHHHHH !!!\n";
				return (1);
			}
	 	}
		$obj->setCenter_position($dest['x'], $dest['y']);
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
		if (!is_a($obj, "Starship")) 
		{
			echo "(Object must be of class Starship to be added to the map)\n";
			return;
		}
		for ($x = 0; $x < count($obj->getBox()['x']); $x++) {
			for ($y = 0; $y <  count($obj->getBox()['y']); $y++) {
				$cx = $obj->getBox()['x'][$x] + $obj->getCenter_position()['x'];
				$cy = $obj->getBox()['y'][$y] + $obj->getCenter_position()['y'];
				$this->_map[$cx][$cy] = $obj->getId();
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
