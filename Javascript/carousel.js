// Récupération des éléments
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const carouselInner = document.getElementById('carouselInner');
const articles = document.querySelectorAll('.carousel-item');

let currentPage = 0;
const itemsPerPage = 3;
const totalPages = Math.ceil(articles.length / itemsPerPage);

// Fonction pour mettre à jour l'affichage
function updateCarousel() {
    const offset = -currentPage * 100;
    carouselInner.style.transform = `translateX(${offset}%)`;

    // Masquer les boutons si nécessaire
    prevBtn.style.display = currentPage === 0 ? 'none' : 'block';
    nextBtn.style.display = currentPage === totalPages - 1 ? 'none' : 'block';
}

// Événements sur les boutons
prevBtn.addEventListener('click', () => {
    if (currentPage > 0) {
        currentPage--;
        updateCarousel();
    }
});

nextBtn.addEventListener('click', () => {
    if (currentPage < totalPages - 1) {
        currentPage++;
        updateCarousel();
    }
});

// Initialisation
updateCarousel();
