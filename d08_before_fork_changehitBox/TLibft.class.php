<?PHP

require_once "Map.class.php";

trait TLibft {

	public static $verbose = FALSE;

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."TLibft.class.txt");
		return;
	}

	public function move_obj($obj, $map, $dest) {
		if ($this->move_is_possible($obj, $map, $dest)) {
			if (!$map->translate($obj, $dest))
			{
				if (Map::$verbose === TRUE)
					echo "(Ship has been moved)\n";
				return (0);
			}
			else
				return (1);
		}
		else
			return (1);
	}

	public function move_is_possible($obj, $map, $dest) {
		if (!is_a($obj, "Starship") || !is_a($map, "Map") || !($this->array_keys_exists(['x', 'y'], $dest))) {
			echo "Error: Can't move object because of wrong parameters input\n";
			return (0);
		}
		$vect_x = $dest['x'] - $obj->getCenter_position()['x'];
		$vect_y = $dest['y'] - $obj->getCenter_position()['y'];
		if (($obj->getDirection()['x'] != 0 && $vect_x * $obj->getDirection()['x'] < $obj->getAgility()) ||
			($obj->getDirection()['y'] != 0 && $vect_y * $obj->getDirection()['y'] < $obj->getAgility())) {
			echo "Move not possible, distance shall be greater than ship agility\n";
			return (0);
		}
		$check_map = clone $map;
		if ($obj->getDirection()['x'] != 0) {
			for ($i = 0; $i <= abs($vect_x); $i++) {
				$trans['x'] = $obj->getCenter_position['x'];
				$trans['y'] = 0;
				if (($check_map->translate($obj->getId(), $trans)) === 1)
					return (0);
			}
		}
		else if ($obj->getDirection['y'] != 0) {
		}
		return (1);
	}

	public function array_keys_exists(array $keys, array $arr) {
		$test = array_diff_key(array_flip($keys), $arr);
		if (empty($test))
			return (1);
		else
			return (0);
	}

}

?>
