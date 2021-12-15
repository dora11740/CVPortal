<!DOCTYPE html>

<!-- Az urlap a felhasznalo profiljan belul, ahova a cv adatait toltheti fel -->

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
        <h1>Add meg önéletrajz adataidat!</h1>
		<h3>Nem kötelező minden mezőt kitölteni.</h3>
		<!-- A bevitt adatok feltoltesehez az adatbazisba az updatecvaction.php-t hasznaljuk -->
		<form class="cvUrlap" action="updatecvaction.php" method="post">
				<label for="nev"><b>Név:</b></label><br>
				<input type="text" placeholder="Kiss Tünde" name="nev" ><br>
				
				<label for="cim"><b>Lakcím:</b></label><br>
				<input type="text" placeholder="Budapest, Budapest utca 4" name="cim" ><br>

				<label for="telefon"><b>Telefonszám:</b></label><br>
				<input type="text" placeholder="061 111 1111" name="telefon" ><br>
				
				<label for="iskola1"><b>Iskola 1:</b></label><br>
				<input type="text" placeholder="Szegedi Tudoményegyetem" name="iskola1" ><br>
				
				<label for="vegzettseg1"><b>Iskola 1 végzettség:</b></label><br>
				<input type="text" placeholder="Történelem MA" name="vegzettseg1" ><br>
				
				<label for="iskola2"><b>Iskola 2:</b></label><br>
				<input type="text" placeholder="Szegedi Tudoményegyetem" name="iskola2" ><br>
				
				<label for="vegzettseg2"><b>Iskola 2 végzettség:</b></label><br>
				<input type="text" placeholder="Történelem BA" name="vegzettseg2" ><br>
				
				<label for="iskola3"><b>Iskola 3:</b></label><br>
				<input type="text" placeholder="Petőfi Sándor Gimnázium" name="iskola3" ><br>
				
				<label for="vegzettseg3"><b>Iskola 3 végzettség:</b></label><br>
				<input type="text" placeholder="Érettségi bizonyítvány" name="vegzettseg3" ><br>
				
				<label for="munka1"><b>Munkahely 1:</b></label><br>
				<input type="text" placeholder="Legfrissebb munkahely" name="munka1" ><br>
				
				<label for="munka2"><b>Munkahely 2:</b></label><br>
				<input type="text" placeholder="Előző munkahely" name="munka2" ><br>
				
				<label for="munka3"><b>Munkahely 3:</b></label><br>
				<input type="text" placeholder="Volt munkahely" name="munka3" ><br>
				
				<label for="munka4"><b>Munkahely 4:</b></label><br>
				<input type="text" placeholder="Volt munkahely" name="munka4" ><br>
				
				<label for="nyelvek"><b>Nyelvtudás:</b></label><br>
				<input type="text" placeholder="angol, német stb." name="nyelvek" ><br>
				
				<label for="hobbik"><b>Hobbik:</b></label><br>
				<input type="text" placeholder="olvasás, zene, stb." name="hobbik" ><br>

				<button type="submit">Adatok feltöltése</button>
			</form>
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
