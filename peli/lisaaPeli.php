<?php
require_once "peli.php";

session_start ();

if (isset($_POST["talleta"])) {
    $peli = new Peli($_POST["nimi"], $_POST["tekija"], $_POST["vuosi"],  $_POST["arvosana"], $_POST["ikaraja"], $_POST["genre"], $_POST["kuvaus"]);

    
    $nimiVirhe = $peli->checkNimi();
    $tekijaVirhe = $peli->checkTekija();
    $vuosiVirhe = $peli->checkVuosi();
    $arvosanaVirhe = $peli->checkArvosana();
    $ikarajaVirhe = $peli->checkIkaraja();
    $genreVirhe = $peli->checkGenre();
    $kuvausVirhe = $peli->checkKuvaus(false);

    $_SESSION ["peliOlio"] = $peli;
    
    if ($nimiVirhe == 0 && $tekijaVirhe == 0 && $vuosiVirhe == 0 && $arvosanaVirheVirhe == 0 && $ikarajaVirhe == 0 && $genreVirhe == 0 && $kuvausVirhe == 0) {
        
        // Suljetaan istunto, koska sitä ei tarvita tällä sivulla
        session_write_close ();
        header ( "location: naytaPeli.php" );
        exit ();
    }
}
elseif (isset($_POST["peruuta"])) {
    unset ( $_SESSION ["peliOlio"] );
    header("location: index.php");
    exit();
} else {
    // Tutkitaan, onko istunnossa elokuvaa
    if (isset ( $_SESSION ["peliOlio"] )) {
        // Otetaan istunnosta olio
        $peli = $_SESSION ["peliOlio"];
        
        $nimiVirhe = $peli->checkNimi();
        $tekijaVirhe = $peli->checkTekija();
        $vuosiVirhe = $peli->checkVuosi();
        $arvosanaVirhe = $peli->checkArvosana();
        $ikarajaVirhe = $peli->checkIkaraja();
        $genreVirhe = $peli->checkGenre();
        $kuvausVirhe = $peli->checkKuvaus(false);
        
    } else {
        $peli = new Peli();

        $nimiVirhe = 0;
        $tekijaVirhe = 0;
        $vuosiVirhe = 0;
        $arvosanaVirhe = 0;
        $ikarajaVirhe = 0;
        $genreVirhe = 0;
        $kuvausVirhe = 0;
    }
}

?>

<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Lisää peli</title>
<style type="text/css">
label {
	width: 8em;
	display: block;
	float: left;
}

.punainen {
	color: red;
}
</style>
<meta name="author" content="Mikko Kaasinen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nintendoPelit.css">
</head>

<body>
	<header>NINTENDO SWITCH PELIT</header>
	<ul>
		<li><a href="index.php">Etusivu</a></li>
		<li><a class="active" href="lisaaPeli.php">Uusi Peli</a></li>
		<li><a href="listaaPelit.php">Listaa Pelit</a></li>
    <li><a href="asetukset.php">Asetukset</a></li>
	</ul>

	<article>
		<h2>Lisää peli</h2>
		<form action="lisaaPeli.php" method="post">

			<p>
				<label>Pelin nimi</label> <input type="text" name="nimi" size="50"
					value="<?php print(htmlentities($peli->getNimi(), ENT_QUOTES, "UTF-8"));?>">
<?php
print("<span class='punainen'>" . $peli->getError($nimiVirhe) . "</span>");
?>
</p>

			<p>
				<label>Tekijä</label> <input type="text" name="tekija" size="30"
					value="<?php print(htmlentities($peli->getTekija(), ENT_QUOTES, "UTF-8"));?>">
<?php
print("<span class='punainen'>" . $peli->getError($tekijaVirhe) . "</span>");
?>
</p>

			<p>
				<label>Julkaisuvuosi</label> <input type="text" name="vuosi"
					size="4" maxlength="4"
					value="<?php print(htmlentities($peli->getVuosi(), ENT_QUOTES, "UTF-8"));?>">
<?php
print("<span class='punainen'>" . $peli->getError($vuosiVirhe) . "</span>");
?>
</p>

	<p>
				<label>Arvosana</label> <input type="text" name="arvosana"
          size="3" maxlength="3"
					value="<?php print(htmlentities($peli->getArvosana(), ENT_QUOTES, "UTF-8"));?>">
<?php
print("<span class='punainen'>" . $peli->getError($arvosanaVirhe) . "</span>");
?>
</p>

			<p>
				<label>Ikäraja</label> <input type="text" name="ikaraja"
					size="2" maxlength="2"
					value="<?php print(htmlentities($peli->getIkaraja(), ENT_QUOTES, "UTF-8"));?>">
<?php
print("<span class='punainen'>" . $peli->getError($ikarajaVirhe) . "</span>");
?>
</p>
			<p>
				<label>Genre</label> <input type="text" name="genre"
          size="10"
					value="<?php print(htmlentities($peli->getGenre(), ENT_QUOTES, "UTF-8"));?>">
<?php
print("<span class='punainen'>" . $peli->getError($genreVirhe) . "</span>");
?>
</p>
			
			<p>
				<label>Pelimuodot</label> 
				<input type="checkbox" name="pelimuodot[]" value="tv"> TV 
				<input type="checkbox" name="pelimuodot[]" value="kasikonsoli"> Käsikonsoli 
				<input type="checkbox" name="pelimuodot[]" value="moninpeliTv"> Moninpeli TV 
				<input type="checkbox" name="pelimuodot[]" value="moninpeliKk"> Moninpeli käsikonsoli
			</p>
			
			<p>
				<label>Kuvaus</label>
				<textarea rows="5" cols="40" name="kuvaus"><?php print(htmlentities($peli->getKuvaus(), ENT_QUOTES, "UTF-8"));?></textarea>
<?php
print("<span class='punainen' style='vertical-align:top'>" . $peli->getError($kuvausVirhe) . "</span>");
?>
</p>

			<p>
				<label>&nbsp;</label>
				<input type="submit" name="talleta"	value="Tallenna">
				<input type="submit" name="peruuta"	value="Peruuta">
			</p>

		</form>

	</article>
	<?php include 'footer.php';?>
	
</body>
</html>
