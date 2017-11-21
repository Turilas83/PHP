<?php 
if (isset($_POST["tallennaNimi"])) {
    setcookie("keksi", $tallennaNimi);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Nintendo Switch pelit</title>
<meta name="keywords" content="Peli" />
<meta name="author" content="Mikko Kaasinen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nintendoPelit.css">
</head>

<body>
	<header>NINTENDO SWITCH PELIT</header>
	<ul>
		<li><a  href="index.php">Etusivu</a></li>
		<li><a href="lisaaPeli.php">Uusi Peli</a></li>
		<li><a href="listaaPelit.php">Listaa Pelit</a></li>
		<li><a class="active" href="asetukset.php">Asetukset</a></li>
	</ul>
	<article>
	<form action="" method="post">
   	Käyttäjänimi: <input name="kNimi" type="text" size="15" value="">

   <br><br>
   <input name="tallennaNimi" type="submit"  value="Muuta nimeä">
</form>
</article>
	<?php include 'footer.php';?>
</body>

</html>
