<?php
	session_start();

	require_once "DB.php";

		$email = $_POST["email"];
		$heslo = sha1($_POST["heslo"]);

	if (!empty($_POST["email"]) AND !empty($_POST["heslo"])) {



		$sql = "SELECT * FROM user WHERE email = :email AND password = :heslo";
		$sqlProvedeni = db()->prepare($sql);
		$sqlProvedeni->execute(array(':email' => $email, ':heslo' => $heslo));
		$pom = $sqlProvedeni->fetchAll();
		$idk = $sqlProvedeni -> rowcount();

		$_SESSION["id"] = $pom[0]["id"];
		$_SESSION["email"] = $pom[0]["email"];
		$_SESSION["lvl"] = $pom[0]["admin"];

		

		if ($idk == 1 ) {

			header("location: mainpage.php");

		} else {
			$prihlaseni1 = " -<span style='color: red'> Špatně zadané heslo nebo mail!</span>";
			$_SESSION['Prihlaseni'] = $prihlaseni1 . $pom['email'];
			header("location: login.php");
		}

	} 

	if (empty($_POST["email"]) AND empty($_POST["heslo"])) {
		
	
		if (empty($email)) {
			$kontrolamailu = " -<span style='color: red'> E-mail musí být vyplněn!</span>";
			$_SESSION['Mail'] = $kontrolamailu;
			
		}
		elseif (empty($heslo)) {
			$kontrolahesla = " -<span style='color: red'> Heslo musí být vyplněno!</span>";
			$_SESSION['Heslo'] = $kontrolahesla;
			
		} 
		$_SESSION['usr_name'] = $pomoc['email'];
		header("location: login.php");
	}
	
?>