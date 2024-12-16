<?php

require_once '../utils/connect_db.php';
session_start();

// pour chaque resultat en post de réponse on récupère dans answer id_question + id de answer
foreach ($_POST["answers"] as $id_question => $id_answer) {

    // récupère id de answer
    // où id_question = id_question récupéré dans le for each et devient une nouvelle variable sql
    // + id de answer devient le resultat stocké dans la variable sql
    $sql = "SELECT id   
        FROM answer 
        WHERE id_question = :id_question 
        AND id = :id_answer";

    try {

        $insertStmt = $pdo->prepare($sql);

        $insertStmt->bindParam(':id_question', $id_question, PDO::PARAM_INT);
        $insertStmt->bindParam(':id_answer', $id_answer, PDO::PARAM_INT);

        $insertStmt->execute();
    } catch (PDOException $error) {
        // Gérer l'erreur si nécessaire
        echo "Une erreur s'est produite : " . $th->getMessage();
    }
}

$result = $insertStmt->fetch(PDO::FETCH_ASSOC);
var_dump($result);
