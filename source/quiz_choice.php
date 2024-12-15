<?php

require_once '../utils/connect_db.php';

session_start();





if (!isset($_SESSION['pseudo'])) {
    header('Location: ../source/index.php?error=1');
    exit;
}



$sql = "SELECT * FROM quiz";

try {
    $test = $pdo->query($sql);
    $typesQuiz = $test->fetchAll(PDO::FETCH_ASSOC); // Fetch patient details

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
    

<p>Bienvenue <?= $_SESSION["pseudo"]  ?></p>
<h2>Choix du quiz</h2>
<section class="container">
    <?php
    foreach($typesQuiz as $typeQuiz){
        
    ?>
    <article>
        <h3><?=  $typeQuiz["name"] ?></h3>
        <hr>
        <div>
            <div>
                <p></p>
                <p></p>
            </div>
            <div>
                <p></p>
                <p></p>
            </div>
            <div>
                <p></p>
                <p></p>
            </div>
            
        </div>
        <form action="./quiz_playing.php" method="post">
        <input type="hidden" name="id_quiz" value="<?= $typeQuiz["id"] ?>"/>
        <button type="submit">Let's go !</button>
        </form>
    </article>
    <?php
}
?>
</section>


</body>
</html>