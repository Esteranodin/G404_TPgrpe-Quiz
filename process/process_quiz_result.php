<?php 

require_once '../utils/connect_db.php';
session_start();

// Question permet de choper l'id de la question, id_answer c'est un tableau qui stocke un tableau à l'index 0 à chaque fois et l'id de la réponse que l'utilisateur a choisi
foreach ($_POST["answers"] as $question => $id_answer) {
    foreach ($id_answer as $id_reponse) {

        // Je recupère dans la base de donnée l'id de la réponse de l'utilisateur pour chaque questions.
        $sql = "SELECT id FROM answer WHERE id_question = :id_question AND id = :id_reponse"; 

    

        try {
            
            $insertStmt = $pdo->prepare($sql);

           
            $insertStmt->bindParam(':id_question', $question, PDO::PARAM_INT); 
            $insertStmt->bindParam(':id_reponse', $id_reponse, PDO::PARAM_INT); 


            
            $insertStmt->execute();

            
            $result = $insertStmt->fetch(PDO::FETCH_ASSOC);



        } catch (\Throwable $th) {
            // Gérer l'erreur si nécessaire
            echo "Une erreur s'est produite : " . $th->getMessage();
        }
    }
}

?>
