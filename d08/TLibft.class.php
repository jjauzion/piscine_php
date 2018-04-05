<?PHP

trait TLibft {

	public static $verbose = FALSE;

	public static function doc () {
		echo file_get_contents(dirname(__FILE__)."TLibft.class.txt");
		return;
	}

	function array_keys_exists(array $keys, array $arr) {
		$test = array_diff_key(array_flip($keys), $arr);
		if (empty($test))
			return (1);
		else
			return (0);
	}

}

?>
