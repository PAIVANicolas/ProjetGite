const imageContainer = document.getElementById('image-container');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const imageList = []; // Liste des images

let currentIndex = 0;

// Fonction pour charger les images depuis le serveur
function loadImagesFromServer() {
    // Appel à un fichier PHP ou une API pour obtenir la liste des noms d'images
    fetch('./load-images.php')
        .then((response) => response.json())
        .then((imageNames) => {
            imageList.length = 0;
            imageNames.forEach((imageName) => {
                imageList.push('./assets/images/carousel/' + imageName); // Assurez-vous que le chemin est correct
            });

            startCarousel();
        })
        .catch((error) => {
            console.error('Erreur lors du chargement des images :', error);
        });
}

// Fonction pour afficher l'image actuelle
function showCurrentImage() {
    if (currentIndex >= 0 && currentIndex < imageList.length) {
        imageContainer.innerHTML = '';
        const currentImage = document.createElement('img');
        currentImage.src = imageList[currentIndex];
        imageContainer.appendChild(currentImage);
    }
}


function prevImage() {
    currentIndex = (currentIndex - 1 + imageList.length) % imageList.length;
    showCurrentImage();
}


function nextImage() {
    currentIndex = (currentIndex + 1) % imageList.length;
    showCurrentImage();
}


prevBtn.addEventListener('click', prevImage);
nextBtn.addEventListener('click', nextImage);
window.addEventListener('load', loadImagesFromServer);


function startCarousel() {
    showCurrentImage();
    setInterval(nextImage, 4000); // Défilement automatique toutes les 4 secondes
}
