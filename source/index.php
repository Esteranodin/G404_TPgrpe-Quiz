<?php
// Démarrage de la session
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="../assets/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="fond-quadrille animate-bg-scroll overflow-x-hidden">
    <!-- <body class="bg-fond-quadrille bg-cover bg-center h-screen overflow-x-hidden"> -->
    <!-- Section principale -->
    <section class="relative h-screen max-w-full lg:h-[calc(100vh-20px)] m-10 p-10 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px] 
    lg:mx-[5%] lg:my-[2%] overflow-y-hidden box-border">
        <!-- Contenu principal -->
        <div class="flex justify-between w-full">
            <img src="../images/Phone - accueil/Feu tricolore.png" alt="Feu tricolore de décoration" class="h-10 max-w-full lg:hidden">
            <img src="../images/Phone - accueil/Point interrogation.png" alt="Points d'interrogation" class="max-w-full lg:hidden">
            <img src="../images/Desktop - accueil/Feu tricolore.png" alt="Feu tricolore de décoration" class="hidden lg:block">
        </div>

        <h1 class="font-changa text-9xl text-center mb-16 lg:text-[15rem]">QUIZ</h1>



       
        <!-- *****************************************************************************************************************
         *********************************************************************************************************************
         ***************************************************************************************************** VERSION MOBILE --> 
       
       
         <!-- Message d'erreur (si le pseudo est dèja dans la base de donnée) -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message text-red-500 text-lg text-center mb-4">
                <?= $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="../process/connexion_process.php" method="post" class="flex flex-col justify-center items-center w-full lg:hidden">
            <label for="pseudo" class="font-changa text-3xl">Votre pseudo</label>
            <input type="text" id="pseudo" name="pseudo" class="border-[3px] border-black rounded-[17px] shadow-inner-lg bg-white w-[70%] h-10" placeholder="Votre pseudo ici" required>

            <button type="submit" class="btn-custom btn-custom:hover btn-custom:focus">
                Valider
            </button>
        </form>


        <!-- POLYGONES VERSION TEL -->
        <section>
            <!-- Conteneur principal -->
            <div class="absolute left-0 bottom-0 h-[400px] w-full max-w-[400px] overflow-hidden lg:hidden >
                   <div class="relative w-full h-[90%]">
            <!-- Polygone 1 -->
            <div class="absolute top-[50%] left-[5%] animate-float">
                <img src="../images/Phone - accueil/P-4.png" alt="Polygone 1" class="w-auto max-w-[70px] md:max-w-[100px]">
            </div>
            <!-- Polygone 2 -->
            <div class="absolute top-[80%] left-[5%] animate-float2">
                <img src="../images/Phone - accueil/P-1.png" alt="Polygone 2" class="w-auto max-w-[80px] md:max-w-[110px]">
            </div>
            <!-- Polygone 3 -->
            <div class="absolute top-[50%] left-[30%] animate-float">
                <img src="../images/Phone - accueil/P-5.png" alt="Polygone 3" class="w-auto max-w-[90px] md:max-w-[120px]">
            </div>
            <!-- Polygone 4 -->
            <div class="absolute top-[70%] left-[45%] animate-float2">
                <img src="../images/Phone - accueil/P-6.png" alt="Polygone 4" class="w-auto max-w-[80px] md:max-w-[110px]">
            </div>
            <!-- Polygone 5 -->
            <div class="absolute top-[85%] left-[35%] animate-float">
                <img src="../images/Phone - accueil/P-3.png" alt="Polygone 5" class="w-auto max-w-[70px] md:max-w-[100px]">
            </div>
            <!-- Polygone 6 -->
            <div class="absolute top-[65%] left-[22%] animate-float2">
                <img src="../images/Phone - accueil/P-2.png" alt="Polygone 6" class="w-auto max-w-[70px] md:max-w-[100px]">
            </div>
        </div>
            </div>
        </section>
        



        <!-- *****************************************************************************************************************
         *********************************************************************************************************************
         ***************************************************************************************************** VERSION ORDINATERU -->        
         <section class=" flex row justify-center mt-[7%]">
            <div>
                <img src="../images/Desktop - accueil/Décoration polygons.png" alt="Polygones décorations" class="hidden lg:absolute lg:block bottom-1 left-0">
            </div>

            <!-- Message d'erreur (si le pseudo est déjà dans la base de données) -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message text-red-500 text-lg text-center mb-4 lg:block">
                    <?= $_SESSION['error']; ?>
                </div>
            <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <form action="../process/connexion_process.php" method="post" class="flex-col justify-center items-center w-full hidden lg:block">
                <label for="pseudo" class="font-changa text-5xl">Votre pseudo</label>
                <br>
                <input type="text" id="pseudo" name="pseudo" class="border-[3px] border-black rounded-[17px] shadow-inner-lg bg-white w-[30%] h-14 pl-3" placeholder="Votre pseudo ici" required>
<br>
                <button type="submit" class="btn-custom btn-custom:hover btn-custom:focus lg:w-[15%]">
                    Valider
                </button>
            </form>

            <img src="../images/Desktop - accueil/Point interrogation.png" alt="Feu tricolore de décoration" class="hidden lg:block lg:absolute right-0 bottom-0">
        </section>




    </section>
</body>

</html>
