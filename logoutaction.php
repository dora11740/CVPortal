<?php

//a Kijelentkezes gomb ezt az actiont hivja meg

session_start();

//toroljuk a sessionbe mentett user adatokat
unset($_SESSION["user"]);

//redirecteljuk a usert a fooldalra
header("Location:index.php");

?>