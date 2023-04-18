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
    <div class="manage-mainpage">
        <div class="manage-info">
            <h2>Dodaj grę</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Nazwa: </label>
                <input type="text" name="name">
                <br>
                <label for="">Opis: </label>
                <textarea name="description"> </textarea>
                <br>
                <label for="file">Okładka (.jpg): </label>
                <input type="file" id="image" name="image" accept="image/*">
                <br>
                <input type="submit" value="Prześlij gre">
            </form>
            <?php
            require "./../php/db.php";
            session_start();

            if (isset($_POST['name']) && isset($_POST['description']) && isset($_FILES['image'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $login = $_SESSION['login'];

                // Sprawdzamy jaki uzytkownik dodaje gre, by dodac jego id do bazy danych
                $checkUser = "SELECT id FROM logins WHERE login = '$login'";
                $result = mysqli_query($pdo, $checkUser);
                $row = $result->fetch_array();
                $id = $row['id'];


                $image_name = $_FILES['image']['name'];
                // Dane ktorych PHP potrzebuje do pliku
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_size = $_FILES['image']['size'];
                $image_error = $_FILES['image']['error'];

                // Zmienne ktore sa potrzebne do sprawdzenia czy format pliku jest zdjeciem oraz czy zgadza sie jego sciezka
                $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
                $allowed_exts = array('jpg', 'jpeg', 'png');

                // Faktyczne sprawdzenie tego co wyzej
                if (in_array($image_ext, $allowed_exts)) {
                    // Ustawienie zmiennej by przechowywala sciezke do zapisanie i nazwe pliku do przeniesienia, move uploaded file to funkcja do przenoszenia plikow
                    $image_dest = './../img/games/' . $image_name;
                    move_uploaded_file($image_tmp_name, $image_dest);

                    // Po przeniesieniu zdjecia do folderu, przenosza sie dane o grze do bazy danych
                    $query = "INSERT INTO games (name, description, id_owner) VALUES ('$name', '$description', '$id')";
                    $pdo->query($query);
                    echo '<p>Przesłaliśmy twoją grę</p>';
                } else {
                    echo '<p>Nieprawidłowy format pliku</p>';
                }
            }

            ?>
        </div>

        <div class="manage-info">
            <h2>Usuń swoje gry</h2>
            <?php

            $login = $_SESSION['login'];
            $checkUser = "SELECT id FROM logins WHERE login = '$login'";
            $result = mysqli_query($pdo, $checkUser);
            $row = $result->fetch_array();
            $id = $row['id'];


            $query = "SELECT games.id, name FROM games INNER JOIN logins ON games.id_owner = logins.id  WHERE logins.id ='$id'";
            $result = mysqli_query($pdo, $query);

            while ($row = $result->fetch_array()) {
                // W tym momencie kazda gre posiadane przez dane konto wyswietla sie w osobnym divie ale musi tez byc w formie, na wypadek jesli uzytkownik chcialby ja usunac
                // W momencie klikniecia usun przenosi sie do pliku delete_game.php
                echo '<div class="delete-game">';
                echo '<span>' . $row['name'] . '</span>';
                echo '<form method="POST" action="./../php/delete_game.php">';
                echo '<input type="hidden" name="game_id" value="' . $row['id'] . '">';
                echo '<button type="submit">Usuń grę </button>';
                echo '</form>';
                echo '</div>';
            }



            ?>
        </div>
    </div>
    <!-- Mainpage -->
</body>

</html>