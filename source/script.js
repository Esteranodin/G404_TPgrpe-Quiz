// Fonction pour gérer la sélection d'une réponse
function selectAnswer(answerId) {
    // Désélectionner toutes les options
    var options = document.querySelectorAll('.answer-option');
    options.forEach(function(option) {
        option.classList.remove('bg-blue-200', 'border-blue-500');
    });

    // Sélectionner la réponse cliquée
    var selectedOption = document.getElementById('answer-' + answerId);
    selectedOption.classList.add('bg-blue-200', 'border-blue-500');

    // Mettre à jour la valeur du champ hidden pour l'envoi
    document.getElementById('selected_answer').value = answerId;

    // Activer le bouton de soumission
    document.getElementById('submitBtn').disabled = false;
}
