<?php
require_once '../utils/connect_db.php';

session_start();

// Vérification de l'ID du quiz dans la requête
if (isset($_POST['id_quiz']) && !empty($_POST['id_quiz'])) {
    $id_quiz = $_POST['id_quiz'];
} else {
    echo "Aucun quiz sélectionné.";
    exit;
}

// Vérification de l'ID du joueur dans la session
if (!isset($_SESSION["player_id"])) {
    echo "Utilisateur non connecté.";
    exit;
}

// Récupérer les questions associées au quiz
$sql = "SELECT * FROM question WHERE id_quiz = :id_quiz";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id_quiz' => $id_quiz]);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la question actuelle à afficher en fonction de l'index
$question_index = isset($_POST['question_index']) ? (int)$_POST['question_index'] : 0;
$total_questions = count($questions);

// Si la question actuelle dépasse le nombre de questions, rediriger vers la page de résultats
if ($question_index >= $total_questions) {
    header("Location: ../process/process_quiz_result.php");
    exit;
}

// Obtenir la question actuelle
$current_question = $questions[$question_index];

// Récupérer les réponses pour la question actuelle
$sql_answers = "SELECT * FROM answer WHERE id_question = :id_question";
$stmt_answers = $pdo->prepare($sql_answers);
$stmt_answers->execute([':id_question' => $current_question['id']]);
$answers = $stmt_answers->fetchAll(PDO::FETCH_ASSOC);

// Vérification si la réponse est correcte
$selected_answer = isset($_POST['answer']) ? $_POST['answer'] : null;
$is_correct = null;

if ($selected_answer) {
    // Vérifier si la réponse sélectionnée est correcte
    $sql_check_answer = "SELECT is_right FROM answer WHERE id = :answer_id";
    $stmt_check_answer = $pdo->prepare($sql_check_answer);
    $stmt_check_answer->execute([':answer_id' => $selected_answer]);
    $result = $stmt_check_answer->fetch(PDO::FETCH_ASSOC);

    // Si is_right == 1, la réponse est correcte
    if ($result && $result['is_right'] == 1) {
        $is_correct = true;
    } else {
        $is_correct = false;
    }
}

// Fonction pour vérifier si la donnée est une chaîne avant de l'échapper
function safe_htmlspecialchars($data) {
    return is_string($data) ? htmlspecialchars($data, ENT_QUOTES, 'UTF-8') : $data;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <!-- Lien vers Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lien vers le fichier JS -->
    <script src="script.js" defer></script>
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Quiz: <?= safe_htmlspecialchars($id_quiz) ?></h1>
        <h2 class="text-xl mb-6">Question <?= $question_index + 1 ?> / <?= $total_questions ?></h2>

        <form action="quiz_playing.php" method="POST">
    <p class="text-lg mb-4"><?= safe_htmlspecialchars($current_question['content']) ?></p>

    <!-- Affichage des réponses sous forme de div cliquables -->
    <div class="space-y-4">
        <?php foreach ($answers as $answer) : ?>
            <div 
                class="answer-option p-4 bg-gray-200 rounded-lg border border-gray-400 cursor-pointer hover:bg-gray-300 transition duration-300"
                id="answer-<?= $answer['id'] ?>" 
                onclick="selectAnswer(<?= $answer['id'] ?>)">
                <label class="block"><?= safe_htmlspecialchars($answer['content']) ?></label>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Champ caché pour stocker la réponse sélectionnée -->
    <input type="hidden" name="answers[<?= $current_question['id'] ?>]" id="selected_answer" value="<?= safe_htmlspecialchars($selected_answer) ?>">

    <!-- Champ caché pour le numéro de la question suivante -->
    <input type="hidden" name="question_index" value="<?= $question_index + 1 ?>">

    <!-- Ajouter l'ID du quiz pour qu'il soit transmis au serveur -->
    <input type="hidden" name="id_quiz" value="<?= safe_htmlspecialchars($id_quiz) ?>">

    <!-- Bouton Valider désactivé par défaut -->
    <button type="submit" id="submitBtn" class="w-full py-2 px-4 bg-blue-500 text-white rounded-lg disabled:bg-gray-400" disabled>Valider</button>
</form>

    </div>

    <script>
        // Fonction pour sélectionner une réponse
        function selectAnswer(answerId) {
            document.getElementById('selected_answer').value = answerId;
            document.getElementById('submitBtn').disabled = false;
        }
    </script>

</body>
</html>
