<?PHP

require_once "Lannister.class.php";

class Jaime extends Lannister{

	public function sleepwith($mate) {
		if (is_a($mate, "Cersei"))
			echo "With pleasure, but only in a tower in Winterfell, then.\n";
		else
			parent::sleepwith($mate);
	}

}

?>
