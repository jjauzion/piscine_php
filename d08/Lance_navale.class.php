<?PHP

class Lance_navale {

	use TLibft;

	public function aoe() {
		return ($impact_coord);
	}

	public function coverage () {
		if ($this->_shooting_points == NULL)
		{
			echo "weapon must be mounted before knowing the coverage area\n";
			return;
		}
		$i = 0;
		while (++$i <= $this->getFar_range)
		{
			$coverage[$i] = $this->getShooting_points() + $i;
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

	function __construct ($kwargs) {
		$weapon = array (
			'name' = "lance_navale",
			'ammo' = 0,
			'short_range' = 30,
			'middle_range' = 60,
			'far_range' = 90,
			'is_static' = 0);
		parent::__construct($weapon);
		return;
	}

	function __destruct () {
		return;
	}

}

?>

