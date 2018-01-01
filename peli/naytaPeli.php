<?php
require_once "peli.php";

session_start();

// Tutkitaan, onko istunnossa peliä
if (isset ( $_SESSION ["peliOlio"] )) {
    // Otetaan istunnosta olio
    $peli = $_SESSION ["peliOlio"];
} else {
    // Tehdään tyhjä peli
    $peli = new Peli();
}
if (isset($_POST["talleta"])) {
    unset ( $_SESSION ["peliOlio"] );
    header ("location: tallennettu.php");
    exit;
} elseif (isset($_POST["peruuta"])) {
    unset ( $_SESSION ["peliOlio"] );
    header("location: index.php");
    exit();

} elseif (isset($_POST["korjaa"])) {
    $_SESSION ["peliOlio"] = $peli;
    header("location: lisaaPeli.php");
    exit();
}

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Nintendo Switch pelit</title>
<meta name="author" content="Mikko Kaasinen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nintendoPelit.css">
</head>

<body>
	<header>NINTENDO SWITCH PELIT</header>
	<ul>
		<li><a href="index.php">Etusivu</a></li>
		<li><a href="lisaaPeli.php">Uusi Peli</a></li>
		<li><a href="listaaPelit.php">Listaa Pelit</a></li>
		<li><a href="asetukset.php">Asetukset</a></li>
	</ul>
	

<article>
<form action="NaytaPeli.php" method="post">
		<h2>Tiedot on talletettu</h2>

<?php
	//print ("<p>Id: " . $peli->getId ()) ;
	print ("<br>Nimi: " . $peli->getNimi ()) ;
	print ("<br>Tekijä: " . $peli->getTekija()) ;
	print ("<br>Vuosi: " . $peli->getVuosi ()) ;
	print ("<br>Arvosana: " . $peli->getArvosana()) ;
	print ("<br>Ikäraja: " . $peli->getIkaraja()) ;
	print ("<br>Genre: " . $peli->getGenre()) ;
	print ("<br>Kuvaus: " . $peli->getKuvaus () . "</p>") ;
?>
<p>
				<label>&nbsp;</label>
				<input type="submit" name="korjaa"	value="Korjaa">
				<input type="submit" name="talleta"	value="Tallenna">
				<input type="submit" name="peruuta"	value="Peruuta">
</p>
</form>
	</article>
	

		<?php include 'footer.php';?>

</body>
</html>
