<?PHP

if (!isset($_POST['task']))
{
	echo "va chier!";
	return;
}

if (($fd = fopen("list.csv", "r+")) === FALSE)
{
	echo "ERROR: csv file can't be openned";
	return;
}

if (($fd_tmp = fopen("tmp.csv", "a+")) === FALSE)
{
	echo "ERROR: csv file can't be openned";
	return;
}

$control = 0;
while (($data = fgetcsv($fd, 2000, ";")) !== FALSE)
{
	print_r($data);
	if ($data[1] != $_POST['task'] || $control == 1)
		fputcsv($fd_tmp, $data, ";");
	else
		$control = 1;
}

fclose($fd);
rename("tmp.csv", "list.csv");
fclose($fd_tmp);

?>
