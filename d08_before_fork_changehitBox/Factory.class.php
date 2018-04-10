<?PHP

abstract class Factory {

	protected $_item_type = array ();

	abstract public function absorb_pattern($item);

	public function create ($item) {
		if (array_key_exists($item, $this->_item_type))
		{
			echo "(Factory fabricates an item of type ".$item.")\n";
			return (clone $this->_item_type[$item]);
		}
		else
		{
			echo "(Factory has no pattern for item of type ".$item.")\n";
			return;
		}
	}
}

?>
