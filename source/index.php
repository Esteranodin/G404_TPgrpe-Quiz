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
    <section
        class="h-full max-w-full m-4 p-4 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px]">
        
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
            <input type="text" id="pseudo" name="pseudo"
                class="border-[3px] border-black rounded-[17px] shadow-inner-lg bg-white w-[70%] h-10"
                placeholder="Votre pseudo ici" required>

            <button type="submit" class="btn-custom btn-custom:hover btn-custom:focus">
                Valider
            </button> 
        </form>

    </section>
</body>

</html>
