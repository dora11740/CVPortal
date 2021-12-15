<!DOCTYPE html>

<!-- A kereso urlap -->

<html lang="en">

<?php require "dbfunctions.php";
session_start();
//Ha nincs bejelentkezett felhasznalo, atiranyitjuk a latogatot az error.php-re, ahonnan at tud navigalni a bejelentkezeshez es a regisztraciohoz:
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
        <h1>Felhasználók keresése</h1>
		
		 <div class="keresesContainer">		 
			 <!-- A kereso. A keresesaction.php fajlt hajtja vegre a gomb megnyomasaval -->
			 <form class="kereses" action="keresesaction.php" method="post">
				 <!-- Az input field. A placeholder benne csak javaslat (lehet megadni csak kereszt- vagy vezeteknevet is) -->
				  <input type="text" name="keyword" placeholder="vezeték- és keresztnév">
				  <!-- Gomb a kuldeshez -->
				  <button type="submit">Küldés</button>
			 </form>
		 </div> 
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
