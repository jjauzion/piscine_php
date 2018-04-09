<?PHP

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
		for ($x = 0; $x < $$this->_size_x; $x++) {
			for ($y = 0; $y < $$this->_size_y; $y++) {
				$str = $str.$this->_map[$x][$y]." ";
			}
			$str = $str."\n";
		}
		return ($str);
	}

	public function init_map ($size_x, $size_y) {
		if (!is_int($size_x) || !is_int($size_y)) {
			echo "Error, init_map requires to int parameters";
			return;
		}
		for ($x = 0; $x < $size_x; $x++)
			for ($y = 0; $y < $size_y; $y++)
				$this->_map[$x][$y] = 0;
	}

	public function add_object($hit_box, $center, $id) {
		if (!array_keys_exists(array('x', 'y'), $hit_box) ||
			!array_keys_exists(array('x', 'y'), $center)) 
		{
			echo ("object can't be added to map because of wrong object hit_box or center_position definition");
			return;
		}
		for ($x = 0; $x < $count($hit_box['x']); $x++) {
			for ($y = 0; $y <  $count($hit_box['y']); $y++) {
				$cx = $hit_box['x'][$x] + $center['x'];
				$cy = $hit_box['y'][$y] + $center['y'];
				$this->map[$cx][$cy] = $id;	
			}
		}
		if (Map::$verbose === TRUE)
			echo "Object with id '$id' successfully added to map\n";
	}

	function __construct () {
		return;
	}

	function __destruct () {
		return;
	}
}

?>
