<?php

//uj felhasznalo letrehozasa

require "dbfunctions.php";

//a begepelt adatokat valtozokba mentjuk
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];

//egy atiranyitas valtozo az egyszeruseg kedveert. Minden resznel ennek adjuk ertekul a relevans redirect locationt, majd vegul ezt adjuk at a headernek
$redirecturl="";

//felcsatlakozunk az adatbazisra
$mysqli=connect();


//megnezzuk, hogy helyes-e az email es felhasznalonev formatuma
if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && (preg_match("/^[a-zA-Z]*$/",$_POST["username"]) && strlen($_POST["username"]) > 3)){
	//ha jo a formatum, megnezzuk, van-e mar ilyen user. Ertekul adjuk egy valtozonak a dbfunctions checkExistingUser fuggvenyenek visszateresi erteket (true/false):
	$isUser = checkExistingUser($mysqli, $email, $username);
	
		//ha true, a redirecturl valtozonak az error page-re atiranyitast adjuk ertekul:
		if($isUser){
			$redirecturl="Location:signuperror.php";
		}else{
		//ha false, meghivjuk a dbfunctions createnewuser fuggvenyet es atadjuk neki a begepelt adatokat, majd a redirecturl valtozonak a login page-et adjuk ertekul
			createNewUser($mysqli, $email, $username, $password);
			$redirecturl="Location:login.php";
		}
}else{
	//ha rossz volt a formatum, a relevans error page-t adjuk at ertekul a redirecturl valtozonak:
	$redirecturl="Location:emailerror.php";
}


$mysqli->close();

//atiranyitjuk a usert a relevans locationre
header($redirecturl);

?>