<?php
include "fct_table.php";
include "dream_fct.php";
session_start();
$items = read_table("private/dreams");
$_SESSION['url'] = "panier.php";
?>
<!DOCTYPE html>
<head>
	<title>Buy A Dream</title>
	<link href = "menu.css" rel = "stylesheet" type = "text/css">
	<link href = "panier.css" rel = "stylesheet" type = "text/css">
</head>
<?php include('menu.html'); ?>
<body>
	<div class ="panier">
		<h1>Dans mon panier</h1>
		<?php if (array_key_exists('cart', $_SESSION))
			{
				foreach ($_SESSION['cart']['item_list'] as $key => $item) {
					$dream = get_dream($item)?>
		<div class="item">
			<h3><?php print($dream['name'])?></h3>
			<h3><?php print($dream['price']) ?>$</h3>
			<form method="post" action="remove_from_cart.php">
				<button name="item_id" type="submit" value="<?php print($item) ?>" />supprimer</button>
			</form>
		</div><?php }} ?>
		<?php if ($dream) {?>
		<div class="item">
			<h3>Pour <? print($_SESSION['cart']['nb_item']) ?> produits : </h3>
			<h3>TOTAL = <? print($_SESSION['cart']['total_price']) ?>$</h3>
		</div>
		<form method="post" action="create_command.php">
			<button name="buy_cart" type="submit" value="buy" />Payer</button>
		</form><?php }?>
		<div class = "panier">
			<h2>Enregistrer votre panier</h2>
			<form method="post" action="save_cart.php">
				<button name="save_cart" type="submit" value="save" />Enregistrer panier</button><br />
				<h4><label>Nom du nouveau panier : <label/></h4><input type="text" name="cart_name" />
				<button name="save_cart" type="submit" value="new" />Créer panier</button>
			</form>
		</div>
		<div class = "panier">
			<h2>Charger un panier</h2>
			<form method="post" action="load_cart.php">
				<h4><label>Nom du panier : <label/></h4><input type="text" name="cart_name" />
				<input type="submit" name="submit" value="OK" />
			</form>
		</div>
	</div>
</body>
</html>
