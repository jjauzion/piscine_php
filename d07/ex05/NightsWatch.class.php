<?PHP

class NightsWatch {

	private $members;

	public function fight() {
		foreach ($this->members as $member)
		{
			if (method_exists($member, "fight"))
				$member->fight();
		}
	}

	public function recruit($new_member) {
		$this->members[] = $new_member;
		return;
	}

}

?>
