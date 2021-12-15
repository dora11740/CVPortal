<?php

//ezt az actiont hasznalja az urlap.php (a cv adatok felvetelehez az adatbazisba)

require "dbfunctions.php";

//felcsatlakozunk az adatbazisra
$mysqli=connect();
session_start();

$email=$_SESSION["user"]["email"];

//mezonkent vegignezzuk, adott-e meg adatokat, es ha igen, akkor mentjuk az uj adatokat (ha nem, akkor megmarad az elozo ertek)
$data["nev"]=empty($_POST["nev"]) ? $_SESSION["user"]["nev"] : $_POST["nev"];
$data["cim"]=empty($_POST["cim"]) ? $_SESSION["user"]["cim"] : $_POST["cim"];
$data["telefon"]=empty($_POST["telefon"]) ? $_SESSION["user"]["telefon"] : $_POST["telefon"];
$data["iskola1"]=empty($_POST["iskola1"]) ? $_SESSION["user"]["iskola1"] : $_POST["iskola1"];
$data["vegzettseg1"]=empty($_POST["vegzettseg1"]) ? $_SESSION["user"]["vegzettseg1"] : $_POST["vegzettseg1"];
$data["iskola2"]=empty($_POST["iskola2"]) ? $_SESSION["user"]["iskola2"] : $_POST["iskola2"];
$data["vegzettseg2"]=empty($_POST["vegzettseg2"]) ? $_SESSION["user"]["vegzettseg2"] : $_POST["vegzettseg2"];
$data["iskola3"]=empty($_POST["iskola3"]) ? $_SESSION["user"]["iskola3"] : $_POST["iskola3"];
$data["vegzettseg3"]=empty($_POST["vegzettseg3"]) ? $_SESSION["user"]["vegzettseg3"] : $_POST["vegzettseg3"];
$data["munka1"]=empty($_POST["munka1"]) ? $_SESSION["user"]["munka1"] : $_POST["munka1"];
$data["munka2"]=empty($_POST["munka2"]) ? $_SESSION["user"]["munka2"] : $_POST["munka2"];
$data["munka3"]=empty($_POST["munka3"]) ? $_SESSION["user"]["munka3"] : $_POST["munka3"];
$data["munka4"]=empty($_POST["munka4"]) ? $_SESSION["user"]["munka4"] : $_POST["munka4"];
$data["nyelvek"]=empty($_POST["nyelvek"]) ? $_SESSION["user"]["nyelvek"] : $_POST["nyelvek"];
$data["hobbik"]=empty($_POST["hobbik"]) ? $_SESSION["user"]["hobbik"] : $_POST["hobbik"];

//a dbfunctions updateCV fuggvenyet hasznalva feltoltjuk az adatokaz az adatbazisba
updateCV($mysqli,$email,$data);
$_SESSION["user"]=getUserData($mysqli,$email=$_SESSION["user"]["username"]);

//atiranyitjuk a felhasznalot az oneletrajza megtekintesehez
header("Location:mycv.php");

$mysqli->close();
?>