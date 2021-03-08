<?php
	require_once "DB.php";
	session_start();
	echo "vítejte uživateli: ";
	echo $_SESSION["email"];
	echo ", jste technik.";
	if (!isset($_SESSION["email"])) {
		header("location: login.php");
	}
?>
	

<!DOCTYPE html>
<html>
	<head>
		<title>hey</title>
		<link rel="stylesheet" type="text/css" href="technikpage.css">
	</head>
	
	
	
	<body>
		
	<div id="cela">
		<div id="head">
			<h1>adminpage</h1>
		</div>
			<a  href="logout.php">
			<img id="logoutek" src="Logout-512.webp" border="0" width="25px" height="25px" >
			</a>
			<div id="content">
			<?php

				$sql = "SELECT * FROM zavady ORDER BY ID ";
				$sqlProvedeni = db()->prepare($sql);
				$sqlProvedeni->execute();
				$pom = $sqlProvedeni->fetchAll();
				$pomoc = $sqlProvedeni->fetch(PDO::FETCH_ASSOC);
				
				foreach ($pom as $value) {
					echo '<div id="zavadyselect">'  .'<div id="nazevselect">' . $value['nazev'] . '</div>'. ' ' . '<div id="popisselect">' . $value['popis'] . '</div>'  . ' ' . '<div id="typzavadyselect">' . $value['typzavady'] . '</div>' . ' ' . '<div id="datumzadaniselect">' . $value['datumzadani']. '</div>' . '<br>' . '</div>' ;



				}
			?>
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
