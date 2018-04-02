<?PHP

session_start();
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
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="admin_page.css" />
		<title>Add new Dreams</title>
	</head>
	<body>
		<header>
			<div id="container">
					<div id="titre">Admin Page</div>
			</div>
		</header>
		<hr>
			<div id="titre">Manage dream</div>
		<hr>
		<div class="manage">
			<div class="add"><form method="post" action="create_dreams.php">
				<label>Name<label/> : <input type="text" name="name" /><br />
				<label>Picture path<label/> : <input type="text" name="pic_path" /><br />
				<label>Price<label/> : <input type="text" name="price" /><br />
				<label>Stock<label/> : <input type="text" name="stock" /><br />
				<label>Sold number<label/> : <input type="text" name="soldnb" /><br />
				Dream abstract:<br />
				<textarea name="descriptif" rows="8" cols="45">
	Write a short summary here.
				</textarea><br />
				<label>Categories<label/> : <input type="text" name="categories" />
				(if several, separates each category with ;)<br />
				<input type="submit" name="submit" value="create" />
			</form></div/>
			<div class="del"><form method="post" action="dell_dreams.php">
				<label>Delete dream<label/> : <input type="text" name="name" placeholder="Dream name here" />
				<input type="submit" name="submit" value="delete" />
			</form></div/>
		</div>
	</body>
	<hr>
	<footer>
		<div id="home"><a href="accueil.php"><img src="resources/home.png" title="home"></a></div>
		<div id="logout"><a href="logout.php"><img src="resources/logout.jpeg" title="logout"></a></div>
	</footer>
</html>

