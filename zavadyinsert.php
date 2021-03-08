<?php
	session_start();
	
	require_once "mainpage.php";
	require_once "DB.php";

	$nazev = $_POST["nazev"];
	$popis = $_POST["popis"];
	$typzavady = $_POST["typzavady"];
	$idusera = $_SESSION["id"];

	$mysqli = new mysqli("127.0.0.1", "root", "" , "projekt");			
	
	if ($mysqli->connect_error) {
               die("Spojení selhalo. " . $mysqli->connect_error);
             exit();
        }

	if (!empty($_POST["nazev"]) AND !empty($_POST["popis"]) AND !empty($_POST["typzavady"])) {
			$sql = "INSERT INTO zavady (nazev, popis, datumzadani, typzavady, user_id ) VALUES ('".$nazev."', '".$popis."', now(), '".$typzavady."', '".$idusera."' )";
		mysqli_query($mysqli, $sql);
		} 
	
	$idzavady = mysqli_insert_id($mysqli);
	mysqli_query($mysqli,"INSERT INTO zavadyinfo ( id_zavady ) VALUES ('".$idzavady."' )");
	
	$mysqli->close();
	header("location: mainpage.php")
	/*
	if (!empty($_POST["nazev"]) AND !empty($_POST["popis"]) AND !empty($_POST["typzavady"])) {
						
		$sql = "INSERT INTO zavady (nazev, popis, datumzadani, typzavady, user_id ) VALUES (:Docasnynazev, :Docasnypopis, now(), :Docasnytypzavady, $idusera )";
		$sqlProvedeni = db() ->prepare($sql);
		$sqlProvedeni -> execute(array(':Docasnynazev' => $nazev, ':Docasnypopis' => $popis,
							':Docasnytypzavady' => $typzavady ) );				
	} else {
			echo "succ my pp";
	}

	
	$eskveel = "SELECT id FROM zavady WHERE user_id = '".$idusera."'";
	
	


	

	$sql2 = "INSERT INTO zavadyinfo (stav, zavada_id ) VALUES ("'k vyrizeni'",  )";
	$sqlProvedeni3 = db() ->prepare($sql);
	$sqlProvedeni3 -> execute(array( ) );
	*/
		
	
?>