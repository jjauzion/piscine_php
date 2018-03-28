#!/usr/bin/php
<?PHP

if ($argc != 2)
{
	exit;
}
$tab = preg_split("/ /", $argv[1], -1, PREG_SPLIT_NO_EMPTY);
if (count($tab) < 1)
	exit;
$output = $tab[0];
foreach ($tab as $key => $elem)
{
	if ($key < 1 || $elem == "") continue;
	$output = $output." ".$elem;
}
echo "$output\n";

?>
