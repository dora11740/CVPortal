<?php


//ezzel a fuggvennyel kapcsolodunk fel az adatbazisra a helyi szerveren:
function connect(){ 

	//ertekul adjuk a mysqli altal vart adatokat valtozoknak, hogy konnyebb legyen oket atadni peldanyositaskor:
	$host="localhost";
	//a szerver ip cimet szamokkal is megadhatnank
	$user="root";
	//az alapertelmezett usert hasznaljuk
	$password="";
	//a rootnak alapertelmezesben nincs jelszava
	$db="cvportal";
	//ez az adatbazisunk neve, amit az apphoz hasznalunk
	
	$mysqli=new mysqli($host, $user, $password, $db);
	//a mysqli peldanyositasaval letrejon a kapcsolat. Mikor peldanyositjuk, fogja varni a cimet (szerver ip cim), a felhasznalot es a hozza tartozo jelszot, valamint az elerni kivant adatbazis nevet. Ezeket adtuk at neki a fentebbi valtozokban.
	
	return $mysqli;
	//a fuggveny visszater a letrejott kapcsolattal
}



//fuggveny amiben megnezzuk regisztralasnal, hogy van-e mar user ezzel a felhasznalonevvel vagy email cimmel. A newuser.php hasznalja.
function checkExistingUser($mysqli, $email, $username){
	
	//megnezzuk, hogy a beirt felhasznalonev vagy email cim szerepel-e mar az adatbazis relevans mezoiben:
	$sql="select email,username from users where username='$username' or email='$email'";
	//valtozoba mentjuk a fentebbi $sql valtozoba mentett parancshoz tartozo queryt. Ha hiba van, megoli a queryt:
	$result=$mysqli->query($sql) or die($mysqli->error);
	
	//a fentebbi query-t hasznalva lekerjuk az osszes eredmenyt. Ha tobb, mint 0 eredmenyt kapunk vissza, mar van felhasznalo valamelyik adattal. Ha 0 jon vissza, akkor pedig meg nincs (tehat lehet regisztralni): 
	if(count($result->fetch_all())!=0){
		return true;
	} 
	return false;
	//nem else agban van a return false, mert ha az if teljesul, akkor idaig mar ugysem fog eljutni a fuggveny
}



//fuggveny ami uj usert hoz letre, vagyis felveszi az uj adatokat az adatbazisba. A newuser.php hasznalja.
function createNewUser($mysqli, $email, $username, $password){
	
	//a felhasznalo altal bevitt adatokat elmenti a relevans mezokbe az adatbazisban:
	$sql="INSERT INTO users(email, username, password) VALUES ('{$email}','{$username}','{$password}')";
	$mysqli->query($sql) or die($mysqli->error);
}



//fuggveny, ami bejelentkezeskor megnezi, van-e mar ilyen user. A loginaction.php-ben hasznaljuk.
function tryLogIn($mysqli, $username, $password){
	
	//megnezzuk, hogy van-e felhasznalo az adatbazisban a begepelt felhasznalonevvel es jelszoval: 
	$sql="select username,password from users where username='{$username}' and password='{$password}'";
	$result=$mysqli->query($sql) or die($mysqli->error);
	//lekerjuk a query eredmenyet. Eleg a fetch_assoc mert ugy is csak 0 vagy 1 felhasznalo letezhet egy adott felhasznalonevvel):
	$user=$result->fetch_assoc();
	
	//Ha a fetch_assoc uresen tert vissza, akkor hibas a felhasznalonev vagy jelszo, egyeb esetben van ilyen felhasznalo (tehat be lehet jelentkezni ezekkel az adatokkal).
	if(empty($user)){
		return false;
	}else{
		return true;
	}
}



//fuggveny ami lekeri egy user osszes adatat az adatbazisbol. A loginaction.php es az updatecvaction.php hasznaljak.
function getUserData($mysqli, $username){
	
	//a bejelentkezo/bejelentkezett felhasznalo felhasznalonevhez tartozo osszes mezo adatait lekerjuk az adatbazisbol (kiveve a jelszot). 
	$sql="select email,username,nev,cim,telefon,iskola1,vegzettseg1,iskola2,vegzettseg2,iskola3,vegzettseg3,munka1,munka2,munka3,munka4,nyelvek,hobbik from users where username='{$username}'";
	$result=$mysqli->query($sql) or die($mysqli->error);
	
	//lekerjuk a query eredmenyet. Eleg a fetch_assoc mert ugy is csak 0 vagy 1 felhasznalo letezhet egy adott felhasznalonevvel):
	$userData=$result->fetch_assoc();
	//visszaterunk a lekert adatokkal:
	return $userData;
}



//ez a fuggveny tolti fel az adatbazisba a user adatait, amit az oneletrajz urlapnal megadott. Ha mar volt korabban adat valamelyik mezoben, felulirodik (ures mezo nem ir felul nem ureset). Az updatecvaction.php hasznalja.
function updateCV($mysqli, $email, $newData){
	
	//a $newData kulcs-ertek parokat tartalmaz. Itt az adatbazis mezoihez hozzarendeljuk az ugyanugy elnevezett kulcshoz kapott ertekeket (ezeket a user viszi be az urlapot kitoltve):
	$sql="UPDATE users SET nev='{$newData["nev"]}',cim='{$newData["cim"]}',telefon='{$newData["telefon"]}',iskola1='{$newData["iskola1"]}',vegzettseg1='{$newData["vegzettseg1"]}',iskola2='{$newData["iskola2"]}',vegzettseg2='{$newData["vegzettseg2"]}',iskola3='{$newData["iskola3"]}',vegzettseg3='{$newData["vegzettseg3"]}',munka1='{$newData["munka1"]}',munka2='{$newData["munka2"]}',munka3='{$newData["munka3"]}',munka4='{$newData["munka4"]}',nyelvek='{$newData["nyelvek"]}',hobbik='{$newData["hobbik"]}' WHERE email='{$email}'";		
	$mysqli->query($sql) or die($mysqli->error);
}



//fuggveny a keresohoz, a keresesaction.php hasznalja.
function search($mysqli, $keyword){
	
	//az adatbazisbol kivalasztjuk az osszes mezot (kiveve felhasznalonev es jelszo), ahol a nev mezoben szerepel a keresobe beirt keyword:
	$sql="select email,nev,cim,telefon,iskola1,vegzettseg1,iskola2,vegzettseg2,iskola3,vegzettseg3,munka1,munka2,munka3,munka4,nyelvek,hobbik from users where nev like '%$keyword%'";
	$result=$mysqli->query($sql) or die($mysqli->error);
	
	//az osszes ilyen usert lekerjuk az adatbazisbol (ugyanaz a kereszt-, vezeteknev, vagy akar teljes nev is tartozhat tobb userhez is, ezert tobb eredmeny is lehet, fetch_all kell):
	$userData=$result->fetch_all();
	//visszaterunk a kapot adatokkal:
	return $userData;
}

?>