<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>NOVA</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="./../css/main.css" />
</head>

<body>
	<!-- Nawigacja -->
	<nav>
		<div class="nav-item"><a href="./../index.html">Strona główna</a></div>
		<div class="nav-item"><a href="./library.php">Biblioteka</a></div>
		<div class="nav-item"><a href="./shop.php">Sklep</a></div>
		<div class="nav-item"><a href="./settings.php">Ustawienia</a></div>
	</nav>
	<!-- Koniec nawigacji -->

	<!-- Mainpage -->
	<div class="wrapper-settings">
		<div class="settings">
			<?php
			session_start();

			// Jesli uzytkownik jest zalogowany to zamiast "Zaloguj" pokazuje sie dostep do jego profilu
			if (isset($_SESSION['logged'])) {
				echo '<div class="setting" id="profile-btn">Profil</div>';
			} else {
				echo '<div class="setting" id="login-btn">Zaloguj</div>';
			}
			echo '<div class="setting" id="register-btn">Zarejestruj</div>';
			echo '<div class="setting" id="delete-acc-btn">Usuń konto</div>';
			?>
		</div>
	</div>

	<!-- Mainpage -->
	<script src="./../js/settings.js"></script>
</body>

</html>