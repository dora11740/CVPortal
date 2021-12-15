<!DOCTYPE html>

<html lang="en">

<!-- itt importaljuk a dbfunctions.php-t, mivel az letesit kapcsolatot az adatbazisunkkal, es abban vannak az adatbazist hasznalo fuggvenyek. A session tarolja a bejelentkezett felhasznalot es kereses eseten annak az eredmenyeit is -->
<?php require "dbfunctions.php";
session_start();
 ?>
 
 
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>CV Portal</title>
  </head>
  
  
  <body>
    <div class="bodyContainer">
	
	  <!-- banner -->
      <div class="banner"><img src="img/banner.jpg" align="center" alt="Banner" id="banner"></div>


	  <!-- menusor -->
      <nav>
        <ul>
          <li><a class="nav" href="index.php">Főoldal</a></li>
          <li><a class="nav" href="profil.php">Profil</a></li>
          <li><a class="nav" href="kereses.php">Keresés</a></li>
        </ul>
      </nav>


	  <!-- ebben a content elemben lesz minden oldalon a tenyleges tartalom -->
      <div class="content">
	  
			<h1>Isten hozott!</h1>
			<!-- Itt kovetkeznek az udvozlo uzenetek -->
			<?php 
			//Ha a session user kulcsa ures, akkor nincs bejelentkezett felhasznalo, igy a latogatonak szant udvozlo uzenet jelenik meg. Ha van ertek a user kulcshoz, akkor van bejelentkezett felhasznalo, igy a felhasznaloknak szant udvozlo uzenet fog megjelenni az o felhasznalonevevel.
			if(empty($_SESSION["user"])){ 
					echo("<h3>A CV Portal egy egyszerű önéletrajz webalkalmazás. Regisztrálva lesz lehetőséged saját önéletrajzod feltöltésére, valamint más felhasználók önéletrajzainak megtekintésére, tallózására.</h3>");
				}else{
					echo("<h3>Üdvözöllek, {$_SESSION["user"]["username"]}! A Profil menüpontra kattintva lesz lehetőséged saját önéletrajzod feltöltésére, valamint a Keresésre kattintva más felhasználók önéletrajzainak megtekintésére, tallózására.</h3>");
				} 
			?>		
	  </div>
	  
	  
	  <!-- A be/kijelentkezes link az oldal aljan -->
	  <div class="login">
	  
			<?php 
			//Ha a session user kulcsa ures, akkor nincs bejelentkezett felhasznalo, igy Bejelentkezes link jelenik meg. Ha van ertek a user kulcshoz, akkor van bejelentkezett felhasznalo, igy a Kijelentkezes link jelenik meg. A Bejelentkezes link a bejelentkezo oldalra fog vinni, mig a Kijelentkezes meghivja a logoutaction.php-t, ami megszakitja a sessiont, tehat kijelentkezteti a usert es redirectel a fooldalra.
			if(empty($_SESSION["user"])){ 
					echo('<a class="login" href="login.php"><h2>Bejelentkezés</h2></a>');
				}else{
					echo('<a class="logout" href="logoutaction.php"><h2>Kijelentkezés</h2></a>');
				}	
			?>
	  </div>
	  
	  
	  <!-- Copyright szoveg az oldal aljan -->
	  <div class="copyright"><h2>(c) Georgieviczh Dora, 2021</h2></div>
	  
    </div>
  </body>
</html>
