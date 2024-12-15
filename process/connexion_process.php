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


// input sanitization
$pseudo = htmlspecialchars(trim($_POST['pseudo']));

if (
    strlen($pseudo) > 15
) {
    header('location: ../source/index.php');
    return;
}
// ----------------- SECU END -----------------





// Vérifiez si le pseudo a été soumis via un formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyer et sécuriser les données du formulaire
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));

    // Vérification si le pseudo existe déjà dans la base de données
    $sql = "SELECT id FROM player WHERE pseudo = :pseudo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();

    // Si le pseudo existe
    if ($stmt->rowCount() > 0) {
        // Récupérer l'ID du joueur et le stocker dans la session
        $player = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['pseudo'] = $pseudo; // Enregistrer le pseudo dans la session
        $_SESSION['player_id'] = $player['id']; // Enregistrer l'ID du joueur dans la session

        // Rediriger vers la page de choix du quiz ou une autre page
        header('Location: ../source/quiz_choice.php');
        exit;
    } else {
        // Si le pseudo n'existe pas, vous pouvez offrir la possibilité de s'inscrire
        $_SESSION['error'] = "Le pseudo '$pseudo' n'existe pas. Veuillez vous inscrire.";
        header('Location: ../source/index.php');
        exit;
    }
}











if (!empty($pseudo)) {
    // Vérifier si le pseudo existe déjà dans la table 'player'
    $sql = "SELECT COUNT(*) FROM player WHERE pseudo = :pseudo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR); // on récup variable sql :pseudo, pour lui donner la valeur de la variable php $pseudo, avec comme paramètre l'obligation d'une chaîne de caractères
    $stmt->execute();


    // Au count récupéré dans $stmt on lui applique la fonction qui retourne une colonne depuis la ligne suivante d'un jeu de résultats
    if ($stmt->fetchColumn() > 0) {
        // Si le pseudo existe déjà, rediriger avec un message d'erreur
        $_SESSION['error'] = "Le pseudo '$pseudo' existe déjà. Choisissez-en un autre.";
        header('location: ../source/index.php');
        exit;
    } else {
        // Si le pseudo est disponible on l'ajoute dans notre BDD
        $sql = "INSERT INTO player (pseudo) VALUES (:pseudo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        // On recup ici l'id du player qu'on a crée ou recupérer depuis la base de donné 
        $playerId = $pdo->lastInsertId();

        // Enregistrer le pseudo et l'ID du joueur dans la session
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['player_id'] = $playerId;

        // Rediriger vers la page de choix du quiz
        header('location: ../source/quiz_choice.php');
        exit;
    }
} else {
    // Si le pseudo est vide, rediriger vers l'index avec un message d'erreur
    $_SESSION['error'] = "Veuillez entrer un pseudo.";
    header('location: ../source/index.php');
    exit;
}




header('location: ../source/quiz_choice.php?pseudo=' . $pseudo);
