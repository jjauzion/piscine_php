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

if (!ft_isset($_POST, 'oldpw') || $_POST['oldpw'] == "")
{
	echo "ERROR\n";
	exit;
}

if (!ft_isset($_POST, 'newpw') || $_POST['newpw'] == "")
{
	echo "ERROR\n";
	exit;
}

$file_path = "../private/passwd";
if (!file_exists($file_path))
	echo "ERROR\n";

$file_data = file_get_contents($file_path);
$table = unserialize($file_data);
foreach ($table as $index => $user)
{
	if ($_POST['login'] == $user['login'])
	{
		$newpass = hash('whirlpool', $_POST['oldpw']);
		if ($newpass == $user['passwd'])
		{
			$user['passwd'] = hash('whirlpool', $_POST['newpw']);
			$table[$index] = $user;
			file_put_contents($file_path, serialize($table));
			echo "OK\n";
			exit;
		}
	}
}
echo "ERROR\n";

?>
