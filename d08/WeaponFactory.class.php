<?PHP

class WeaponFactory extends Factory {

	public function absorb_pattern($weapon) {
		if (is_a($weapon, "Weapon"))
		{
			if (!array_key_exists($weapon->getName(), $this->_item_type))
			{
				$this->_item_type[$weapon->getName()] = $weapon;
				echo "(Factory absorbed a Weapon of type ".$weapon->getName().")\n";
			}
			else
				echo "(Factory already absorbed a Weapon of type ".$weapon->getName().")\n";
		}
		else
			echo "(Factory can't absorb this, it's not a Weapon)\n";
	}
}

?>
