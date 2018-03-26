#!/usr/bin/php
<?PHP

if ($argc <= 2)
	exit;
foreach ($argv as $key => $elem)
{
	if ($key < 2)
		continue;
	$key_val = preg_split('/:/', $elem, -1, PREG_SPLIT_NO_EMPTY);
	if (count($key_val) != 2)
		continue;
	$tab[$key_val[0]] = $key_val[1];
}
if (!empty($tab))
	if (array_key_exists($argv[1], $tab))
		echo $tab[$argv[1]]."\n";

?>
