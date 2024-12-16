<?php
require_once '../utils/connect_db.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../source/index.php');
    exit;
}


if (empty($_POST['pseudo'])) {
    $_SESSION['error'] = 'Le pseudo est obligatoire.';
    header('location: ../source/index.php');
    exit;
}

// Récupération et nettoyage du pseudo
$pseudo = htmlspecialchars(trim($_POST['pseudo']));

// Validation du format du pseudo (uniquement alphanumérique et entre 3 et 15 caractères)
if (!preg_match('/^[a-zA-Z0-9_]{3,15}$/', $pseudo)) {
    $_SESSION['error'] = 'Le pseudo doit être alphanumérique et comporter entre 3 et 15 caractères.';
    header('location: ../source/index.php');
    exit;
}

// Vérifie si le pseudo existe déjà dans la base de données
$sql = "SELECT COUNT(*) FROM player WHERE pseudo = :pseudo";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
$stmt->execute();
$countPseudo = $stmt->fetchColumn();

// Si le pseudo existe déjà 
if ($countPseudo > 0) {
    $_SESSION['error'] = "Le pseudo '$pseudo' existe déjà. Choisissez-en un autre.";
    header('location: ../source/index.php');
    exit;
}

// Si le pseudo est disponible, on l'ajoute dans la base de données
$insertSQL = "INSERT INTO player (pseudo) VALUES (:pseudo)";
$insertStmt = $pdo->prepare($insertSQL);
// Permet de d'insérer le pseudo avec la valeur de la variable $pseudo + obligatoirement une chaine de caractère.
$insertStmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR); 
$insertStmt->execute();

// On recupere le dernier Id et on le stocke dans id_player
$id_player = $pdo->lastInsertId();

// Enregistre le pseudo et l'ID du joueur dans la session
$_SESSION['pseudo'] = $pseudo;
$_SESSION['id_player'] = $id_player; 


header('location: ../source/quiz_choice.php');
exit;
