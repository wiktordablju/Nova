<?php
require "./../php/db.php";
session_start();

// Sprawdzenie jaki uzytkownik jest zalogowany i przejecie jego id
$login = $_SESSION['login'];
$checkUser = "SELECT id FROM logins WHERE login = '$login'";
$result = mysqli_query($pdo, $checkUser);
$row = $result->fetch_array();
$id = $row['id'];


// Dodanie gry do danego uzytkownika bazujac na id dodawanej gry oraz id zalogowanego uzytkownika
if (isset($id) && isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];

    $query = "INSERT INTO user_library (user_id, game_id) VALUES ('$id', '$game_id')";
    mysqli_query($pdo, $query);
}

header('Location: ./../html/library.php');
