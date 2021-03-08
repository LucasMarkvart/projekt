<?php
	session_start();

	require_once "DB.php";


	function heslo($value) {
		if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/', $value)) {
		    return true;
		} else {
			return false;
		}
	}


		$email = $_POST["email"];
		$heslo = $_POST["heslo"];
		$heslo2 = $_POST["heslo2"];
		$nickname = $_POST["nickname"];
		$sha = sha1($heslo);
		//$userid = $_SESSION["id"];
		




	
	if (!empty($_POST["email"]) AND !empty($_POST["heslo"]) AND !empty($_POST["heslo2"]) AND !empty($_POST["nickname"])) {
		if (!kontrolamailu2($_POST["email"])) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL) == true AND heslo($heslo) == true AND $heslo == $heslo2) {
				$sql = "INSERT INTO user (email, password, nickname) VALUES (:Docasnyemail, :Docasnyheslo, :Docasnynickname)";
				$sqlProvedeni = db() ->prepare($sql);
				$sqlProvedeni -> execute(array(':Docasnyemail' => $email, ':Docasnyheslo' => $sha, ':Docasnynickname' => $nickname));
				$registrace = " -<span style='color: green'> Úspešně zaregistrován!</span>";
				$_SESSION['registrace'] = $registrace;
				header("location: login.php");			
			}	
		} else {
			$mrdkazkurvena = " -<span style='color: red'> Tento email již exituje!</span>";
			$_SESSION['Mail'] = $mrdkazkurvena;
			header("location: register.php");
		}
	}

	//email
	if (empty($email)) {
		$kontrolamailu = " -<span style='color: red'> E-mail musí být vyplněn!</span>";
		$_SESSION['Mail'] = $kontrolamailu;
	} elseif (filter_var($email, FILTER_VALIDATE_EMAIL)== false) {
		$kontrolamailu = " -<span style='color: red'> Váš e-mail nesplňuje požadavky!</span>";
		$_SESSION['Mail'] = $kontrolamailu;
	}

	//stejnyemail
    function kontrolamailu($email) {
    $connection = db();
    $sql2 = "SELECT * FROM user WHERE email=:Docasnyemail";
    $statement = $connection->prepare($sql2);
    $haha = array(':Docasnyemail' => $email);
    $statement-> execute($haha);
    //print_r($kokotina);
    return $statement;
    }

    function kontrolamailu2($email) {
    	$result = kontrolamailu($email);
    	return $result->rowCount() > 0;
    }

    

    
	    /*
    $vsechnymaily = "SELECT email from user";
    $allmail = $connection->prepare($vsechnymaily);
    $kokotina2 = array();
    $allmail-> execute($kokotina2);
    var_dump($kokotina2);*/
 	
 	



	//heslo
	if (heslo($heslo) == true) {
		
	} elseif (empty($heslo)) {
		$kontrolahesla = " -<span style='color: red'> Heslo musí být vyplněno!</span>";
		$_SESSION['Heslo'] = $kontrolahesla;
	} else {
		$kontrolahesla = " -<span style='color: red'> Vaše heslo nesplňuje požadavky!</span>";
		$_SESSION['Heslo'] = $kontrolahesla;
	}

	//kontrola hesla
	if ($heslo != $heslo2) {

		$kontrolahesla2 = " -<span style='color: red'> Hesla se musí shodovat!</span>";
		$_SESSION['Heslo2'] = $kontrolahesla2;
		
	} elseif (empty($heslo)) {
		$kontrolahesla2 = " -<span style='color: red'> Heslo musíte napsat znovu!</span>";
		$_SESSION['Heslo2'] = $kontrolahesla2;
	} 





	
	
?>