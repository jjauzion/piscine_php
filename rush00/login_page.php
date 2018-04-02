<?PHP

session_start();
if (isset($_SESSION['id']))
{
	echo "log out first";
	?>
	<!DOCTYPE html>
	<html>
		<meta http-equiv="refresh" content="1;URL=buyadream.php" />
	</html>
	<?PHP
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Buy A Dream</title>
		<link href = "buyadream.css" rel = "stylesheet" type = "text/css">
	</head>
	<header>
		<div class="div_home">
			<a href="buyadream.php" id="accueil" class="home_button">Accueil</a>
			<ul class="categorie">
				<li>
					<a href="buyadream_categories.php" id="categorie" class="home_button">Catégories</a>
					<ul class="level2 categorie">
						<li>
							<a href="buyadream_categories.php#comedie" class="categorie_button">Comedie</a>
						</li>
						<li>
							<a href="buyadream_categories.php#drame" class="categorie_button">Drame</a>
						</li>
					</ul>
				</li>
			</ul>
			<a href="buyadream_moncompte.php" id="mon_compte" class="home_button">Mon compte</a>
			<a href="buyadream_panier.php" id="panier" class="home_button">Panier</a>
		</div>
	</header>
	<body>
		<form method="post" action="login.php">
			<label>Login<label/> : <input type="text" name="login" /><br />
			<label>Password<label/> : <input type="password" name="passwd" /><br />
			<input type="submit" name="submit" value="OK" /><br />
		</form>
	</body>
</html>
