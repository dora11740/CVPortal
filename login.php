<!DOCTYPE html>

<!-- Bejelentkezes -->

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
        <h1>Bejelentkezés</h1>
		<h3>Ha még nincs felhasználói fiókod, <a href="signup.php">itt</a> tudsz regisztrálni.</h3>
		
			<!-- Urlap a bejelentkezeshez. A loginaction.php-t hajtja vegre a gomb megnyomasaval -->
			<form class="loginUrlap" action="loginaction.php" method="post">
			
				<!-- bekerjuk a felhasznalonevet, required field -->
				<label for="username"><b>Felhasználónév:</b></label><br>
				<input type="text" placeholder="Írd be a felhasználóneved" name="username" required><br>
				
				<!-- bekerjuk a jelszavat, required field -->
				<label for="password"><b>Jelszó:</b></label><br>
				<input type="password" placeholder="Írd be a jelszavad" name="password" required><br>

				<!-- gomb a kuldeshez -->
				<button type="submit">Bejelentkezés</button>
			 </form>
      </div>
	  
	  <div class="login">
		<a class="login" href="login.php"><h2>Bejelentkezés</h2></a></div>
		
	  <div class="copyright"><h2>(c) Georgieviczh Dora, 2021</h2></div>
    </div>
  </body>
</html>
