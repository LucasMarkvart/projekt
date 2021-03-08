<?php
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
		
	</head>
	<body>
		
		<hr>
			
				<h2>Přihlášení</h2>
				<br>
			
			<form action="loginfnc.php" method="post">
				<input name="email" type="text"  placeholder="Email">
				<?php

					if (isset($_SESSION['Mail'])) echo($_SESSION['Mail']);


				?>
				<br><br>
				<input name="heslo" type="password" placeholder="Heslo">
				<?php

					if (isset($_SESSION['Heslo'])) echo($_SESSION['Heslo']);
					

				?>
				<br><br>
				<input type="submit" value="Přihlásit">
				<br><br>
				<?php

					if (isset($_SESSION['Prihlaseni'])) {
						echo($_SESSION['Prihlaseni']);
					}
					session_destroy();

				?>
			</form>
			
	</body>
</html>