<?PHP
function read_table($file_path)
{
	if (!file_exists($file_path))
		return (null);

	$file_data = file_get_contents($file_path);
	$table = unserialize($file_data);
	return ($table);
}
function get_data($id, $path)
{
	if (($table = read_table($path)) === null)
		return (null);
	if (isset($table[$id]))
		return ($table[$id]);
	else
		return (null);
}
function get_id_list($name, $path)
{
	if (($table = read_table($path)) === null)
		return (null);
	$ret = null;
	foreach ($table as $id => $item)
	{
		if ($item['name'] == $name)
			$ret[] = $id;
	}
	return ($ret);
}
?>
