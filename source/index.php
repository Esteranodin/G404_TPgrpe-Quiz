<?php

session_start();


$_SESSION['pseudo'] = $_POST['pseudo'];





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
    <section class = "pseudo"> 
<h2>Votre pseudo</h2>
<form action="" method="POST">


    <label for="pseudo">Votre pseudo</label> 
    <br>
    <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo ici" required> 
    <br>
    <button type="submit">Confirmer</button>
</form>
    </section>
</body>
</html>