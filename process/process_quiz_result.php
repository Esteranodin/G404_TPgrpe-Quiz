<?php
require_once '../utils/connect_db.php';

session_start();
var_dump($_POST);
die();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['player_id'])) {
    echo "Utilisateur non connecté.";
    exit;
}

// Récupérer l'ID du joueur et du quiz
$player_id = $_SESSION['player_id'];
$id_quiz = isset($_POST['id_quiz']) ? $_POST['id_quiz'] : null;

if (!$id_quiz) {
    echo "Aucun quiz sélectionné.";
    exit;
}

// Initialiser le score
$score = 0;

// Vérifier si les réponses ont été soumises via le formulaire
if (isset($_POST['answers']) && is_array($_POST['answers'])) {
    foreach ($_POST['answers'] as $question_id => $answer_id) {
        // Vérifier la réponse correcte pour chaque question
        $sql = "SELECT is_right FROM answer WHERE id = :answer_id AND id_question = :question_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':answer_id' => $answer_id, ':question_id' => $question_id]);
        $answer = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si la réponse est correcte, incrémenter le score
        if ($answer && $answer['is_right'] == 1) {
            $score++;
        }
    }
} else {
    echo "Aucune réponse soumise.";
    exit;
}

// Vérifier si un score existe déjà pour ce joueur et ce quiz
$sql_check_existing_score = "SELECT * FROM score WHERE id_player = :player_id AND id_quiz = :id_quiz";
$stmt_check_existing_score = $pdo->prepare($sql_check_existing_score);
$stmt_check_existing_score->execute([':player_id' => $player_id, ':id_quiz' => $id_quiz]);
$existing_score = $stmt_check_existing_score->fetch(PDO::FETCH_ASSOC);

if ($existing_score) {
    // Si le score existe déjà, mettre à jour le score
    $sql_update_score = "UPDATE score SET score = :score WHERE id_player = :player_id AND id_quiz = :id_quiz";
    $stmt_update_score = $pdo->prepare($sql_update_score);
    $stmt_update_score->execute([':score' => $score, ':player_id' => $player_id, ':id_quiz' => $id_quiz]);
} else {
    // Si le score n'existe pas, insérer un nouveau score
    $sql_insert_score = "INSERT INTO score (id_player, id_quiz, score) VALUES (:player_id, :id_quiz, :score)";
    $stmt_insert_score = $pdo->prepare($sql_insert_score);
    $stmt_insert_score->execute([':player_id' => $player_id, ':id_quiz' => $id_quiz, ':score' => $score]);
}

// Afficher le score de l'utilisateur
echo "Votre score pour ce quiz est : $score";

?>
