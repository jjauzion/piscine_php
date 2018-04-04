<?PHP

require_once "test.php";

class Tyrion extends Lannister {

	function __construct () {
		parent::__construct();
		echo "My name is Tyrion\n";
		return;
	}

	public function getSize() {
		return "Short";
	}

}

?>
