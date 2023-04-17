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
        <div class="nav-item"><a href="./shop.php">Sklep</a></div>
        <div class="nav-item"><a href="./settings.php">Ustawienia</a></div>
    </nav>
    <!-- Koniec nawigacji -->

    <!-- Mainpage -->
    <div class="manage-mainpage">
        <div class="manage-info">
            <h2>Dodaj grę</h2>
            <form action="" method="post">
                <label for="">Nazwa: </label>
                <input type="text" name="name">
                <br>
                <label for="">Opis: </label>
                <textarea name="description"> </textarea>
                <br>
                <input type="submit" value="Prześlij gre">
            </form>
        </div>
        <div class="manage-info">
            <h2>Usuń grę</h2>
            <form action="" method="post">
                <label for="">Nazwa: </label>
                <input type="text" name="name">
                <br>
                <label for="">Opis: </label>
                <textarea name="description"> </textarea>
                <br>
                <input type="submit" value="Usuń gre">
            </form>
        </div>
    </div>
    <!-- Mainpage -->
</body>

</html>