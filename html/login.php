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
	<div class="login-mainpage">
		<div class="login-content">
			<h2>LOGOWANIE</h2>
			<form action="login.php" method="post">
				<label for="">Login: </label>
				<input type="text" name="login" />
				<br />
				<label for="">Hasło</label>
				<input type="password" name="password" />
				<br />
				<input type="submit" name="" id="" value="Zaloguj" />
			</form>
			<p>
				Nie masz jeszcze konta?
				<span><a href="./register.php">Zarejestruj się</a></span>
			</p>

			<?php
			require './../php/db.php';
			if (isset($_POST['login'])) {
				$login = $_POST['login'];
				$password = $_POST['password'];
				$password = hash('sha256', $password);
				$query = "SELECT login, password, email FROM logins WHERE login = 	'$login' AND password = '$password'";
				$result = mysqli_query($pdo, $query);



				$row = $result->fetch_array();

				if ($row) { //W momencie w ktorym tutaj daje sie jakies wyrazenie typu if $row == x, to PHP wyrzuca blad o tym ze probujemy dzialac na nieistniejacych danych
					session_start();
					$_SESSION['logged'] = true;
					$_SESSION['login'] = $login;

					$_SESSION['email'] = $row['email'];
					header('Location: profile.php');
				} else {

					echo "<p><strong>Podane dane są nieprawidłowe</strong></p>";
				}
			}


			?>
		</div>
	</div>

	</div>
	<!-- Mainpage -->
</body>

</html>