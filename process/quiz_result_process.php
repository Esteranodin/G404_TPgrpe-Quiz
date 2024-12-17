<?php

require_once '../utils/connect_db.php';
session_start();

$score = 0 ; // on initie une variable pour stocker score


// création de variables pour stocker les réponses du for each en dessous dans des tableaux que l'on pourra comparer ensuite = bonne réponse
$userAnswer = array();
$answerCompare = array();


// pour chaque resultat en post de réponse on récupère dans answer id_question + id de answer
foreach ($_POST["answers"] as $id_question => $id_answer) {

    // récupère id de answer
    // où id_question = id_question récupéré dans le for each et devient une nouvelle variable sql
    // + id de answer devient le resultat stocké dans la variable sql
    $sqlUserAnswer = "SELECT id FROM answer 
        WHERE id_question = :id_question 
        AND id = :id_answer";

    try {

        $stmt = $pdo->prepare($sqlUserAnswer);

        $stmt->bindParam(':id_question', $id_question, PDO::PARAM_INT);
        $stmt->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);

        $stmt->execute();

        // stock le resultat de notre requête = "id" + id de answer
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        // Gérer l'erreur si nécessaire
        echo "Une erreur s'est produite : " . $error->getMessage();
    }

    // for each réprète boucle et garde dernier resulat, donc on push tous les résultats dans un tableau
    array_push($userAnswer, $result["id"]);


    $sqlAnswerCompare = "SELECT id FROM `answer`
    WHERE is_right = 1 
    AND id_question = :id_question 
    AND id = :id_answer";

    try {

        $stmt = $pdo->prepare($sqlAnswerCompare);
        $stmt->bindParam(':id_question', $id_question, PDO::PARAM_INT);
        $stmt->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);
        $stmt->execute();

        $goodAnswer = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $error) {
        // Gérer l'erreur si nécessaire
        echo "Une erreur s'est produite : " . $error->getMessage();
    }

    array_push($answerCompare, $goodAnswer);

    
    if ($goodAnswer != false ) {
       $score = $score + 1;
    }

}

$_SESSION["score"] = $score;



var_dump($_SESSION);

$sqlStockScore = "INSERT INTO score (id_quiz, id_player, score)
 VALUES (:id_quiz, :id_player, :score)";

try {

    $stmt = $pdo->prepare($sqlStockScore);
    $stmt->bindParam(':id_quiz', $_SESSION["id_quiz"], PDO::PARAM_INT);
    $stmt->bindParam(':score', $_SESSION["score"], PDO::PARAM_INT);
    $stmt->bindParam(':id_player', $_SESSION["id_player"], PDO::PARAM_INT);
    $stmt->execute();


} catch (PDOException $error) {
    // Gérer l'erreur si nécessaire
    echo "Une erreur s'est produite : " . $error->getMessage();
}






header('location: ../source/quiz_resultat.php');
exit;
