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
sort($tab);
foreach($tab as $elm)
{
	echo "$elm\n";
}

?>
