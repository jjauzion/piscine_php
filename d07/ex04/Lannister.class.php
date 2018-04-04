<?PHP

class Lannister {

	public function sleepwith($mate) {
		if (is_a($mate, "Stark"))
			echo "Let's do this.\n";
		else if (is_a($mate, "Lannister"))
			echo "Not even if I'm drunk !\n";
	}

}

?>
