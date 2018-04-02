<?PHP

include_once "fct_table.php";
include_once "dream_fct.php";

session_start();
$cmd_path = "private/commands";
date_default_timezone_set('Europe/Paris');

if (!isset($_POST['buy_cart']) || $_POST['buy_cart'] != 'buy')
{
	echo "BUY CART ERROR\n";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

if (!isset($_SESSION['id']))
{
	echo "Vous devez etre log pour effectuer un achat\n";
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="2;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
	<?PHP
	exit;
}

if (!isset($_SESSION['cart']) || $_SESSION['cart']['nb_item'] == 0)
{
	echo "Panier vide!";
?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
<?PHP
	exit;
}

if (!file_exists("private"))
	mkdir("private");
if (file_exists($cmd_path))
	$cmd_table = read_table($cmd_path);
$command['login'] = $_SESSION['login'];
$command['total_price'] = $_SESSION['cart']['total_price'];
$command['date'] = date("d/M/Y");
$command['item_list'] = $_SESSION['cart']['item_list'];
$command['item_list']['name'] = get_dream_name($_SESSION['cart']['item_list']);
$command['item_list']['price'] = get_dream_price($_SESSION['cart']['item_list']);
$cmd_table[] = $command;
file_put_contents($cmd_path, serialize($cmd_table));
echo "Commande validée !<br />";
unset($_SESSION['cart_name']);
unset($_SESSION['cart_id']);
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="1;URL=<?php echo $_SESSION['url'] ?>" />
</html>
