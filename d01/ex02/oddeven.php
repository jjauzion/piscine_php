#!/usr/bin/php
<?PHP

while ($ret = !feof(STDIN))
{
	echo "Entrez un nombre: ";
	$line = trim(fgets(STDIN));
	if (is_numeric($line))
	{
		$nb = abs(substr($line, -1)) % 2;
		if ($nb == 0)
			echo "Le chiffre $line est Pair\n";
		else
			echo "Le chiffre $line est Impair\n";
	}
	else if (!feof(STDIN))
		echo "'$line' n'est pas un chiffre\n";
}
echo "\n";

?>
