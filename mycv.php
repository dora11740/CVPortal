<!DOCTYPE html>

<!-- Az oldal, ahol megjelennek adott felhasznalo oneletrajz adatai. A felhasznalo a profiljarol eri el -->

<html lang="en">

<?php require "dbfunctions.php";
session_start();
//ezt az oldalt csak bejelentkezve lehet elerni, ezert ha a sessionben nincs bejelentkezett felhasznalo, atiranyit az error page-re:
if(empty($_SESSION["user"])){ 
		header("Location:error.php");
	}
?>


  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>CV Portal</title>
  </head>
  
  
  <body>
    <div class="bodyContainer">
      <div class="banner"><img src="img/banner.jpg" align="center" alt="Banner" id="banner"></div>

      <nav>
        <ul>
          <li><a class="nav" href="index.php">Főoldal</a></li>
          <li><a class="nav" href="profil.php">Profil</a></li>
          <li><a class="nav" href="kereses.php">Keresés</a></li>
        </ul>
      </nav>


      <div class="content">
		<!-- Az adott sessionben bejelentkezett user-hez tartozo username-mel irjuk ki a cimet -->
        <h1><?php echo $_SESSION["user"]["username"];?> önéletrajza</h1>
		<?php
			//az osszes sornal ellenorizzuk, hogy a bejelentkezett userhez az adatbazis adott mezojeben szerepel-e adat. Ha az adott mezo ures, ott nem irunk ki semmit.
			if(!empty($_SESSION["user"]["nev"])){ echo "<h3>Név: {$_SESSION["user"]["nev"]}</h3>";}
			if(!empty($_SESSION["user"]["cim"])){ echo "<h3>Cím: {$_SESSION["user"]["cim"]}</h3>";}
			if(!empty($_SESSION["user"]["telefon"])){ echo "<h3>Telefonszám: {$_SESSION["user"]["telefon"]}</h3>";}
			if(!empty($_SESSION["user"]["email"])){ echo "<h3>E-mail: {$_SESSION["user"]["email"]}</h3>";}
			if(!empty($_SESSION["user"]["iskola1"])){ echo "<h3>Iskolák: {$_SESSION["user"]["iskola1"]} - {$_SESSION["user"]["vegzettseg1"]}</h3>";}
			if(!empty($_SESSION["user"]["iskola2"])){ echo "<h3>{$_SESSION["user"]["iskola2"]} - {$_SESSION["user"]["vegzettseg2"]}</h3>";}
			if(!empty($_SESSION["user"]["iskola3"])){ echo "<h3>{$_SESSION["user"]["iskola3"]} - {$_SESSION["user"]["vegzettseg3"]}</h3>";}
			if(!empty($_SESSION["user"]["munka1"])){ echo "<h3>Munkahelyek: {$_SESSION["user"]["munka1"]}</h3>";}
			if(!empty($_SESSION["user"]["munka2"])){ echo "<h3>{$_SESSION["user"]["munka2"]}</h3>";}
			if(!empty($_SESSION["user"]["munka3"])){ echo "<h3>{$_SESSION["user"]["munka3"]}</h3>";}
			if(!empty($_SESSION["user"]["munka4"])){ echo "<h3>{$_SESSION["user"]["munka4"]}</h3>";}
			if(!empty($_SESSION["user"]["nyelvek"])){ echo "<h3>Nyelvtudás: {$_SESSION["user"]["nyelvek"]}</h3>";}
			if(!empty($_SESSION["user"]["hobbik"])){ echo "<h3>Hobbik: {$_SESSION["user"]["hobbik"]}</h3>";}
		?>
      </div>
	  
	  
	  <div class="login">
		<?php 
		if(empty($_SESSION["user"])){ 
				echo('<a class="login" href="login.php"><h2>Bejelentkezés</h2></a>');
			}else{
				echo('<a class="logout" href="logoutaction.php"><h2>Kijelentkezés</h2></a>');
			}
			
			?></div>
		
	  <div class="copyright"><h2>(c) Georgieviczh Dora, 2021</h2></div>
    </div>
  </body>
</html>
