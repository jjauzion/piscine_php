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

session_start();
if (ft_isset($_GET, 'login') && ft_isset($_GET, 'submit') && $_GET['submit'] == "OK")
	$_SESSION['login'] = $_GET['login'];
else if (!ft_isset($_SESSION, 'login'))
	$_SESSION['login'] = "";
if (ft_isset($_GET, 'passwd') && ft_isset($_GET, 'submit') && $_GET['submit'] == "OK")
	$_SESSION['passwd'] = $_GET['passwd'];
else if (!ft_isset($_SESSION, 'passwd'))
	$_SESSION['passwd'] = "";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>INDEX</title>
	</head>
	<body>
		<form method="get" action="index.php">
			<label>Login<label/> : <input type="text" name="login" value="<?php echo $_SESSION['login'] ?>" /> <br />
			<label>Password<label/> : <input type="password" name="passwd" value="<?php echo $_SESSION['passwd'] ?>" /> <br />
			<input type="submit" name="submit" value="OK" />
		</form>
	</body>
</html>
