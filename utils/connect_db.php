<?php
try {
    $host = "localhost";
    $dbname = "quiz_td";
    $login = "root";
    $password = "";

    $pdo = new PDO("mysql:host={$host};dbname={$dbname}", $login, $password);



} catch (PDOException $error) {
    echo "Erreur de connexion : " . $error->getMessage();
}

?>