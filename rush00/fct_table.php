<?PHP
function read_table($file_path)
{
	if (!file_exists($file_path))
	{
		echo "ERROR\n";
		exit;
	}

	$file_data = file_get_contents($file_path);
	$table = unserialize($file_data);
	return ($table);
}
?>
