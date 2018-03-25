<?PHP

function ft_split($str)
{
	$tab = preg_split("/ /", $str, -1, PREG_SPLIT_NO_EMPTY);
	sort($tab);
	return ($tab);
}

?>
