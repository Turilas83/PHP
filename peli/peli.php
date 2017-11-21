<?php
class Peli  {

    private static $virhelista = array (
        - 1 => "Virheellinen tieto",
        0 => "",
        11 => "Nimi on pakollinen",
        12 => "Nimi on liian lyhyt",
        13 => "Nimi on liian pitkä",
        21 => "Tekijä on pakollinen",
        22 => "Tekijän nimi on liian lyhyt",
        23 => "Tekijän nimi on liian pitkä",
        31 => "Vuosi on pakollinen",
  		32 => "Vuosi muodossa vvvv (numeroilla)",
  		33 => "Vuosi on liian pieni",
  		34 => "Vuosi ei voi olla tulevaisuudessa",
        41 => "Arvosana on pakollinen",
        42 => "Arvosana välillä 1-100",
        43 => "Arvosana on liian pieni",
        44 => "Arvosana on liian suuri",
        51 => "Ikäraja on pakollinen",
        52 => "Ikäraja välillä 0-18",
        53 => "Ikäraja on liian pieni",
        54 => "Ikäraja on liian suuri",
        61 => "Genre on pakollinen",
        62 => "Genre saa olla vain kirjaimia ja välilyönti",
        63 => "Genre on liian lyhyt",
        64 => "Genre on liian pitkä",
        71 => "Kuvaus on pakollinen",
        72 => "Kuvaus on liian lyhyt",
        73 => "Kuvaus on liian pitkä",
        74 => "Kuvaus saa olla vain kirjaimia, numeroita ja - ,.!?"
    );

    private $nimi;
    private $tekija;
    private $vuosi;
    private $arvosana;
    private $ikaraja;
    private $genre;
    private $kuvaus;
    private $id;

    function __construct($nimi = "", $tekija = "", $vuosi = "", $arvosana = "", $ikaraja = "", $genre = "", $kuvaus = "",  $id = 0) {
        $this->nimi = trim ( $nimi );
        $this->tekija = trim ( $tekija );
        $this->vuosi = trim ( $vuosi );
        $this->arvosana = trim ( $arvosana );
        $this->ikaraja = trim ( $ikaraja );
        $this->genre = trim ( $genre );
        $this->kuvaus = trim ( $kuvaus );
        $this->id = $id;
    }

    public function setNimi($nimi) {
        $this->nimi = trim ( $nimi );
    }
    public function getNimi() {
        return $this->nimi;
    }

    public function checkNimi($required = true, $min = 1, $max = 50) {

        if ($required == false && strlen ( $this->nimi ) == 0) {
            return 0;
        }

        if ($required == true && strlen ( $this->nimi ) == 0) {
            return 11;
        }

        if (strlen ( $this->nimi ) < $min) {
            return 12;
        }

        if (strlen ( $this->nimi ) > $max) {
            return 13;
        }

        return 0;
    }
    public function setTekija($tekija) {
        $this->tekija = trim ( $tekija );
    }
    public function getTekija() {
        return $this->tekija;
    }

    public function checkTekija($required = true, $min = 1, $max = 30) {

        if ($required == false && strlen ( $this->tekija ) == 0) {
            return 0;
        }

        if ($required == true && strlen ( $this->tekija ) == 0) {
            return 21;
        }

        if (strlen ( $this->tekija ) < $min) {
            return 22;
        }

        if (strlen ( $this->tekija ) > $max) {
            return 23;
        }

        return 0;
    }

    public function setVuosi($vuosi) {
        $this->vuosi = trim ( $vuosi );
    }

    public function getVuosi() {
        return $this->vuosi;
    }

    public function checkVuosi($required = true, $min = 2017) {

        if ($required == false && strlen ( $this->vuosi ) == 0) {
            return 0;
        }

        if ($required == true && strlen ( $this->vuosi ) == 0) {
            return 31;
        }

        if (! preg_match ( "/^\d{4}$/", $this->vuosi )) {
            return 32;
        }

        if ($this->vuosi < $min) {
            return 33;
        }

        $max = date ( "Y", time () );
        if ($this->vuosi > $max) {
            return 34;
        }

        return 0;
    }

    public function setArvosana($arvosana) {
        $this->arvosana = trim ( $arvosana );
    }

    public function getArvosana() {
        return $this->arvosana;
    }

    public function checkArvosana($required = true, $min = 1, $max = 100) {
        if ($required == false && strlen ( $this->arvosana ) == 0) {
            return 0;
        }

        if ($required == true && strlen ( $this->arvosana ) == 0) {
            return 41;
        }
        if (! preg_match ( "/([1-9]?[0-9]|100)/", $this->arvosana)) {
            return 42;
        }


        if ($this->arvosana < $min) {
            return 43;
        }

        if ($this->arvosana > $max) {
            return 44;
        }

        return 0;

    }
    public function setIkaraja($ikaraja) {
        $this->ikaraja = trim ( $ikaraja );
    }

    public function getIkaraja() {
        return $this->ikaraja;
    }
    public function checkIkaraja($required = true, $min = 0, $max = 18) {
        if ($required == false && strlen ( $this->ikaraja ) == 0) {
            return 0;
        }

        if ($required == true && strlen ( $this->ikaraja ) == 0) {
            return 51;
        }
        if (! preg_match ( "/([0-1]?[0-8])/", $this->ikaraja)) {
            return 52;
        }

        if ($this->ikaraja < $min) {
            return 53;
        }

        if ($this->ikaraja > $max) {
            return 54;
        }

        return 0;

    }

    public function setGenre($genre) {
        $this->genre = trim ( $genre );
    }
    public function getGenre() {
        return $this->genre;
    }

    public function checkGenre($required = true, $min = 1, $max = 15) {

        if ($required == false && strlen ( $this->genre ) == 0) {
            return 0;
        }

        if ($required == true && strlen ( $this->genre ) == 0) {
            return 61;
        }
        if (preg_match( "/[^a-zöåä \-]/i", $this->genre )) {
            return 62;
        }

        if (strlen ( $this->genre ) < $min) {
            return 63;
        }

        if (strlen ( $this->genre ) > $max) {
            return 64;
        }

        return 0;
    }

    public function setKuvaus($kuvaus) {
        $this->kuvaus = trim ( $kuvaus );
    }

    public function getKuvaus() {
        return $this->kuvaus;
    }

    public function checkKuvaus($required = true, $min = 5, $max = 300) {

        if ($required == false && strlen ( $this->kuvaus ) == 0) {
            return 0;
        }

        if ($required == true && strlen ( $this->kuvaus ) == 0) {
            return 71;
        }

        if (strlen ( $this->kuvaus ) < $min) {
            return 72;
        }

        if (strlen ( $this->kuvaus ) > $max) {
            return 73;
        }

        if (preg_match ( "/^[a-zöåä0-9\-.,!?]$/i", $this->kuvaus )) {
            return 74;
        }

        return 0;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public static function getError($virhekoodi) {
        if (isset ( self::$virhelista [$virhekoodi] ))
            return self::$virhelista [$virhekoodi];

            return self::$virhelista [- 1];
    }
}
?>
