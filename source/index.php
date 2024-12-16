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

<body class="bg-fond-quadrille bg-cover bg-center h-screen overflow-x-hidden">
    <!-- Section principale -->
    <section class="relative h-full max-w-full m-4 p-4 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px]">
        <!-- Contenu principal -->
        <div class="flex justify-between w-full">
            <img src="../images/Phone - accueil/Feu tricolore.png" alt="Feu tricolore de décoration" class="h-10 max-w-full">
            <img src="../images/Phone - accueil/Point interrogation.png" alt="Points d'interrogation" class="max-w-full">
        </div>

        <h1 class="font-changa text-9xl text-center mb-16">QUIZ</h1>

        <!-- Message d'erreur (si le pseudo est dèja dans la base de donnée) -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message text-red-500 text-lg text-center mb-4">
                <?= $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="../process/connexion_process.php" method="post" class="flex flex-col justify-center items-center w-full">
            <label for="pseudo" class="font-changa text-3xl">Votre pseudo</label>
            <input type="text" id="pseudo" name="pseudo" class="border-[3px] border-black rounded-[17px] shadow-inner-lg bg-white w-[70%] h-10" placeholder="Votre pseudo ici" required>

            <button type="submit" class="btn-custom btn-custom:hover btn-custom:focus">
                Valider
            </button>
        </form>

        <section>
            <!-- Conteneur principal -->
            <div class="relative h-[400px] w-full max-w-[400px] overflow-hidden >
                   <div class="relative w-full h-[70%]">
            <!-- Polygone 1 -->
            <div class="absolute top-[40%] left-[5%] animate-float">
                <img src="../images/Phone - accueil/P-4.png" alt="Polygone 1" class="w-auto max-w-[70px] md:max-w-[100px]">
            </div>
            <!-- Polygone 2 -->
            <div class="absolute top-[70%] left-[5%] animate-float2">
                <img src="../images/Phone - accueil/P-1.png" alt="Polygone 2" class="w-auto max-w-[80px] md:max-w-[110px]">
            </div>
            <!-- Polygone 3 -->
            <div class="absolute top-[40%] left-[30%] animate-float">
                <img src="../images/Phone - accueil/P-5.png" alt="Polygone 3" class="w-auto max-w-[90px] md:max-w-[120px]">
            </div>
            <!-- Polygone 4 -->
            <div class="absolute top-[60%] left-[45%] animate-float2">
                <img src="../images/Phone - accueil/P-6.png" alt="Polygone 4" class="w-auto max-w-[80px] md:max-w-[110px]">
            </div>
            <!-- Polygone 5 -->
            <div class="absolute top-[75%] left-[35%] animate-float">
                <img src="../images/Phone - accueil/P-3.png" alt="Polygone 5" class="w-auto max-w-[70px] md:max-w-[100px]">
            </div>
            <!-- Polygone 6 -->
            <div class="absolute top-[55%] left-[22%] animate-float2">
                <img src="../images/Phone - accueil/P-2.png" alt="Polygone 6" class="w-auto max-w-[70px] md:max-w-[100px]">
            </div>
        </div>
            </div>
        </section>
        

    </section>
</body>

</html>
