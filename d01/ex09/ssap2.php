#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$tab = preg_split("/ /", $str, -1, PREG_SPLIT_NO_EMPTY);
	return ($tab);
}

$tab = array();
$i = 0;
while (++$i < $argc)
{
	$tab = array_merge($tab, ft_split($argv[$i]));
}
print_r($tab);
$i1 = 0;
$i2 = 0;
$i3 = 0;
foreach($tab as $elm)
{
	if (ctype_alpha($elm))
		$alpha[$i1++] = $elm;
	else if (is_numeric($elm))
		$num[$i2++] = $elm;
	else
		$else[$i3++] = $elm;
}
natcasesort($alpha);
foreach($alpha as $elm)
	echo "$elm\n";
sort($num, SORT_NUMERIC);
foreach($num as $elm)
	echo "$elm\n";
sort($else, SORT_STRING);
foreach($else as $elm)
	echo "$elm\n";

?>
