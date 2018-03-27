#!/usr/bin/php
<?PHP

$nb = preg_match("/t[io]t[io]/", "toti");

echo "$nb\n";

$nom = "key";
$$nom = "vol";
echo "$key\n";

$tab = file("data.csv");
foreach ($tab as $elem)
{
	echo "$elem";
}

$fd = fopen("data.csv", "r");
while ($line = fgets($fd))
{
	echo "$line";
}
fclose($fd);

$fd = fopen("data.csv", "r");
while ($tab = fgetcsv($fd, 0, ";"))
{
	print_r($tab);
}
fclose($fd);

echo "--------------EVAL--------------\n";

eval("echo 'Hello World';");

echo "-------------=====---------------\n";

if (0 == "World")
	echo "OK\n";
else
	echo "KO\n";

if (0 === "World")
	echo "2:OK\n";
else
	echo "2:KO\n";

$tab = array("zero", "un");

if (array_search("zero", $tab) !== FALSE)
	echo "FOUND 1\n";

if (array_search("zero", $tab) != FALSE)
	echo "FOUND 2\n";

$c = curl_init("http://www.42.fr");
$str = curl_exec($c);

echo "$str\n";


?>
