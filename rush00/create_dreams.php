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
if (!isset($_POST['submit']) || $_POST['submit'] != "create")
	$error = 1;

if (!isset($_POST['name']))
	$error = 1;

if (!isset($_POST['price']) || !is_numeric($_POST['price']))
	$error = 1;

if (!isset($_POST['stock']) || !is_numeric($_POST['stock']))
	$error = 1;

if (!isset($_POST['soldnb']) || !is_numeric($_POST['stock']))
	$error = 1;

if (!isset($_POST['categories']))
	$error = 1;

$def_picture = "resources/defaut_dream_pic.jpeg";
if (!isset($_POST['pic_path']) || $_POST['pic_path'] == "")
	$_POST['pic_path'] = $def_picture;

if (!file_exists($_POST['pic_path']))
	$error = 1;

if (isset($error) && $error == 1)
{
	echo "ERROR\n";
	$error = 0;
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=manage_dream.php" />
</html>
<?PHP
	exit;
}

if (!file_exists("private"))
	mkdir("private");

$file_path = "private/dreams";
if (file_exists($file_path))
{
	$table = read_table($file_path);
	if (($id = dream_exist($_POST['name'], $table)) >= 0)
	{
		echo "ERROR: dream name already exist<br />";
		?>
		<!DOCTYPE html>
		<html>
			<meta http-equiv="refresh" content="1;URL=manage_dream.php" />
		</html>
		<?PHP
		exit;
	}
}

$dream['name'] = $_POST['name'];
$dream['picture_path'] = $_POST['pic_path'];
$dream['price'] = $_POST['price'];
$dream['stock'] = $_POST['stock'];
$dream['soldnb'] = $_POST['soldnb'];
$dream['descriptif'] = $_POST['descriptif'];
$dream['categories'] = $_POST['categories'];
$table[] = $dream;
file_put_contents($file_path, serialize($table));
echo "Dream created<br />";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=admin_page.php" />
</html>
<?PHP
