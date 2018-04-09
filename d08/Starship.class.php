<?PHP

require_once "TLibft.class.php";

abstract class Starship {

	use TLibft;

	private	$_name;
	private	$_image;
	private	$_size = array ('x' => 0, 'y' => 0);
	private	$_hull;
	private	$_power;
	private	$_speed;
	private	$_agility;
	private	$_shield;
	private	$_weapons;
	private	$_box;
	private	$_active;
	private	$_center_position;
	private	$_inertia;

	public static $verbose = FALSE;

	public static function doc () {
		return file_get_contents(dirname(__FILE__)."/starship.class.txt");
	}

	function __toString () {
		return;
	}

	private function initialize_hit_box() {
		for ($x = 0; $x < $this->getSize()['x']; $x++)
		{
			for ($y = 0; $y < $this->getSize()['y']; $y++)
			{
				$this->_box['x'][] = $x - $this->getCenter_position()['x'];
				$this->_box['y'][] = $y - $this->getCenter_position()['y'];
			}
		}
	}

	private function initialize_ship($kwargs) {
		$this->_name = $kwargs['name'];
		$this->_image = $kwargs['image'];
		$this->_size = $kwargs['size'];
		$this->_hull = $kwargs['hull'];
		$this->_power = $kwargs['power'];
		$this->_speed = $kwargs['speed'];
		$this->_agility = $kwargs['agility'];
		$this->_shield = $kwargs['shield'];
		$this->_weapons = $kwargs['weapons'];
		$this->_active = 0;
		$this->_center_position['x'] = ceil($this->_size['x'] / 2);
		$this->_center_position['y'] = ceil($this->_size['y'] / 2);
		$this->_inertia = 0;
		$this->initialize_hit_box();
	}

	public function getName() { return $this->_name; }
	public function getImage() { return $this->_image; }
	public function getSize() { return $this->_size; }
	public function getHull() { return $this->_hull; }
	public function getPower() { return $this->_power; }
	public function getSpeed() { return $this->_speed; }
	public function getAgility() { return $this->_agility; }
	public function getShield() { return $this->_shield; }
	public function getWeapons() { return $this->_weapons; }
	public function getActive() { return $this->_active; }
	public function getCenter_position() { return $this->_center_position; }
	public function getInertia() { return $this->_iniertia; }
	public function getBox() { return $this->_box; }

	public function setInertia($val) { $this->_maneuver = $val; }

	function __construct (array $kwargs) {
		try {
			if (!($this->array_keys_exists( 
							array('name', 'image', 'size', 'hull', 'power',
								'speed', 'agility', 'shield', 'weapons'), 
							$kwargs)))
				throw new Exception('Starship definition incomplete', 1);
			if (!array_key_exists('x', $kwargs['size']) || !array_key_exists('y', $kwargs['size'])) 
				throw new Exception('Starship size must be an array with \'x\' and \'y\' keys', 2);
		}
		catch (Exception $exc) {
			echo "Error ".$exc->getCode()." in ".$exc->getFile()." on line ".$exc->getLine()."\n";
			echo $exc->getMessage()."\n";
			echo $exc."\n";
		}
		$this->initialize_ship($kwargs);

		return;
	}

	function __destruct () {
		return;
	}

	function __clone() {
	}

}

?>
