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
    $typesQuiz = $test->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz-Choice</title>
    <link rel="stylesheet" href="../assets/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="fond-quadrille animate-bg-scroll overflow-x-hidden bg-[#6E433C] bg-opacity-50">
    <!-- Ajout d'une div avec une couleur de fond et une opacité de 40% -->
    <!-- <div class="absolute inset-0 bg-[#6E433C] bg-opacity-50 z-0 h-screen w-full"></div> -->

    <!-- Section principale -->
    <section
        class="relative h-full max-w-full m-10 p-3 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px]">
        <!-- Image en haut de la section -->

        <header>
            <div class="absolute top-[-1rem] left-0 w-full flex justify-center items-start">
                <img src="../images/Phone - Quiz question/Group 32.png" alt="Image décorative" class="w-[120%] max-w-none">
            </div>



            <h2 class="mt-[35%] text-center font-rubik text-primary text-2xl font-medium">Bienvenue <?= $_SESSION["pseudo"]  ?></h2>
            <h1 class="font-changa text-[2.5rem] text-center mb-5 text-primary">Choix du quiz</h1>
        </header>

        <main class="flex flex-col gap-10">
 <?php
            foreach ($typesQuiz as $typeQuiz) {

            ?>
           
                <!-- CHOIX*************************************************************************** 
   ******************************************************************************************** 
   ******************************************************************************************** 
   ********************************************************************************************-->
                <article
                    class="relative h-full max-w-full bg-primaryopacity border-[5px] border-primary rounded-[1rem] shadow-inner-box">




                    <!-- EN TETE -->

                    <h3 class="text-light font-changa my-3 text-stroke"><?= $typeQuiz["name"] ?></h3>
                    <!-- Trait décoratif -->
                    <div class="border-t-8 border-light rounded-full mx-4 mb-6"></div>

                    <div class="flex flex-col gap-4">

                        <!-- RANK 1  -->
                    <!-- RANK 1  -->
                    <div
                        class="flex flex-row items-center justify-between mx-10 p-6 bg-white border-b border-primary rounded-3xl shadow-2xl">
                        <div class="flex gap-2">

                            <span
                                class="inline-flex items-center justify-center w-12 h-12 border-4 border-gray-custom rounded-full text-center bg-transparent">
                                1
                            </span>

                            <div class="flex flex-col ml-4">
                                <span class="text-black text-xl font-bold ">Davis Curtis</span>
                                <span class="text-graycustom text-lg font-semibold">2,569 points</span>
                            </div>
                        </div>

                        <div>
                            <img src="../images/Phone - Quiz sélection/Gold.png" alt="Médaille d'or"
                                class="w-[2.5rem] inline-flex items-center justify-center ">
                        </div>
                    </div>

                    <!-- RANK 2  -->
                    <div
                        class="flex flex-row items-center justify-between mx-10 p-6 bg-white border-b border-primary rounded-3xl shadow-2xl">
                        <div class="flex gap-2">

                            <span
                                class="inline-flex items-center justify-center w-12 h-12 border-4 border-gray-custom rounded-full text-center bg-transparent">
                                2
                            </span>

                            <div class="flex flex-col ml-4">
                                <span class="text-black text-xl font-bold ">Alena Donin</span>
                                <span class="text-graycustom text-lg font-semibold">1,469 points</span>
                            </div>
                        </div>

                        <div>
                            <img src="../images/Phone - Quiz sélection/Silver.png" alt="Médaille d'argent"
                                class="w-[2.5rem] inline-flex items-center justify-center ">
                        </div>
                    </div>


                    <!-- RANK 3  -->
                    <div
                        class="flex flex-row items-center justify-between mx-10 p-6 bg-white border-b border-primary rounded-3xl shadow-2xl">
                        <div class="flex gap-2">

                            <span
                                class="inline-flex items-center justify-center w-12 h-12 border-4 border-gray-custom rounded-full text-center bg-transparent">
                                3
                            </span>

                            <div class="flex flex-col ml-4">
                                <span class="text-black text-xl font-bold ">Graig Gouse</span>
                                <span class="text-graycustom text-lg font-semibold">1,053 points</span>
                            </div>
                        </div>

                        <div>
                            <img src="../images/Phone - Quiz sélection/Bronze.png" alt="Médaille de Bronze"
                                class="w-[2.5rem] inline-flex items-center justify-center ">
                        </div>
                    </div>
                </div>


                    <form action="./quiz_playing.php" method="post">
                        <input type="hidden" name="id_quiz" value="<?= $typeQuiz["id"] ?>" />
                        <button type="submit" class="btn-custom2 btn-custom2:hover btn-custom:focus">
                            Let's go !</button>
                    </form>

                </article>


            <?php
            }
            ?>



</body>

</html>