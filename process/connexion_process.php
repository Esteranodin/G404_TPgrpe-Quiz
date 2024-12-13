<?php

require_once '../utils/connect_db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../source/index.php');
    return;
}

// if (
//     !isset(
//         $_POST['firstName'],
//         $_POST['lastName'],
//         $_POST['age'],
//         $_POST['email'],
//         $_POST['password']
//     )
// ) {
//     header('location: ../source/index.php?error=1');
//     return;
// }

// if (
//     empty($_POST['firstName']) ||
//     empty($_POST['lastName']) ||
//     empty($_POST['age']) ||
//     empty($_POST['email']) ||
//     empty($_POST['password'])
// ) {
//     header('location: ../source/index.php?error=2');
//     return;
// }

// input sanitization
// $firstName = htmlspecialchars(trim($_POST['firstName']));
// $lastName = htmlspecialchars(trim($_POST['lastName']));
// $age = htmlspecialchars(trim($_POST['age']));
// $email = htmlspecialchars(trim($_POST['email']));
// $password = htmlspecialchars(trim($_POST['password']));


// if(
//     strlen($firstName) > 50 ||
//     strlen($lastName) > 50 ||
//     $age > 120 ||
//     $age < 0
// ) {
//     header('location: ../source/index.php');
//     return;
// }



// mon code 


header('location: ../source/quiz_choice.php?pseudo=' . $pseudo);