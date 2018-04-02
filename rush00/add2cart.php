<?PHP

include_once "fct_table.php";
include_once "dream_fct.php";

session_start();

$error = 0;
if (!isset($_POST['item_id']) || !is_numeric($_POST['item_id']))
	$error = 1;

$dream = get_dream($_POST['item_id']);

if ((isset($error) && $error == 1) || $dream === null)
{
	echo "ERROR\n";
	$error = 0;
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="0;URL=<?php echo $_SESSION['url'] ?>" />
	</html>
	<?PHP
	exit;
}

if (isset($_SESSION['cart']))
{
	$cart = $_SESSION['cart'];
	$cart['total_price'] += $dream['price'];
	$cart['nb_item']++;
	$cart['item_list'][] = $_POST['item_id'];
}
else
{
	$cart['total_price'] = $dream['price'];
	$cart['nb_item'] = 1;
	$cart['item_list'][0] = $_POST['item_id'];
}
$_SESSION['cart'] = $cart;
echo "Ajouter au panier :)<br />";
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="refresh" content="0;URL=<?php echo $_SESSION['url'] ?>" />
</html>
<?PHP
