document.addEventListener('DOMContentLoaded', () => {
    const style = document.createElement('style');
    style.textContent = `
        progress {
            background-color: #541A25;
            border-radius: 10px; /* Ajout pour arrondir les côtés */
        }
        progress::-webkit-progress-bar {
            background-color: #541A25;
            border-radius: 10px; /* Ajout pour arrondir les côtés */
        }
        progress::-webkit-progress-value {
            background-color: var(--light-color);
            border-radius: 10px; /* Ajout pour arrondir les côtés */
        }
        progress::-moz-progress-bar {
            background-color: var(--light-color);
            border-radius: 10px; /* Ajout pour arrondir les côtés */
        }
    `;
    document.head.append(style);
});


