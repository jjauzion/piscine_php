#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$tab = preg_split("/ /", $str, -1, PREG_SPLIT_NO_EMPTY);
	return ($tab);
}

function get_type($arg)
{
	if (ctype_alpha($arg))
		return 1;
	else if (is_numeric($arg) === TRUE)
		return 2;
	else
		return 3;
}

function my_sort($str1, $str2)
{
	$str1 = strtolower($str1);
	$str2 = strtolower($str2);
	$len = strlen($str1);
	$i = -1;
	while (++$i < $len)
	{
		$type1 = get_type($str1[$i]);
		$type2 = get_type($str2[$i]);
		if ($type1 != $type2)
			return ($type1 > $type2) ? 1 : -1;
		if ($str1[$i] != $str2[$i])
			return ($str1[$i] > $str2[$i]) ? 1 : -1;
	}
	return (0);
}

if ($argc <= 1)
	exit;
$tab = array();
$i = 0;
while (++$i < $argc)
{
	$tab = array_merge($tab, ft_split($argv[$i]));
}

usort($tab, "my_sort");
foreach($tab as $elm)
	echo "$elm\n";

?>
