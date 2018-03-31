<?PHP

function ft_isset($tab, $wanted_key)
{
	foreach($tab as $key => $val)
	{
		if ($key == $wanted_key)
			return (1);
	}
	return (0);
}

if (!ft_isset($_POST, 'submit') || $_POST['submit'] != "OK")
{
	echo "ERROR\n";
	exit;
}

if (!ft_isset($_POST, 'login') || $_POST['login'] == "")
{
	echo "ERROR\n";
	exit;
}

if (!ft_isset($_POST, 'passwd') || $_POST['passwd'] == "")
{
	echo "ERROR\n";
	exit;
}

if (!file_exists("../private"))
	mkdir("../private");

$file_path = "../private/passwd";
if (file_exists($file_path))
{
	$file_data = file_get_contents($file_path);
	$table = unserialize($file_data);
	foreach ($table as $user)
	{
		if ($_POST['login'] == $user['login'])
		{
			echo "ERROR\n";
			exit;
		}
	}
}
$user_data['login'] = $_POST['login'];
$user_data['passwd'] = hash('whirlpool', $_POST['passwd']);
$table[] = $user_data;
file_put_contents($file_path, serialize($table));
echo "OK\n";

?>
