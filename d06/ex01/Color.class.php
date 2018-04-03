<?PHP

class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	function add (Color $color) {
		$new_color = new Color ( array(
			'red' => $this->red + $color->red,
			'green' => $this->green + $color->green,
			'blue' => $this->blue + $color->blue));
		return $new_color;
	}

	function sub (Color $color) {
		$new_color = new Color ( array(
			'red' => $this->red - $color->red,
			'green' => $this->green - $color->green,
			'blue' => $this->blue - $color->blue));
		return $new_color;
	}

	function mult ($factor) {
		$new_color = new Color ( array(
			'red' => $this->red * $factor,
			'green' => $this->green * $factor,
			'blue' => $this->blue * $factor));
		return $new_color;
	}

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."/Color.class.txt");
		return;
	}

	function __toString () {
			return sprintf ("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	private function init_color($kwargs) {
		if (!array_key_exists('rgb', $kwargs))
		{
			$this->red = (int)$kwargs['red'];
			$this->blue = (int)$kwargs['blue'];
			$this->green = (int)$kwargs['green'];
		}
		else
		{
			$this->red = (int)$kwargs['rgb'] >> 16;
			$this->green = ((int)$kwargs['rgb'] >> 8) & 0xff;
			$this->blue = (int)$kwargs['rgb'] & 0xff;
		}
	}

	function __construct (array $kwargs) {
		if (!array_key_exists('rgb', $kwargs))
		{
			if (!array_key_exists('red', $kwargs))
				$this->red = 0;
			if (!array_key_exists('green', $kwargs))
				$this->green = 0;
			if (!array_key_exists('blue', $kwargs))
				$this->blue = 0;
		}
		$this->init_color($kwargs);
		if (Color::$verbose === TRUE)
			echo sprintf ("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		return;
	}

	function __destruct () {
		if (Color::$verbose === TRUE)
			echo sprintf ("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		return;
	}
}

?>
