<?php
require_once '../utils/connect_db.php';

session_start();
$_SESSION['id_quiz'] = $_POST['id_quiz']; 

// Vérification que l'Id du quiz est bien passé en POST
if (!isset($_POST['id_quiz'])) {
    header('Location: ./quiz_choice.php');
    exit;
}

$id_quiz = $_POST['id_quiz']; // Récupérer l'Id du quiz depuis la requête POST

// ----------------- Requête pour récupérer les questions -----------------
$sql_questions = "SELECT id, content FROM question WHERE id_quiz = :id_quiz";
try {
    $stmt = $pdo->prepare($sql_questions);
    $stmt->execute([':id_quiz' => $id_quiz]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requête des questions : " . $error->getMessage();
    exit;
}

// ----------------- Requête pour récupérer les réponses -----------------
$sql_answers = "SELECT id, content, is_right FROM answer WHERE id_question = :id_question";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link rel="stylesheet" href="../assets/output.css">
    <link href="../assets/style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="fond-quadrille animate-bg-scroll overflow-x-hidden bg-[#6E433C] bg-opacity-50">
    <!-- Ajout d'une div avec une couleur de fond et une opacité de 40% -->
    <!-- <div class="absolute inset-0 bg-[#6E433C] bg-opacity-50 z-0 h-screen w-full"></div> -->

    <!-- Section principale -->
    <section
        class="relative h-full max-w-full m-10 p-3 bg-gradient-clair-orange border-t-[7px] border-l-[7px] border-r-[15px] border-b-[15px] border-primary rounded-[42px]">


        <!-- PHONE DECORATION         -->
        <div class="absolute top-[-1rem] left-0 w-full flex justify-center items-start lg:hidden">
            <img src="../images/Phone - Quiz question/Group 32.png" alt="Image décorative" class="w-[120%] max-w-none lg:hidden">
        </div>
        <!-- DESKTOP DECORATION         -->
        <div class="hidden lg:block">
            <img src="../images/Desktop - Quiz question/Décoration haut gauche (1).png" alt="Image décorative" class="hidden lg:block absolute top-[-2rem] left-0">
            <img src="../images/Desktop - Quiz question/Group 35.png" alt="Image décorative 2" class="hidden lg:block absolute top-1 right-3">
        </div>


        <header class="mt-[45%] mb-10 flex items-center gap-[15%] lg:mt-[5%]">
            <div class="relative mt-[10%] ml-10">
                <!-- phone -->
                <img src="../images/Phone - Quiz question/Décoration haut gauche/Question.png" alt="Numéro question"
                    class="scale-120 lg:hidden">
                <!-- Desktop -->
                <img src="../images/Desktop - Quiz question/Décoration haut gauche/Question.png" alt="Numéro question"
                    class="hidden lg:block lm-[-7rem]">

                <div class="absolute inset-0 flex justify-center items-center mt-7">
                    <span class="text-light font-changa text-6xl">1</span>
                </div>

                <!-- Texte '/6' en haut à droite de l'image -->
                <div class="absolute top-0 right-0 p-2 text-light font-changa text-lg mt-3 lg:ml-4">
                    /6
                </div>


                
            </div>

            <!-- "Jeux Vidéo" centré sur la droite -->
            <div class="flex items-center justify-center">
  <h1 class="font-changa text-[2.25em] text-primary lg:text-9xl">Jeux Vidéo</h1>
</div>

        </header>

        <form action="../process/quiz_result_process.php" method="post">

            <article class="m-4">
                <?php
                foreach ($questions as $question) {
                ?>
                    <div class="bg-[#541A25] text-light font-chara rounded-lg p-6 mb-5 lg:w-[60%] ml-[25%]">
                        <?= $question['content'] ?>

                    </div>


                    <!-- LES REPONSES -->
                    <div class="flex flex-col mx-3 gap-5 mb-5">
                        <?php
                        // Préparer et exécuter la requête pour récupérer les réponses liées à la question
                        $stmt_answers = $pdo->prepare($sql_answers);
                        $stmt_answers->execute([':id_question' => $question['id']]);
                        $answers = $stmt_answers->fetchAll(PDO::FETCH_ASSOC);

                        // Afficher chaque réponse sous forme de cases à cocher
                        foreach ($answers as $answer) {
                        ?>
                            <label class="bg-[#6E433C] text-light font-chara rounded-lg p-6">
                                <input type="checkbox" name="answers[<?= $question['id'] ?>]" value="<?= $answer['id'] ?> " />
                                <?= htmlspecialchars($answer['content']); ?>
                            </label><br>
                        <?php
                        }
                        ?>
                    </div>

            </article>

        <?php
                }
        ?>
        <button type="submit" class="btn-custom2 btn-custom2:hover btn-custom2:focus">
            Valider
        </button>

        <!-- <footer>
            <div class="mb-4">
                <label for="timer" class="text-lg font-bold">Temps :</label>
                <progress id="timer" value="0" max="100" class="w-full h-5 rounded-full bg-red-600">
                    <div class="bg-[#6E433C] h-full rounded-lg"></div>
                </progress>
            </div>
        
            <div class="flex justify-center items-center gap-4 text-red-600">
                <span class="font-bold text-3xl">"PLAYER"</span>
                <br>
                <span id="score" class="text-lg">Votre score : 0 pts</span>
            </div>
        </footer> -->

        </form>

    </section>

</body>

</html>