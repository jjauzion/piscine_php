<?PHP

require_once "Weapon.class.php";

class Lance_navale extends Weapon {

	use TLibft;

	public function aoe($impact_coord) {
		return ($impact_coord);
	}

	public function coverage ($anchor, $shoot_dir) {
		if ($this->_shooting_points == NULL)
		{
			echo "weapon must be mounted before knowing the coverage area\n";
			return;
		}
		$i = 0;
		while (++$i <= $this->getFar_range)
		{
			if ($shoot_dir['x'] != 0)
			{
				$coverage['x'][$i] = $this->getShooting_points()['x']
				+ $anchor['x'] + $i * $shoot_dir['x'];
				$coverage['y'][$i] = $this->getShooting_points()['y']
				+ $anchor['y'];
			}
			if ($shoot_dir['y'] != 0)
			{
				$coverage['y'][$i] = $this->getShooting_points()['y']
				+ $anchor['y'] + $i * $shoot_dir['y'];
				$coverage['x'][$i] = $this->getShooting_points()['x'];
				+ $anchor['x'];
			}
		}
		return ($coverage);
	}

	public function mount (array $kwargs) {
		if ($this->array_keys_exists(array('ship_center_coord', 'weapon_xy'), $kwargs) ||
			$this->array_keys_exists(array('x', 'y'), $kwargs['ship_center_coord']))
		{
			echo "Wrong input to mount weapon on ship\n";
			return;
		}
		$this->_shooting_points[0] = array(
			'x' => $kwargs['weapon_xy']['x'] - $kwargs['ship_center_coord']['x'],
			'y' => $kwargs['weapon_xy']['y'] - $kwargs['ship_center_coord']['y']);
	}

	public static $verbose = FALSE;

	public static function doc () {
		return file_get_contents(dirname(__FILE__)."/Lance_navale.class.txt");
	}

	function __toString () {
		return;
	}

	function __construct () {
		$weapon = array (
			'name' => "Lance_navale",
			'ammo' => 0,
			'short_range' => 30,
			'middle_range' => 60,
			'far_range' => 90,
			'is_static' => 0);
		parent::__construct($weapon);
		return;
	}

	function __destruct () {
		return;
	}

}

?>

