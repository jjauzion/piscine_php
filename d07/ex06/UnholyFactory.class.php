<?PHP

class UnholyFactory {

	private $fighter_type = array ();

	public function absorb($fighter) {
		if (is_a($fighter, "Fighter"))
		{
			if (!array_key_exists($fighter->getType(), $this->fighter_type))
			{
				$this->fighter_type[$fighter->getType()] = $fighter;
				echo "(Factory absorbed a fighter of type ".$fighter->getType().")\n";
			}
			else
				echo "(Factory already absorbed a fighter of type ".$fighter->getType().")\n";
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)\n";
	}

	public function fabricate ($fighter) {
		if (array_key_exists($fighter, $this->fighter_type))
		{
			echo "(Factory fabricates a fighter of type ".$fighter.")\n";
			return (clone $this->fighter_type[$fighter]);
		}
		else
		{
			echo "(Factory hasn't absorbed any fighter of type ".$fighter.")\n";
			return;
		}
	}
}

?>
