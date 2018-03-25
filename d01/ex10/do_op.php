#!/usr/bin/php
<?PHP

if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit;
}
$opp = trim($argv[2]);
$v1 = trim($argv[1]);
$v2 = trim($argv[3]);

if ($opp == "+")
	echo $v1 + $v2."\n";
else if ($opp == "-")
	echo $v1 - $v2."\n";
else if ($opp == "*")
	echo $v1 * $v2."\n";
else if ($opp == "/")
	echo $v1 / $v2."\n";
else if ($opp == "%")
	echo $v1 % $v2."\n";

?>
