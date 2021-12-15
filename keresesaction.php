<?php
require "dbfunctions.php";
//racsatlakozunk az adatbazisunkra es elinditjuk a sessiont:
$mysqli=connect();
session_start();

//a keresobe irt szot valtozoba mentjuk
$keyword=$_POST["keyword"];

//elmentjuk a sessionbe a dbfunctions.php search fuggvenyenek a beirt keywordre kapott eredmenyet
$_SESSION["searchresult"]=search($mysqli,$keyword);

//atiranyitjuk a usert az eredmenyek oldalra
header("Location:results.php");

$mysqli->close();
?>