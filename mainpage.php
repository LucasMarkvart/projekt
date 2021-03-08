<?php
	session_start();
	require_once "DB.php";
	echo "vítejte uživateli:";
	echo $_SESSION["email"];
	if (!isset($_SESSION["email"])) {
		header("location: login.php");
	}
	$userid = $_SESSION["id"];
	
	$mysqli = new mysqli("127.0.0.1", "root", "" , "projekt");
	$vysledkos = $mysqli->query("SELECT user_id FROM userinfo WHERE user_id = '".$userid."'");
	if($vysledkos->num_rows == 0) {
    	$sql = "INSERT INTO userinfo ( user_id ) VALUES ( :userid)";
		$sqlProvedeni = db() ->prepare($sql);
		$sqlProvedeni -> execute(array("userid" => $userid)); 
	} 
	
	$vysledek = $mysqli->query("SELECT pozice FROM userinfo WHERE user_id = '".$userid."' AND pozice = 'technik'");
	if($vysledek->num_rows == 0) {
    	echo ", jste user.";
	} else {
		header("location:technikpage.php");
	}

	$vysledek2 = $mysqli->query("SELECT pozice FROM userinfo WHERE user_id = '".$userid."' AND pozice = 'admin'");
	if($vysledek2->num_rows == 0) {
    	//echo ", jste user.";
	} else {
		header("location:adminpage.php");
	}
	

	$mysqli->close();


?>
	

<!DOCTYPE html>
<html>
	<head>
		<title>hey</title>
		<link rel="stylesheet" type="text/css" href="mainpage.css">
	</head>
	
	
	
	<body>
		
	<div id="cela">
		<div id="head">
			<h1>mainpage</h1>
		</div>
			<a  href="logout.php">
			<img id="logoutek" src="Logout-512.webp" border="0" width="25px" height="25px" >
			</a>
			<div id="content">
			<form action="zavadyinsert.php" method="post">
				<h2>závady</h2>
				<input name="nazev" type="text" placeholder="nazev">
				
				<br> <br> 
				<textarea name="popis" cols="40" rows="5" placeholder="popis"></textarea> 
				
				<br> <br>
				<input name="typzavady" type="text" placeholder="typzavady"> 
				
				<br> <br>
				<input type="submit" value="odeslat">
			</form>
			
		<div>
			
		</div>
		</div>
		
		<div id="side">
			
		</div>

		<div id="footer">
			
			
		</div>





	</div>
	</body>
</html>
