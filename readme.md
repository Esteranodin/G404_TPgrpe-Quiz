# 🔥 Quiz



Application ludique et interactive de quiz entre joueurs.

Le jeu doit être fun et pouvoir se partager entre amis pour comparer les scores !

Vous pouvez choisir librement la quantité de javascript que vous allez mettre pour dynamiser et fluidifier l'expérience de jeu.


#  📜 Scénarios utilisateurs minimum requis


## 
  **Graphisme**



* Je visualise l'application sur tous les formats d'écran sans scrollbar horizontale
* L'application utilise tout l'écran de façon optimal sur tous les appareils
* Le design est sobre, moderne, simple et intuitif

## 
  **Compte**

* En tant qu'**utilisateur non connecté**, je dois me connecter en saisissant seulement mon pseudo. Il n'y a pas de mot de passe. \
Si le pseudo n'est pas connu dans la base de données, un nouvel utilisateur est créé et je suis connecté sur le profil. \
 Si le pseudo est connu dans la base de données, alors je suis connecté et redirigé sur le choix du quiz.

**Note** : Il faut réfléchir à comment représenter la connexion d'un utilisateur dans votre code (comment savoir que quelqu'un est connecté et surtout qui est connecté). N'allez pas chercher trop compliqué vous avez vu pas mal d'outils en PHP et certains d'entre eux conviendront parfaitement ! 

## 
  **Liste des utilisateurs et des scores**

* En tant qu'**utilisateur connecté**, j'accède à la liste des scores de chaque quiz, ainsi qu'à la liste des utilisateurs y ayant participé, et de leur meilleur score respectif.

## 
  **Quiz**

* En tant qu'utilisateur connecté, je peux choisir le quiz auquel je veux participer.
* En tant qu'utilisateur connecté, je remplis les questions du quiz choisi triées aléatoirement.
* En tant qu'utilisateur connecté, je ne peux pas modifier ma réponse une fois qu'elle est choisie.
* En tant qu'utilisateur connecté, ma réponse devient verte ou rouge quand je la sélectionne. Le bouton suivant s'active.
* En tant qu'utilisateur connecté j'ai un temps limité pour répondre aux questions.
* En tant qu'utilisateur connecté, j'observe les résultats sous forme de tableau de scores + un graphique en barre.

**Note:** Faites les fonctionnalités étape par étape, ça ne sert à rien de réfléchir à comment faire un graphique ou comment implémenter une limite de temps si la logique de base n'est pas là !


# 🔗Complexité minimale requise


## 
  **Backend**



* Il doit y avoir une base de données, et vous devez réfléchir aux différentes tables de celle-ci [https://drawsql.app/](https://drawsql.app/). (Indice : il y en a au moins 4 🙂).
* Faire les relations entre les différentes tables.
* Prenez soin de bien structurer votre application PHP ! Organisez-vous convenablement pour ne pas vous perdre dans votre code !

## 
  **Frontend**

* Le site doit être entièrement responsive
* Au format mobile certains éléments disparaissent, changent de taille ou encore de position. Vous devez montrer que vous savez gérer les règles média CSS en fonction de la taille de l'appareil utilisé.
* Le Javascript étant potentiellement important en fonction de vos choix, il est requis de faire des fonctions et de structurer un minimum votre application.
* Vous choisirez vous-même ce que vous souhaitez faire pour le CSS (Vanilla, ou utilisation d'un framework comme TailwindCSS ou Bootstrap).


# 💡 Suggestions



* Gestion des high scores et podium des meilleurs joueurs
* .. Quoi d'autre ?! Remplissez cette partie !