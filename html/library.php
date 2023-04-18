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
	<?php

	require "./../php/db.php";
	session_start();

	$login = $_SESSION['login'];
	$checkUser = "SELECT id FROM logins WHERE login = '$login'";
	$result = mysqli_query($pdo, $checkUser);
	$row = $result->fetch_array();
	$id = $row['id'];
	echo '<h2 class="library-header">Biblioteka użytkownika ' . $login . '</h2>';

	?>
	<div class="library-display">
		<?php


		$query = "SELECT games.* FROM games JOIN user_library ON games.id = user_library.game_id WHERE user_library.user_id = '$id'";
		$result = mysqli_query($pdo, $query);

		while ($row = mysqli_fetch_assoc($result)) {
			echo '<div class="game">';
			echo '<form method="POST">';
			echo '<input type="hidden" name="game-id" value="' . $row['id'] . '">';
			echo '<button type="submit" name="remove-btn" class="remove-btn">USUN DO BIBLIOTEKI</button>';
			echo '</form>';
			echo '<div class="game-header">';
			echo '<img src="./../img/games/' . $row['name'] . '.jpg" alt="' . $row['name'] . '">';
			echo '</div>';

			echo '<div class="game-text">';
			echo '<h2>' . $row['name'] . '</h2>';
			echo '<br>';
			echo '<p>' . $row['description'] . '</p>';
			echo '</div>';
			echo '</div>';
		}

		if (isset($_POST['remove-btn'])) {
			$game_id = $_POST['game-id'];
			$remove_query = "DELETE FROM user_library WHERE user_id = '$id' AND game_id = '$game_id'";
			$result = mysqli_query($pdo, $remove_query);
			header('Location: ./library.php');
		}
		?>


	</div>
	<!-- Mainpage -->
</body>

</html>