<?php

session_start();

?>





<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-fond-quadrille bg-cover bg-center h-screen overflow-x-hidden">
    <!-- Définir overflow-x-hidden sur le body pour éviter le défilement horizontal -->
    <section
        class="h-full max-w-full m-4 p-4 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px]">
        <!-- La section occupe toute la largeur et inclut des bordures -->
        <div class="flex justify-between w-full">
            <img src="../images/Phone - accueil/Feu tricolore.png" alt="Feu tricolore de décoration"
                class="h-10 max-w-full">
            <img src="../images/Phone - accueil/Point interrogation.png" alt="Points d'interrogation" class="max-w-full">
        </div>

        <h1 class="font-changa text-9xl text-center mb-16">QUIZ</h1>

        <form action="../process/connexion_process.php" method="post" class="flex flex-col justify-center items-center w-full">
            <label for="pseudo" class="font-changa text-3xl">Votre pseudo</label>
            <input type="text" id="pseudo" name="pseudo"
                class="border-[3px] border-black rounded-[17px] shadow-inner-lg bg-white w-[70%] h-10"
                placeholder="Votre pseudo ici" required>

            <button type="submit" class="btn-custom btn-custom:hover btn-custom:focus">
                Valider</button> 
        </form>


        <!-- A RETRAVAILLER -->
            <div class="grid grid-cols-5 grid-rows-5 gap-0"">
                <div class=" col-start-1 col-span-1 row-start-1 row-span-2 bg-red-500">
                <img src="../images/Phone - accueil/P-4.png" alt="">
            </div>
            <div class="col-start-1 col-span-1 row-start-4 row-span-2 bg-blue-500">
                <img src="../images/Phone - accueil/P-1.png" alt="">
            </div>
            <div class="col-start-2 col-span-2 row-start-1 row-span-1 bg-green-500">
                <img src="../images/Phone - accueil/P-5.png" alt="">
            </div>
            <div class="col-start-3 col-span-2 row-start-2 row-span-2 bg-yellow-500">
                <img src="../images/Phone - accueil/P-6.png" alt="">
            </div>
            <div class="col-start-3 col-span-1 row-start-4 row-span-3 bg-purple-500">
                <img src="../images/Phone - accueil/P-3.png" alt="">
            </div>
            <div class="col-start-2 col-span-2 row-start-3 row-span-2 bg-pink-500">
                <img src="../images/Phone - accueil/P-2.png" alt="">
            </div>
        </div>



    </section>


</body>

</html>