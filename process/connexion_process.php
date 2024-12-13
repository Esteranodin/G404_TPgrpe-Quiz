<?php

require_once '../utils/connect_db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../source/index.php');
    return;
}

if (
    !isset(
        $_POST['pseudo'],
    )
) {
    header('location: ../source/index.php?error=1');
    return;
}

if (
    empty($_POST['pseudo'])
   
) {
    header('location: ../source/index.php?error=2');
    return;
}

// si pseudo deja existant 

// si pas de session pas de quiz


// input sanitization
$pseudo = htmlspecialchars(trim($_POST['pseudo']));

if(
    strlen($pseudo) > 15 
) {
    header('location: ../source/index.php');
    return;
}


// requête sql


header('location: ../source/quiz_choice.php?pseudo=' . $pseudo);