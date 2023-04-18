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
			<h2>USUŃ KONTO</h2>
			<form action="" method="post">
				<label for="">Login: </label>
				<input type="text" name='login' />
				<br />
				<label for="">Hasło: </label>
				<input type="password" name="password" />
				<br />
				<label for="">Powtórz login: </label>
				<input type="text" name="loginRepeat" />
				<br />
				<label for="">Powtórz hasło: </label>
				<input type="password" name="passwordRepeat" />
				<br />
				<input type="submit" name="" id="" value="USUŃ" />
			</form>
			<?php
			require "./../php/db.php";

			if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['loginRepeat']) && isset($_POST['passwordRepeat'])) {
				$login = $_POST['login'];
				$password = $_POST['password'];
				$loginRepeat = $_POST['loginRepeat'];
				$passwordRepeat = $_POST['passwordRepeat'];

				if ($password == $passwordRepeat && $login == $loginRepeat) {
					$password = hash('sha256', $password);
					$checkQuery = "SELECT login, password FROM logins WHERE login = '$login' AND password = '$password' ";

					$result = mysqli_query($pdo, $checkQuery);
					$row = $result->fetch_array();

					if ($row['login'] == $login && $row['password'] = $password) {
						session_start();
						session_destroy();
						$deleteQuery = "DELETE FROM logins WHERE login = '$login' AND password = '$password'";
						$pdo->query($deleteQuery);
						echo '<p>Usuneliśmy twoje konto z naszego serwisu</p>';
					}
				}
			}



			?>
		</div>
	</div>
	<!-- Mainpage -->
</body>

</html>