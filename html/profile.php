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
	<div class="profile-mainpage">
		<div class="profile-info">
			<?php
			require "./../php/db.php";
			session_start();
			$login = $_SESSION['login'];

			$checkUser = "SELECT id FROM logins WHERE login = '$login'";
			$result = mysqli_query($pdo, $checkUser);
			$row = $result->fetch_array();
			$id = $row['id'];

			$countQuery = "SELECT COUNT(*) as gameCount FROM user_library WHERE user_id = '$id'";
			$countResult = mysqli_query($pdo, $countQuery);
			$countRow = $countResult->fetch_array();
			$gameCount = $countRow['gameCount'];


			echo '<br />';
			echo '<p>Login: ' . $_SESSION['login'] . '</p>';
			echo '<p>Email: ' . $_SESSION['email']  . '</p>';
			echo '<p>Posiadane gry: ' . $gameCount . '</p>';
			echo '<button id="logout-btn">Wyloguj się</button>';
			echo '<button id="manage-btn">Zarządzaj swoimi grami</button>'
			?>
		</div>
	</div>
	<!-- Mainpage -->
	<script src="./../js/profile.js"></script>
</body>

</html>