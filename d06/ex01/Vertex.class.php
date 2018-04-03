<?PHP

require_once dirname(__FILE__)."/Color.class.php";

class Vertex {

	public static $verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	private $_tmp;

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."/Vertex.class.txt");
		return;
	}

	function __toString () {
		if (Vertex::$verbose == TRUE)
			return sprintf ("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f, %s )",
				$this->getX(),
				$this->getY(),
				$this->getZ(),
				$this->getW(),
				$this->getColor());
		else
			return sprintf ("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f )",
				$this->getX(),
				$this->getY(),
				$this->getZ(),
				$this->getW());
	}

	function __construct (array $kwargs) {
		if (!array_key_exists('x', $kwargs) ||
			!array_key_exists('y', $kwargs) ||
			!array_key_exists('z', $kwargs))
		{
			echo "Error: x, y or z key missing\n";
			return;
		}
		if (!array_key_exists('w', $kwargs))
			$kwargs['w'] = 1;
		if (!array_key_exists('color', $kwargs))
			$kwargs['color'] = new Color(array('red'=>255, 'green'=>255, 'blue'=>255));
		$this->setX($kwargs['x']);
		$this->setY($kwargs['y']);
		$this->setZ($kwargs['z']);
		$this->setW($kwargs['w']);
		$this->setColor($kwargs['color']);
		if (Vertex::$verbose === TRUE)
			echo sprintf ("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f, %s ) constructed\n",
				$this->getX(),
				$this->getY(),
				$this->getZ(),
				$this->getW(),
				$this->getColor());
		return;
	}

	function __destruct () {
		if (Vertex::$verbose === TRUE)
			echo sprintf ("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f, %s ) destructed\n",
				$this->getX(),
				$this->getY(),
				$this->getZ(),
				$this->getW(),
				$this->getColor());
		return;
	}

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }
	public function getColor() { return $this->_color; }
	
	public function setX($v) { $this->_x = $v; }
	public function setY($v) { $this->_y = $v; }
	public function setZ($v) { $this->_z = $v; }
	public function setW($v) { $this->_w = $v; }
	public function setColor(Color $v)
	{
		$this->_color = new Color( array(
			'red' => $v->red,
			'green' => $v->green,
			'blue' => $v->blue)
		);
	}
}

?>

