<?php
require_once '../utils/connect_db.php';

session_start();

$id_quiz = $_POST['id_quiz'];

// ----------------- Requête pour récupérer les questions -----------------
$sql_questions = "SELECT content FROM question 
JOIN quiz on quiz.id = id_quiz
WHERE quiz.id = :id_quiz";


try {
    $stmt = $pdo->prepare($sql_questions);
    $stmt->execute([
        ':id_quiz' => $_POST['id_quiz']
    ]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

// ----------------- Requête pour récupérer les questions -----------------
// $sql_answers = "SELECT `content` FROM `question` 
// JOIN quiz on quiz.id = `id_quiz`
// WHERE quiz.id = :id_quiz";

// try {
//     $stmt = $pdo->prepare($sql_answers);
//     $stmt->execute([
//         ':id_quiz' => $_POST['id_quiz']
//     ]);
//     $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// } catch (PDOException $error) {
//     echo "Erreur lors de la requete : " . $error->getMessage();
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="questions">

        <?php
        foreach ($questions as $question) {
        ?>
            <div class="questions">
                <?= $question['content'] ?>
        </div>

            <?php
        }
            ?>
    </section>


    
</body>

</html>