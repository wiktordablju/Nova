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
		<div class="nav-item"><a href="./library.html">Biblioteka</a></div>
		<div class="nav-item"><a href="./shop.html">Sklep</a></div>
		<div class="nav-item"><a href="./settings.php">Ustawienia</a></div>
	</nav>
	<!-- Koniec nawigacji -->

	<!-- Mainpage -->
	<div class="profile-mainpage">
		<div class="profile-info">
			<?php
			session_start();
			echo '<h2>PROFIL UZYTKOWNIKA </h2>';
			echo '<br />';
			echo '<p>Login: ' . $_SESSION['login'] . '</p>';
			echo '<p>Email: ' . $_SESSION['email']  . '</p>';
			echo '<p>Posiadane gry:</p>';
			echo '<button id="logout-btn">Wyloguj się</button>';
			?>
		</div>
	</div>
	<!-- Mainpage -->
	<script src="./../js/profile.js"></script>
</body>

</html>