#!/usr/bin/php
<?PHP

$i = 0;
while (++$i < $argc)
{
	if ($argv[$i] == "mais pourquoi cette demo ?")
	{
		echo "Tout simplement pour qu en feuilletant le sujet\n";
		echo "on ne s apercoive pas de la nature de l exo\n";
	}
	if ($argv[$i] == "mais pourquoi cette chanson ?")
		echo "Parce que Kwame a des enfants\n";
	if ($argv[$i] == "vraiment ?" && !file_exists(".tmp.txt"))
	{
		echo "Parce que Kwame a des enfants\n";
		file_put_contents(".tmp.txt", "1");
		continue;
	}
	if ($argv[$i] == "vraiment ?" && file_exists(".tmp.txt"))
	{
		echo "Nan c est parce que c est le premier avril\n";
		unlink (".tmp.txt");
	}
}

?>
