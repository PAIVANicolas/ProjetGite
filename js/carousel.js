const imageContainer = document.getElementById('image-container');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const imageList = []; // Liste des images

let currentIndex = 0;

// Fonction pour charger les images depuis le serveur
function loadImagesFromServer() {
    // Appel à un fichier PHP ou une API pour obtenir la liste des noms d'images
    fetch('./load-images.php') // Assurez-vous que le chemin est correct
        .then((response) => response.json())
        .then((imageNames) => {
            // Mettez à jour le tableau des noms d'images avec les noms nouvellement chargés
            imageList.length = 0; // Videz le tableau actuel
            imageNames.forEach((imageName) => {
                imageList.push('./assets/images/carousel/' + imageName); // Assurez-vous que le chemin est correct
            });

            // Démarrez le carrousel
            startCarousel();
        })
        .catch((error) => {
            console.error('Erreur lors du chargement des images :', error);
        });
}

// Fonction pour afficher l'image actuelle
function showCurrentImage() {
    if (currentIndex >= 0 && currentIndex < imageList.length) {
        imageContainer.innerHTML = ''; // Effacez l'élément conteneur
        const currentImage = document.createElement('img');
        currentImage.src = imageList[currentIndex];
        imageContainer.appendChild(currentImage);
    }
}

// Fonction pour passer à l'image précédente
function prevImage() {
    currentIndex = (currentIndex - 1 + imageList.length) % imageList.length;
    showCurrentImage();
}

// Fonction pour passer à l'image suivante
function nextImage() {
    currentIndex = (currentIndex + 1) % imageList.length;
    showCurrentImage();
}

// Écouteurs d'événements pour les boutons "Précédent" et "Suivant"
prevBtn.addEventListener('click', prevImage);
nextBtn.addEventListener('click', nextImage);

// Appeler la fonction pour charger les images lors du chargement de la page
window.addEventListener('load', loadImagesFromServer);

// Démarrer le carrousel
function startCarousel() {
    showCurrentImage();
    setInterval(nextImage, 4000); // Défilement automatique toutes les 4 secondes
}
