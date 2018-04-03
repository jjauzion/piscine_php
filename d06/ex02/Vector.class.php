<?PHP

require_once dirname(__FILE__)."/Color.class.php";
require_once dirname(__FILE__)."/Vertex.class.php";

class Vector {

	public static $verbose = FALSE;
	private $_x;
	private $_y;
	private $_z;
	private $_w;

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }

	private function init_vector(Vertex $orig, Vertex $dest) {
		$this->_x = $dest->getX() - $orig->getX();
		$this->_y = $dest->getY() - $orig->getY();
		$this->_z = $dest->getZ() - $orig->getZ();
		$this->_w = 0;
	}

	public function magnitude() {
		return ( sqrt(
			pow($this->getX(), 2) +
			pow($this->getY(), 2) +
			pow($this->getZ(), 2)));
	}

	public function normalize() {
		$magnitude = $this->magnitude();
		if ($magnitude == 0)
			$nVertex = new Vertex( array(
				'x' => 0,
				'y' => 0,
				'z' => 0));
		else
			$nVertex = new Vertex( array(
				'x' => $this->getX() / $magnitude,
				'y' => $this->getY() / $magnitude,
				'z' => $this->getZ() / $magnitude));
		$nVect = new Vector ( array ( 'dest' => $nVertex ));
		return $nVect;
	}

	public function add(Vector $v2) {
		$sumVert = new Vertex( array(
			'x' => $this->getX() + $v2->getX(),
			'y' => $this->getY() + $v2->getY(),
			'z' => $this->getZ() + $v2->getZ()));
		$sumVect = new Vector (array('dest' => $sumVert));
		return $sumVect;
	}

	public function sub(Vector $v2) {
		$sumVert = new Vertex( array(
			'x' => $this->getX() - $v2->getX(),
			'y' => $this->getY() - $v2->getY(),
			'z' => $this->getZ() - $v2->getZ()));
		$sumVect = new Vector (array('dest' => $sumVert));
		return $sumVect;
	}

	public function opposite() {
		$sumVert = new Vertex( array(
			'x' => $this->getX() * -1,
			'y' => $this->getY() * -1,
			'z' => $this->getZ() * -1));
		$sumVect = new Vector (array('dest' => $sumVert));
		return $sumVect;
	}

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."/Vector.class.txt");
		return;
	}

	function __toString () {
		return sprintf ("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f )",
			$this->getX(),
			$this->getY(),
			$this->getZ(),
			$this->getW());
	}

	function __construct (array $kwargs) {
		if (!array_key_exists('dest', $kwargs))
		{
			echo "'dest' key missing\n";
			return;
		}
		if (!array_key_exists('orig', $kwargs))
			$kwargs['orig'] = new Vertex( array(
				'x' => 0,
				'y' => 0,
				'z' => 0,
				'w' => 1));
		$this->init_vector($kwargs['orig'], $kwargs['dest']);
		if (Vector::$verbose === TRUE)
			echo sprintf ("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f ) constructed\n",
				$this->getX(),
				$this->getY(),
				$this->getZ(),
				$this->getW());
		return;
	}

	function __destruct () {
		if (Vector::$verbose === TRUE)
			echo sprintf ("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f ) destructed\n",
				$this->getX(),
				$this->getY(),
				$this->getZ(),
				$this->getW());
		return;
	}

}

?>

