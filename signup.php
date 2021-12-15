<!DOCTYPE html>

<!-- Regisztracios urlap. Ennek kulon nincs menupont, de a login pagerol el lehet erni, valamint ha restricted tartalmat akar nezni a latogato, akkor is linkelve van az error page-en -->

<html lang="en">

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
      <div class="banner"><img src="img/banner.jpg" align="center" alt="Banner" id="banner"></div>

      <nav>
        <ul>
          <li><a class="nav" href="index.php">Főoldal</a></li>
          <li><a class="nav" href="profil.php">Profil</a></li>
          <li><a class="nav" href="kereses.php">Keresés</a></li>
        </ul>
      </nav>


      <div class="content">
        <h1>Regisztrálj a CV Portalra</h1>
		<!-- A newuser.php actiont hasznaljuk a bevitt adatok ellenorzesere es a helyes adatok adatbazisba felvetelere -->
		<form class="registerUrlap" action="newuser.php" method="post">
				<label for="email"><b>E-mail cím:</b></label><br>
				<input type="text" placeholder="pelda@pelda.hu" name="email" required><br>
				
				<label for="username"><b>Felhasználónév:</b></label><br>
				<input type="text" placeholder="Írd be a felhasználóneved" name="username" required><br>

				<label for="password"><b>Jelszó:</b></label><br>
				<input type="password" placeholder="Írd be a jelszavad" name="password" required><br>

				<button type="submit">Regisztráció</button>
			</form>
      </div>
	  
	  
	  <div class="login">
		<a class="login" href="login.php"><h2>Bejelentkezés</h2></a></div>
		
	  <div class="copyright"><h2>(c) Georgieviczh Dora, 2021</h2></div>
    </div>
  </body>
</html>
