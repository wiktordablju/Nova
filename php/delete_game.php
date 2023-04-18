<?php
require './db.php';


// Usuwa gre z podanym id na stronie manage.php
if (isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];
    $query = "DELETE FROM games WHERE id = $game_id";
    mysqli_query($pdo, $query);
    header('Location: ./../html/manage.php');
} else {
    echo '<p>Błąd</p>';
}
