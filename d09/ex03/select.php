<?PHP

if (($fd = fopen("list.csv", "a+")) === FALSE)
{
	echo "ERROR: csv file can't be openned";
	return;
}

while (($data = fgetcsv($fd, 2000, ";")) !== FALSE)
{
	echo "<div class='item'>".$data[1]."</div>";
}

fclose($fd);

?>
