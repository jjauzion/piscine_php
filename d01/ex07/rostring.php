#!/usr/bin/php
<?PHP

if ($argc < 2)
{
	exit;
}
$tab = preg_split("/ /", $argv[1], -1, PREG_SPLIT_NO_EMPTY);
if (count($tab) < 1)
	exit;
if (count($tab) == 1)
{
	echo "$tab[0]\n";
	exit;
}
$output = $tab[1];
foreach ($tab as $key => $elem)
{
	if ($key < 2) continue;
	$output = $output." ".$elem;
}
$output = $output." ".$tab[0];
echo "$output\n";

?>
