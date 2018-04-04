<?PHP

abstract class Fighter {

	private $_type;

	public function getType() { return $this->_type; }

	function __construct ($type) {
		$this->_type = $type;
		return;
	}

	function __destruct () {
		return;
	}

	function __clone() {
	}

	abstract public function fight($target);

}

?>
