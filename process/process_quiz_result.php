<?php 

require_once '../utils/connect_db.php';
session_start();


// Question permet de choper l'id de la question, id_answer c'est un tableau qui stocke un tableau à l'index 0 à chaque fois et l'id de la réponse que l'utilisateur a choisi
foreach ($_POST["answers"] as $id_question => $id_answer) {

        // Je recupère dans la base de donnée l'id de la réponse de l'utilisateur pour chaque questions.
        $sql = "SELECT id FROM answer WHERE id_question = :id_question AND id = :id_answer"; 

        try {
            
            $insertStmt = $pdo->prepare($sql);
           
            $insertStmt->bindParam(':id_question', $id_question, PDO::PARAM_INT); 
            $insertStmt->bindParam(':id_answer', $id_answer, PDO::PARAM_INT); 
            
            $insertStmt->execute();
   

        } catch (\Throwable $th) {
            // Gérer l'erreur si nécessaire
            echo "Une erreur s'est produite : " . $th->getMessage();
        }
    }
    
    $result = $insertStmt->fetch(PDO::FETCH_ASSOC);
      var_dump ($result);

?>
