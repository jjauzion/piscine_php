#!/usr/bin/php
<?PHP

//commentaire en php

function my_add($p1, $p2)
{
	return $p1 + $p2;
}

print("Hello\n");
echo "echo\n";

$my_var = 7;
$str = "this is a string";
$tab = array("zero", "un", "deux");
$my_hash = array("key1" => "val1", "key2" => "val2");

echo $my_var."\n".$str."\n";
echo "\n$my_var\n$str\n";

$result = "42" - "21";
echo "$result\n";

$tab[0] = 0;

echo $tab[0]."\n";
echo $my_hash["key1"]."\n";

echo "$tab\n\n";

print_r($tab);

echo my_add("36", "6")."\n";

if ($tab[1] == "un")
{
	echo "OK";
	echo "\n";
}
else
	echo "KO";
echo "\n";

echo "$argc\n";
print_r($argv);

foreach ($tab as $elem)
{
	echo "$elem\n";
}

foreach ($argv as $elem)
{
	echo "$elem\n";
}

$str_tab = explode(";", "ma;chaine;de;test");

foreach ($str_tab as $elem)
{
	echo "$elem\n";
}

?>
