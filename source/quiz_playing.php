<?php
require_once '../utils/connect_db.php';
session_start();

$sql = "SELECT `content` FROM `question` 
JOIN quiz on quiz.id = `id_quiz`
WHERE quiz.id = :id_quiz";

try {
    $stmt = $pdo->prepare($sql);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}
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
            <?php
        }
            ?>
    </section>

    <section class="answers">
        <?php
        foreach ($answers as $answer) {
        ?>
            <div class="answers">
                <?= $answer['content'] ?>
            <?php
        }
            ?>
    </section>
</body>

</html>