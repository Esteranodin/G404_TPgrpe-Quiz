<?php

session_start();

?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/output.css">
</head>

<body>
    <h1>QUIZ</h1>

    <form action="../process/connexion_process.php" method="POST">


        <label for="pseudo">Votre pseudo</label>
        <br>
        <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo ici" required>
        <br>
        <button type="submit">Confirmer</button>
    </form>

    <?php
    // retravailler message si pas de js
    // $_SESSION['success'] = "Le pseudo '$pseudo' a été ajouté avec succès!";
    // Afficher un message d'erreur ou de succès
    // if (isset($_SESSION['error'])) {
    //     echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
    //     unset($_SESSION['error']);
    // } else if (isset($_SESSION['success'])) {
    //     echo '<p style="color:green;">' . $_SESSION['success'] . '</p>';
    //     unset($_SESSION['success']);
    // }
    ?>

</body>

</html>