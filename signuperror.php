<!DOCTYPE html>

<!-- Error page arra az esetre, ha regisztracio kozben mas user email cimet vagy felhasznalonevet valasztjuk -->

<html lang="en">

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
        <h1>Hiba!</h1>
		<h3>Ilyen felhasználónévvel vagy e-mail címmel már van felhasználó.</h3>
		<a href="signup.php"><h3>Vissza</h3></a>
		</div>
	  
	  
	  <div class="login">
		<a class="login" href="login.php"><h2>Bejelentkezés</h2></a></div>
	  <div class="copyright"><h2>(c) Georgieviczh Dora, 2021</h2></div>
    </div>
  </body>
</html>
