<?PHP

include "fct_table.php";
include "dream_fct.php";

if ($_SESSION['admin'] != 1)
{
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=accueil.php" />
</html>
<?PHP
		exit;
}

$error = 0;
if (!isset($_POST['submit']) || $_POST['submit'] != "delete")
{
	$error = 1;
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=manage_dream.php" />
</html>
<?PHP
	exit;
}

if (empty($_POST['name']))
{
	echo "Enter a name\n";
	$error = 1;
	unset($_POST['submit']);
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=manage_dream.php" />
</html>
<?PHP
	exit;
}
$dream_path = "private/dreams";
$dream = read_table($dream_path);
if ($error == 1 || $dream === null || (($id = dream_exist($_POST['name'], $dream)) < 0))
{
	echo "Dream not found";
	$error = 1;
	unset($_POST['submit']);
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=manage_dream.php" />
</html>
<?PHP
	exit;
}

if ($error != 1)
{
	unset($dream[$id]);
	file_put_contents($dream_path, serialize($dream));
	echo "Dream deleted<br />";
	unset($_POST['submit']);
}
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=manage_dream.php" />
</html>
