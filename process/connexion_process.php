<?php

require_once '../utils/connect_db.php';

session_start();

$_SESSION['pseudo'];


// ----------------- SECU -----------------

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

// si pas de session pas de quiz
//ne fonctionne pas
if (
    !isset(
        $_SESSION['pseudo'])
    ) {
        header('location: ../source/index.php?error=1');
        return;
}

// input sanitization
$pseudo = htmlspecialchars(trim($_POST['pseudo']));

if (
    strlen($pseudo) > 15
) {
    header('location: ../source/index.php');
    return;
}
// ----------------- SECU END -----------------

if (isset($pseudo)) { 
  
    // Vérifier si le pseudo existe déjà dans la table 'player'
    $sql = "SELECT COUNT(*) FROM player WHERE pseudo = :pseudo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR); // on récup variable sql :pseudo, pour lui donner la valeur de la variable php $pseudo, avec comme paramètre l'obligation d'une chaîne de caractères
    $stmt->execute();

    $countPseudo = $stmt->fetchColumn(); // Au count récupéré dans $stmt on lui applique la fonction qui retourne une colonne depuis la ligne suivante d'un jeu de résultats 

    if ($countPseudo > 0) { 
        $_SESSION['error'] = "Le pseudo '$pseudo' existe déjà. Choisissez-en un autre.";
    } else {
        // Si le pseudo est disponible on l'ajoute dans notre BDD
        $insertSQL = "INSERT INTO player (pseudo) VALUES (:pseudo)";
        $insertStmt = $pdo->prepare($insertSQL);
        $insertStmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $insertStmt->execute();

        // Enregistrer le pseudo dans la session
        $_SESSION['pseudo'] = $pseudo;
    }
}

header('location: ../source/quiz_choice.php?pseudo=' . $pseudo);
