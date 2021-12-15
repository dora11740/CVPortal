<!DOCTYPE html>

<!-- A kereses eredmenyei -->

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
        <h1>Keresésed eredményei:</h1>
		
		<?php 
		//Ha van eredmenye a keresesnek:
		if(!empty($_SESSION["searchresult"])){ 
			//ciklus kell, mivel nem eleg kiirnunk az adatokat csak egy eredmenyhez, a kereses osszes eredmenyere kivancsiak vagyunk:
			foreach ($_SESSION["searchresult"] as $userdata) {
				//teszunk be divet a css formazas kedveert:
				echo '<div class="kartya" name="kartya">';
								//Kiirjuk a kereses osszes eredmenyehez tartozo, nem ures adatbazismezoket (kiveve felhasznalonev, jelszo):
								if(!empty($userdata[1])){ echo "<h3>Név: {$userdata[1]}</h3>";}
								if(!empty($userdata[2])){ echo "<h3>Cím: {$userdata[2]}</h3>";}
								if(!empty($userdata[3])){ echo "<h3>Telefonszám: {$userdata[3]}</h3>";}
								if(!empty($userdata[0])){ echo "<h3>E-mail: {$userdata[0]}</h3>";}
								if(!empty($userdata[4])){ echo "<h3>Iskolák: {$userdata[4]} - {$userdata[5]}</h3>";}
								if(!empty($userdata[6])){ echo "<h3>{$userdata[6]} - {$userdata[7]}</h3>";}
								if(!empty($userdata[8])){ echo "<h3>{$userdata[8]} - {$userdata[9]}</h3>";}
								if(!empty($userdata[10])){ echo "<h3>Munkahelyek: {$userdata[10]}</h3>";}
								if(!empty($userdata[11])){ echo "<h3>{$userdata[11]}</h3>";}
								if(!empty($userdata[12])){ echo "<h3>{$userdata[12]}</h3>";}
								if(!empty($userdata[13])){ echo "<h3>{$userdata[13]}</h3>";}
								if(!empty($userdata[14])){ echo "<h3>Nyelvtudás: {$userdata[14]}</h3>";}
								if(!empty($userdata[15])){ echo "<h3>Hobbik: {$userdata[15]}</h3>";}
				echo '</div>';
			}
		//Ha nem volt eredmenye a keresesnek:
		}else{
			echo "<h3>Nincs ilyen nevű felhasználó</h3>";
		}
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
