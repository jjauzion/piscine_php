<?PHP
	session_start();
	$_SESSION['url'] = "welcome.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Welcome</title>
	</head>
	<body>

		<?PHP
			if (isset($_SESSION['login']))
	   		{
				echo "Bonjour ".$_SESSION['login']."!<br />";
			}
		?>
		<a href="login_page.php">Log in</a><br />
		<a href="create_user.html">New User</a><br />
		<a href="admin_page.php">Admin page</a><br />
		<a href="logout.php">Log out</a><br />
		<p> Ajouter des objets au panier:</p>
		<form method="post" action="add2cart.php">
			<button name="item_id" type="submit" value="0" />Item 1</button>
			<button name="item_id" type="submit" value="1" />Item 2</button>
			<button name="item_id" type="submit" value="2" />Item 3</button>
			<button name="item_id" type="submit" value="3" />Item 4</button>
		</form>
		<p> Retirer des objets du panier:</p>
		<form method="post" action="remove_from_cart.php">
			<button name="item_id" type="submit" value="0" />Item 1</button>
			<button name="item_id" type="submit" value="1" />Item 2</button>
			<button name="item_id" type="submit" value="2" />Item 3</button>
			<button name="item_id" type="submit" value="3" />Item 4</button>
		</form>
		<p>Enregistrer votre panier:</p>
		<form method="post" action="save_cart.php">
			<button name="save_cart" type="submit" value="save" />Enregistrer panier</button><br />
			<label>Nom du nouveau panier<label/> : <input type="text" name="cart_name" />
			<button name="save_cart" type="submit" value="new" />Créer panier</button>
		</form>
<?PHP
		if (isset($_SESSION['id']))
		{
?>
		<p>Charger un panier:</p>
		<form method="post" action="load_cart.php">
			<label>Id panier<label/> : <input type="text" name="cart_id" />
			<label>Nom du panier<label/> : <input type="text" name="cart_name" />
			<input type="submit" name="submit" value="OK" />
		</form>
<?PHP
		}
?>
		<p>Votre panier:</p>
<?PHP
include "cart_fct.php";
print_cart($_SESSION['cart']);
?>
	<p>
		<form method="post" action="create_command.php">
			<label>Valider vos achats</label> : <button name="buy_cart" type="submit" value="buy" />Payer</button>
		</form>
	</p>
	</body>
</html>
