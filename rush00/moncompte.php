<?php
include "cmd_fct.php";
session_start();
$items = read_table("private/dreams");
$_SESSION['url'] = "moncompte.php";
?>
<!DOCTYPE html>
<head>
	<title>Buy A Dream</title>
	<link href = "menu.css" rel = "stylesheet" type = "text/css">
	<link href = "moncompte.css" rel = "stylesheet" type = "text/css">
</head>
<?php include('menu.html'); ?>
<body>
	<?php
	if (isset($_SESSION['login']))
	{
	?>
	<div class ="inscription_o_connexion">
		<h2>Bonjour <?php echo $_SESSION['login'];?></h2>
		<h2 id="trait">Mes commandes</h2>
		<div class="commande">
			<h4><?php print_cmd($_SESSION['login']);?></h4>
		</div>
		<a id="deconnexion" href="logout.php"><h3>Se déconnecter</h3></a>
		<a id="deconnexion" href="del_user.php"><h3>Supprimer le compte</h3></a>
	</div>
	<?php
	}
	else {
	?>
	<div class ="inscription_n_connexion">
		<div class="inscription_o_connexion">
			<h1>inscription : </h1>
			<form method="post" action="create_user.php">
				<label><h3>Login : </h3><label/><input type="text" name="login" /><br />
				<label><h3>Password : </h3><label/><input type="password" name="passwd" /><br />
				<input type="submit" name="submit" value="OK" />
			</form>
		</div>
		<h1>OU</h1>
		<div class="inscription_o_connexion">
			<h1>connexion : </h1>
			<form method="post" action="login.php">
				<label><h3>Login : </h3><label/><input type="text" name="login" /><br />
				<label><h3>Password :</h3><label/><input type="password" name="passwd" /><br />
				<input type="submit" name="submit" value="OK" />
			</form>
		</div>
	</div>
	<?php
	}
	?>
</body>
</html>
