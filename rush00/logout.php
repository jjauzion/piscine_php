<?PHP

session_start();
if (isset($_SESSION['id']))
{
	$_SESSION = array();
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<p>Bye !</p>
	<meta http-equiv="refresh" content="1;URL=accueil.php" />
</html>
<?PHP
	exit;
}
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="0;URL=accueil.php" />
</html>
