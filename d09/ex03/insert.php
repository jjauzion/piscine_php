<?PHP

if (($fd = fopen("list.csv", "a+")) === FALSE)
{
	echo "ERROR: csv file can't be openned";
	return;
}

$task_id = 0;
while (($data = fgetcsv($fd, 2000, ";")) !== FALSE)
{
	if ($data[0] > $task_id)
		$task_id = $data[0];
}
$task_id++;

if (isset($_POST['content']))
{
	$data['id'] = $task_id;
	$data['content'] = $_POST['content'];
	fputcsv($fd, $data, ";");
	echo "job is done";
}
else
	echo "va chier!";

fclose($fd);

?>
