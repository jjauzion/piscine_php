<?php
include "fct_table.php";
session_start();
$items = read_table("private/dreams");
$_SESSION['url'] = "categories.php";
?>
<!DOCTYPE html>
<head>
	<title>Buy A Dream</title>
	<link href = "menu.css" rel = "stylesheet" type = "text/css">
	<link href = "categories.css" rel = "stylesheet" type = "text/css">
</head>
<?php include('menu.html'); ?>
<body>
	<div id="sport" class="categorie_sell">
		<h1>Sport</h1>
		<?php
		$done = 0;
		if ($items)
		foreach ($items as $key => $item)
		{
			if (strstr($item['categories'], 'sport'))
			{
				$done = 1;
				print("
				<div class='sell'>
					<div class 'categorie_sell'>
						<h2>" . $item['name'] . "</h2>
						<h3 class='descriptif'>" . $item['descriptif'] . "</h3>
						<div class='sell'>
							<h3>Prix : " . $item['price'] . "$</h3>
							<form method='post' action='add2cart.php'>
								<button name='item_id' type='submit' value='" . $key . "' />Ajouter au panier</button>
							</form>
						</div>
					</div>
					<img class='pictures' src='" . $item['picture_path'] . "'>
				</div>");
			}
		}
		if ($done == 0)
			print("<h2>Il n'y a actuellement aucun article dans cette catégorie</h2>");
		?>
	</div>
	<div id="aventure" class="categorie_sell">
		<h1>Aventure</h1>
		<?php
		$done = 0;
		if ($items)
		foreach ($items as $key => $item)
		{
			if (strstr($item['categories'], 'adventure'))
			{
				$done = 1;
				print("
				<div class='sell'>
					<div class 'categorie_sell'>
						<h2>" . $item['name'] . "</h2>
						<h3 class='descriptif'>" . $item['descriptif'] . "</h3>
						<div class='sell'>
							<h3>Prix : " . $item['price'] . "$</h3>
							<form method='post' action='add2cart.php'>
								<button name='item_id' type='submit' value='" . $key . "' />Ajouter au panier</button>
							</form>
						</div>
					</div>
					<img class='pictures' src='" . $item['picture_path'] . "'>
				</div>");
			}
		}
		if ($done == 0)
			print("<h2>Il n'y a actuellement aucun article dans cette catégorie</h2>");
		?>
	</div>
	<div id="drame" class="categorie_sell">
		<h1>Drame</h1>
		<?php
		$done = 0;
		if ($items)
		foreach ($items as $key => $item)
		{
			if (strstr($item['categories'], 'drame'))
			{
				$done = 1;
				print("
				<div class='sell'>
					<div class 'categorie_sell'>
						<h2>" . $item['name'] . "</h2>
						<h3 class='descriptif'>" . $item['descriptif'] . "</h3>
						<div class='sell'>
							<h3>Prix : " . $item['price'] . "$</h3>
							<form method='post' action='add2cart.php'>
								<button name='item_id' type='submit' value='" . $key . "' />Ajouter au panier</button>
							</form>
						</div>
					</div>
					<img class='pictures' src='" . $item['picture_path'] . "'>
				</div>");
			}
		}
		if ($done == 0)
			print("<h2>Il n'y a actuellement aucun article dans cette catégorie</h2>");
		?>
	</div>
	<div id="adult" class="categorie_sell">
		<h1>+18</h1>
		<?php
		$done = 0;
		if ($items)
		foreach ($items as $key => $item)
		{
			if (strstr($item['categories'], 'adult'))
			{
				$done = 1;
				print("
				<div class='sell'>
					<div class 'categorie_sell'>
						<h2>" . $item['name'] . "</h2>
						<h3 class='descriptif'>" . $item['descriptif'] . "</h3>
						<div class='sell'>
							<h3>Prix : " . $item['price'] . "$</h3>
							<form method='post' action='add2cart.php'>
								<button name='item_id' type='submit' value='" . $key . "' />Ajouter au panier</button>
							</form>
						</div>
					</div>
					<img class='pictures' src='" . $item['picture_path'] . "'>
				</div>");
			}
		}
		if ($done == 0)
			print("<h2>Il n'y a actuellement aucun article dans cette catégorie</h2>");
		?>
	</div>
</body>
</html>
