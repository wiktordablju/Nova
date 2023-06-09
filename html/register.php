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
	<div class="register-mainpage">
		<div class="register-content">
			<h2>REJESTRACJA</h2>
			<form action="register.php" method="post">
				<div class="labels">
					<label for="">Email: </label>
					<br />
					<label for="">Login: </label>
					<br />
					<label for="">Hasło: </label>
					<br />
					<label for="">Powtórz hasło: </label>
					<br />
					<label for="regulations">Zaakceptowałem
						<a href="./regulations.html">warunki serwisu</a> NOVA</label>
				</div>
				<div class="inputs">
					<input type="text" name="email" />
					<br />
					<input type="text" name="login" />
					<br />
					<input type="password" name="password" />
					<br />
					<input type="password" name="repeatPassword" />
					<br />
					<input type="checkbox" name="accept" />
				</div>
				<br />
				<br />
				<br />
				<input type="submit" name="submit" id="" value="Zarejestruj" />
			</form>
			<?php
			require_once "./../php/db.php";


			if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) ** isset($_POST['repeatPassword'])) {
				$login = $_POST['login'];
				$password = $_POST['password'];
				$repeatPassword = $_POST['repeatPassword'];
				$email = $_POST['email'];
				if ($_POST['accept']) {
					$accept = $_POST['accept'];
				}

				if ($accept) {
					// Jesli zarowno obydwa hasla sie zgadzaja oraz uzytkownik zaakceptowal regulamin to dodawane sa do bazy informacje o uzytkowniku
					if ($password == $repeatPassword && $accept) {
						$password = hash('sha256', $password);
						$query = "INSERT INTO logins (login, password, email) VALUES ('$login', '$password', '$email')";
						$pdo->query($query);
						echo '<p>Zarejestrowano użytkownika ' . $login .  '</p>';
					} else if ($password != $repeatPassword) {
						echo '<p>Podane hasło nie jest poprawne</p>';
					}
				} else {
					echo '<br><p>Nie zaakceptowałeś regulaminu</p>';
				}
			}
			?>
			<p>
				Masz już konto?
				<span><a href="./login.php">Zaloguj się</a></span>
			</p>
		</div>
	</div>
	<!-- Mainpage -->
</body>

</html>