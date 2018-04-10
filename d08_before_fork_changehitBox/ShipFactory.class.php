<?PHP

class ShipFactory extends Factory {

	public function absorb_pattern($ship) {
		if (is_a($ship, "Starship"))
		{
			if (!array_key_exists($ship->getName(), $this->_item_type))
			{
				$this->_item_type[$ship->getName()] = $ship;
				echo "(Factory absorbed a Starship of type ".$ship->getName().")\n";
			}
			else
				echo "(Factory already absorbed a Starship of type ".$ship->getName().")\n";
		}
		else
			echo "(Factory can't absorb this, it's not a Starship)\n";
	}
}

?>
