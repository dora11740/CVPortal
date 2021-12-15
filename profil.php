<!DOCTYPE html>

<!-- A felhasznalo profilja -->

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
		<!-- Az adott sessionben eltarolt bejelentkezett felhasznalo felhasznalonevet hasznaljuk -->
        <h1><?php echo $_SESSION["user"]["username"];?> profilja</h1>
		<h3><a href="urlap.php">Önéletrajz feltöltése, frissítése</a></h3>
		<h3><a href="mycv.php">Önéletrajz megtekintése</a></h3>
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
