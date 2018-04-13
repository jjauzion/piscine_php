<?PHP

require_once "Map.class.php";

trait TLibft {

	public static $verbose = FALSE;

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."TLibft.class.txt");
		return;
	}

	public function move_obj($obj, $map, $dest) {
		if (!is_a($obj, "Starship") || !is_a($map, "Map") || !($this->array_keys_exists(['x', 'y'], $dest))) {
			echo "Error: Can't move object because of wrong parameters input\n";
			return (0);
		}
		while (($dest['x'] != $obj->getCenter_position()['x']) ||
			($dest['y'] != $obj->getCenter_position()['y'])) {
			$vect_x = $dest['x'] - $obj->getCenter_position()['x'];
			$vect_y = $dest['y'] - $obj->getCenter_position()['y'];
			if ((abs($vect_x) < $obj->getAgility()) && (abs($vect_y) < $obj->getAgility())) {
				echo "Move not possible, distance shall be greater than ship agility\n";
				return (0);
			}
			if ($obj->getDirection()['x'] != 0) {
				$move1 = $vect_x;
				$move2 = $vect_y;
				if ($obj->getDirection()['x'] >= 0)
					$axis = [1, "x", "y"];
				else
					$axis = [-1, "x", "y"];
			}
			else if ($obj->getDirection()['y'] != 0) {
				$move1 = $vect_y;
				$move2 = $vect_x;
				if ($obj->getDirection()['y'] >= 0)
					$axis = [1, "y", "x"];
				else
					$axis = [-1, "y", "x"];
			}
			if ($this->sign($move1) === $this->sign($axis[0]) && $move1 !== 0)
				$deplacement = abs($move1);
			else
				$deplacement = $obj->getAgility();
			for ($i = 0; $i < $deplacement; $i++) {
				$trans[$axis[1]] = $obj->getCenter_position()[$axis[1]] + 1 * $axis[0];
				$trans[$axis[2]] = $obj->getCenter_position()[$axis[2]];
				if ($map->translate($obj, $trans))
					return (0);
			}
			if (($dest['x'] != $obj->getCenter_position()['x']) ||
				($dest['y'] != $obj->getCenter_position()['y'])) {
				$rot = $this->get_rot_matrix($obj->getDirection(), $move2);
				if ($map->rotate($obj, $rot))
					return (0);
			}
			if (Map::$verbose === TRUE) {
				echo "ship center:\n";
				print_r($obj->getCenter_position());
				echo "direction:\n";
				print_r($obj->getDirection());
				print($map.PHP_EOL);
				sleep(1);
			}
		}
		if (Map::$verbose === TRUE)
			echo "(object ".$obj->getName()." has reached destination)\n";
		return (1);
	}

	public function sign($nb) {
		if ($nb >= 0)
			return (1);
		else
			return (-1);
	}

	public function get_rot_matrix($current_v, $target_v) {
		if ($current_v['x'] != 0) {
			$current_v = $current_v['x'];
			if ($this->sign($current_v) == $this->sign($target_v)) {
				$rot[0] = [0, -1];
				$rot[1] = [1, 0];
			}
			else {
				$rot[0] = [0, 1];
				$rot[1] = [-1, 0];
			}
		}
		else {
			$current_v = $current_v['y'];
			if ($this->sign($current_v) != $this->sign($target_v)) {
				$rot[0] = [0, -1];
				$rot[1] = [1, 0];
			}
			else {
				$rot[0] = [0, 1];
				$rot[1] = [-1, 0];
			}
		}
		return ($rot);
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
