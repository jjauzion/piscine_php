<?PHP

abstract class weapon {

	use TLibft;

	private $_name;
	private $_ammo;
	private $_short_range;
	private $_middle_range;
	private $_far_range;
	private $_is_static;

	protected $_shooting_points = NULL;

	abstract public function coverage ($anchor, $shoot_dir);
	abstract public function aoe ($impact_coord);
	abstract public function mount (array $kwargs);

	public function getName() { return $this->_name; }
	public function getAmmo() { return $this->_ammo; }
	public function getShort_range() { return $this->_short_range; }
	public function getMiddle_range() { return $this->_middle_range; }
	public function getFar_range() { return $this->_far_range; }
	public function getShooting_points() { return $this->_shooting_points; }

	public static $verbose = FALSE;

	private function init_weapon(array $weapon) {
		$this->_name = $weapon['name'];
		$this->_ammo = $weapon['ammo'];
		$this->_short_range = $weapon['short_range'];
		$this->_middle_range = $weapon['middle_range'];
		$this->_far_range = $weapon['far_range'];
		$this->_is_static = $weapon['is_static'];
	}

	public static function doc () {
		return file_get_contents(dirname(__FILE__)."weapon.class.txt");
	}

	function __toString () {
		return;
	}

	function __construct (array $kwargs) {
		try {
			if (!$this->array_keys_exists(array('name', 'ammo', 'short_range', 'middle_range', 'far_range', 'is_static'), $kwargs))
				throw new Exception('Weapon definition incomplete', 10);
		}
		$this->init_weapon($kwargs);
		catch (Exception $exc) {
			echo "Error $exc->getCode() in $exc->getFile() on line $exc->getLine()\n";
			echo $exc->getMessage()."\n";
			echo $exc."\n";
		}
		return;
	}

	function __destruct () {
		return;
	}

	function __clone () {
	}

}

?>
