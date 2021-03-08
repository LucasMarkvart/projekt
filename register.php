<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registrace</title>
		
		
	</head>
	<body>
		<a href="login.php">jste již zaregistrovaný?klikněte zde</a>
		<hr>
			<div id="uvod">
				<h2>Registrace</h2>
				<br>
			<form action="insert.php" method="post">
				<input name="email" type="text" placeholder="Email">
				<?php

					if (isset($_SESSION['Mail'])) echo($_SESSION['Mail']);
					

				?>
				<br> <br> 
				<input name="heslo" type="password" placeholder="Heslo">
				<?php

					if (isset($_SESSION['Heslo'])) echo($_SESSION['Heslo']);
					

				?>
				<br> <br>
				<input name="heslo2" type="password" placeholder="Heslo znovu"> 
				<?php

					if (isset($_SESSION['Heslo2'])) echo($_SESSION['Heslo2']);
					
					

				?>
				<br> <br>
				<input name="nickname" type="text" placeholder="nickname">
				<?php

					if (isset($_SESSION['Nickname'])) echo($_SESSION['Nickname']);
					

				?>
				<br><br>
				<input type="submit" value="Zaregistrovat">
			</form>
			<br><br>
			<?php

					if (isset($_SESSION['registrace'])) echo($_SESSION['registrace']);
					session_destroy();

				?>
			</div>
	</body>
</html>