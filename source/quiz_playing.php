<?php
require_once '../utils/connect_db.php';

session_start();




// Vérification que l'ID du quiz est bien passé en POST
if (!isset($_POST['id_quiz'])) {
    header('Location: ./quiz_choice.php');
    exit;
}

$id_quiz = $_POST['id_quiz']; // Récupérer l'ID du quiz depuis la requête POST

// ----------------- Requête pour récupérer les questions -----------------
$sql_questions = "SELECT id, content FROM question WHERE id_quiz = :id_quiz";
try {
    $stmt = $pdo->prepare($sql_questions);
    $stmt->execute([ ':id_quiz' => $id_quiz ]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requête des questions : " . $error->getMessage();
    exit;
}

// ----------------- Requête pour récupérer les réponses -----------------
$sql_answers = "SELECT id, content, is_right FROM answer WHERE id_question = :id_question";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Question et Réponses</title>
</head>

<body>
    <h1>Quiz: Répondez aux questions</h1>

    <form action="quiz_result.php" method="post">
        <?php
        // Affichage des questions et des réponses
        foreach ($questions as $question) {
        ?>
            <div class='question'>
                <h3><?= htmlspecialchars($question['content']); ?></h3>

                <div class='answers'>
                    <?php
                    // Préparer et exécuter la requête pour récupérer les réponses liées à la question
                    $stmt_answers = $pdo->prepare($sql_answers);
                    $stmt_answers->execute([':id_question' => $question['id']]);
                    $answers = $stmt_answers->fetchAll(PDO::FETCH_ASSOC);

                    // Afficher chaque réponse sous forme de cases à cocher
                    foreach ($answers as $answer) {
                    ?>
                        <label>
                            <input type="checkbox" name="answers[<?= $question['id'] ?>][]" value="<?= $answer['id'] ?>" />
                            <?= htmlspecialchars($answer['content']); ?>
                        </label><br>
                    <?php
                    }
                    ?>
                </div>
            </div><br>
        <?php
        }
        ?>

        <button type="submit">Valider</button>
    </form>
</body>

</html>
