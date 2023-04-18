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
	<div class="shop-display">
		<h2>Przeglądaj gry</h2>
		<div class="games">
			<?php
			require "./../php/db.php";
			$query = "SELECT * FROM games";
			$result = mysqli_query($pdo, $query);

			while ($row = $result->fetch_array()) {
				echo '<div class="game">';
				echo '<form method="post" action="./../php/add_to_library.php">';
				echo '<input type="hidden" name="game_id" value="' . $row['id'] . '">';
				echo '<button type="submit" class="add-btn">DODAJ DO BIBLIOTEKI</button>';
				echo '</form>';
				echo '<div class="game-header">
			<img src="./../img/games/' . $row['name'] . '.jpg" 
			alt="' . $row['name'] . '">
			</div>';
				echo '<div class="game-text">
					<h2>' . $row['name'] . '</h2>
					<br>
					<p>'
					. $row['description'] .
					'</p>
				</div>';
				echo '</div>';
			}
			?>

		</div>
	</div>
	<!-- Mainpage -->
</body>

</html>
