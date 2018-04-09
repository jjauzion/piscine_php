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
		for ($x = 0; $x < $this->_size_x; $x++) {
			for ($y = 0; $y < $this->_size_y; $y++) {
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
		$this->_size_x = $size_x;
		$this->_size_y = $size_y;
	}

	public function add_object($hit_box, $center, $id) {
		if (!$this->array_keys_exists(array('x', 'y'), $center)) 
		{
			echo ("object can't be added to map because of wrong object hit_box or center_position definition");
			return;
		}
		echo "count x = ".count($hit_box).")\n";
		echo "count y = ".count($hit_box[1]).")\n";
		print_r($hit_box);
		for ($x = 1; $x < count($hit_box); $x++) {
			for ($y = 0; $y <  count($hit_box[$x]); $y++) {
				$cx = $x + $hit_box[0][0] + $center['x'];
				$cy = $y + $hit_box[0][1] + $center['y'];
				echo "cx = $cx ; cy = $cy";
				if ($hit_box[$x][$y] == 1) {
					echo " ; id = $id\n";
					$this->_map[$cx][$cy] = $id;
				}
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
