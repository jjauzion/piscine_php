<?php
include "fct_table.php";
session_start();
$objs = read_table("private/dreams");
$maxsell["soldnb"] = 0;
if ($objs)
foreach($objs as $key => $obj) {
	if ($obj["SOLDNB"] >= $maxsell["SOLDNB"])
	{
		$maxsell = $obj;
		$item_id = $key;
	}
}
$_SESSION['url'] = "accueil.php";
?>
<!DOCTYPE html>
<head>
	<title>Buy A Dream</title>
	<link href = "menu.css" rel = "stylesheet" type = "text/css">
	<link href = "accueil.css" rel = "stylesheet" type = "text/css">
</head>
<?php include('menu.html'); ?>
<body>
	<div class="top_sell">
		<h1>Meilleures ventes toutes catégories</h1>
		<div class="sell">
			<?php if ($maxsell['soldnb'] != 0) { ?>
			<div id="space"></div>
			<div class "top_sell">
				<h2><?php echo $maxsell["name"];?></h2>
				<h3 class="descriptif"><?php echo $maxsell["descriptif"];?></h3>
				<div class="sell">
					<h3>Prix : <?php echo $maxsell["price"];?>$</h3>
					<form method="post" action="add2cart.php">
						<button name="item_id" type="submit" value="<?php print($item_id); ?>" />Ajouter au panier</button>
					</form>
				</div>
			</div>
			<img class="pictures" src="<?php echo $maxsell["picture_path"];?>">
		<?php } else {?>
			<h2>Il n'y a aucune vente actuellement.</h2><?php } ?>
		</div>
	</div>

</body>
</html>
