<?php
require_once '../utils/connect_db.php';

session_start();


$sql_quizName = "SELECT `name` FROM `quiz` WHERE id = :id_name";
try {
    $stmt = $pdo->prepare($sql_quizName);
    $stmt->execute([':id_name' => $_SESSION['id_quiz']]);
    $quizName = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    echo "Erreur lors de la requête des questions : " . $error->getMessage();

    exit;
}


$sqlClassement = "SELECT *
FROM score 
WHERE id_quiz = :id_quiz
ORDER BY score DESC
LIMIT 3";

try {
    $stmt = $pdo->prepare($sqlClassement);
    $stmt->execute([':id_quiz' => $_SESSION['id_quiz']]);
    $ScoreClassement = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    echo "Erreur lors de la requête des questions : " . $error->getMessage();

    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 4</title>
    <link rel="stylesheet" href="../assets/output.css">
    <link href="../assets/style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="fond-quadr ille animate-bg-scroll overflow-x-hidden bg-[#6E433C] bg-opacity-50">
    <!-- Ajout d'une div avec une couleur de fond et une opacité de 40% -->
    <!-- <div class="absolute inset-0 bg-[#6E433C] bg-opacity-50 z-0 h-screen w-full"></div> -->

    <!-- Section principale -->
    <section
        class="relative h-full max-w-full m-10 p-3 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px]">
        <!-- Image en haut de la section -->
        <div class="absolute top-[-1rem] left-0 w-full flex justify-center items-start">
            <img src="../images/Phone - Quiz résultat/Group 33.png" alt="Image décorative" class="w-[120%] max-w-none">
        </div>

        <h1 class="relative max-w-full mt-[8rem] font-changa text-primary text-4xl mb-10"><?= $quizName['name'] ?></h1>



        <article class="flex flex-row mb-10 items-end">

            <div class="flex flex-col items-center">
                <img src="../images/Phone - Quiz résultat/Podium/Silver-Medal.png" alt="Médaille d'argent" class="w-["rem]">
                <div>
                    <p class="text-black text-xl font-bold ">Davis Curtis</p>
                    <span class="text-graycustom text-[15px] font-semibold">21345</span>
                </div>
                <img src="../images/Phone - Quiz résultat/Podium/2.png" alt="Colone 2" class="bottom-">
            </div>

            <div class="flex flex-col items-center">
                <img src="../images/Phone - Quiz résultat/Podium/Gold-Medal.png" alt="Médaille d'or" class="w-[3rem]">
                <p class="text-black text-xl font-bold ">Alena Donin</p>
                <span class="text-graycustom text-[15px] font-semibold">21345</</span>
                <img src="../images/Phone - Quiz résultat/Podium/1.png" alt="Colone 1" class="bottom-0">
            </div>

            <div class="flex flex-col items-center">
                
                <img src="../images/Phone - Quiz résultat/Podium/Bronze-Medal.png" alt="Médaille de Bronze" class="w-[3rem]">
                <p class="text-black text-xl font-bold ">Graig Gouse</p>
                <span class="text-graycustom text-[15px] font-semibold">21345</</span>
                <img src="../images/Phone - Quiz résultat/Podium/3.png" alt="Colone 3">
            </div>

        </article>

        <article>
            <h3 class="font-rubik text-dark font-bold text-3xl">
                Bravo <?= $_SESSION["pseudo"] ?>
            </h3>
            <h4 class="font-rubik text-dark font-bold text-xl">
                Votre score : <?= $_SESSION["score"] ?> pts
            </h4>

            
        </article>

<a href="./quiz_choice.php">
        <button type="submit" class="btn-custom2 btn-custom2:hover btn-custom2:focus text-lg">
            Retour aux choix des quiz
        </button>
</a>



        <footer class="bottom-[-4rem] left-0 w-full flex justify-center items-start">
            <img src="../images/Phone - Quiz résultat/Group 34.png" alt="Image décorative" class="w-[120%] max-w-none">
        </footer>


    </section>
</body>




</html>