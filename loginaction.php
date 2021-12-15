<?php

require "dbfunctions.php";
session_start();
//A begepelt felhasznalonevet es jelszavat valtozokba mentjuk
$username=$_POST["username"];
$password=$_POST["password"];

//Itt is vegzunk egy formai ellenorzest, mivel ha a user eleve nem megfelelo formatumban gepel be felhasznalonevet, akkor felesleges ellenoriznunk az adatbazisban, hogy van-e ilyen felhasznalo. Ilyen esetben rogton atiranyitjuk az error page-re.
if (!preg_match("/^[a-zA-Z]*$/",$_POST["username"])||strlen($_POST["username"]) < 3) {
  header("Location:loginerror.php");
}

//a formai ellenorzest kovetoen csatlakozunk fel az adatbazisra:
$mysqli=connect();


//a dbfunctions.php tryLogIn fuggvenyevel megnezzuk, hogy a beirt felhasznalonevvel es jelszoval letezik-e user. Ha igen, a dbfunctions getUserData fuggvenyevel lekerjuk az adatait es elmentjuk a sessionbe, majd atiranyitjuk a fooldalra
if(tryLogIn($mysqli, $username, $password)){
	$_SESSION["user"]=getUserData($mysqli,$username);
	header("Location:index.php");
}else{
//Ha nincs ilyen felhasznalo, atiranyitjuk az error page-re:
	header("Location:loginerror.php");
}

$mysqli->close();

?>