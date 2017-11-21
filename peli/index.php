
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
		<li><a class="active" href="index.php">Etusivu</a></li>
		<li><a href="lisaaPeli.php">Uusi Peli</a></li>
		<li><a href="listaaPelit.php">Listaa Pelit</a></li>
		<li><a href="asetukset.php">Asetukset</a></li>
	</ul>
	<article>
		<h2>Nintendo Switch pelikirjastoni!</h2>
		<?php 
        if (isset($_COOKIE["keksi"])) {
            print("<p>Tervetuloa " . $_COOKIE["keksi"].".</p>");
        }
        ?>
		<p>Mahdollista lisätä uusia pelejä ja selata niiden tietoja!</p>
	</article>
	<?php include 'footer.php';?>
</body>
</html>
