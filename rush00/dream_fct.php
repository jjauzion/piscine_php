<?PHP

session_start();
include_once "fct_table.php";

function get_dream($id)
{
	$dream_path = "private/dreams";

	if (($table = read_table($dream_path)) === null)
		return (null);
	if (isset($table[$id]))
		return ($table[$id]);
	else
		return (null);
}

function dream_exist($name, $table)
{
	foreach ($table as $index => $dream)
	{
		if ($name == $dream['name'])
			return ($index);
	}
	return (-1);
}

function get_dream_price($id_list)
{
	$dream_path = "private/dreams";

	if (($table = read_table($dream_path)) === null)
		return (null);
	$i = -1;
	$ret = null;
	foreach($id_list as $i)
	{
		$ret[] = $table[$i]['price'];
	}
	return ($ret);
}

function get_dream_name($id_list)
{
	$dream_path = "private/dreams";

	if (($table = read_table($dream_path)) === null)
		return (null);
	$i = -1;
	$ret = null;
	foreach($id_list as $i)
	{
		$ret[] = $table[$i]['name'];
	}
	return ($ret);
}

?>
