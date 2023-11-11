document.getElementById('imageVisionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var section = document.getElementById('section').value;
    var formData = new FormData();
    formData.append('section', section);

    fetch('../phpAdmin/action/afficher-images-action.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                afficherImages(data.images);
            } else {

                console.error(data.message);
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
});

function afficherImages(images) {
    let container = document.querySelector('.images-container');
    container.innerHTML = '';

    images.forEach(image => {
        let imageWrapper = document.createElement('div');
        imageWrapper.classList.add('image-wrapper');

        let img = document.createElement('img');
        img.src = image.path;
        img.alt = image.alt;

        let deleteButton = document.createElement('button');
        deleteButton.classList.add('delete-button');
        deleteButton.innerText = 'Supprimer';
        deleteButton.dataset.imageId = image.id;

        deleteButton.addEventListener('click', function() {
            var confirmDeletion = confirm('Êtes-vous sûr de vouloir supprimer cette image ?');
            if (confirmDeletion) {

                var formData = new FormData();
                formData.append('image_id', this.dataset.imageId);

                fetch('../phpAdmin/supprimer-image-action.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('Image supprimée avec succès.');
                            imageWrapper.remove();
                        } else {
                            alert('Erreur : ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                    });
            }
        });

        imageWrapper.appendChild(img);
        imageWrapper.appendChild(deleteButton);
        container.appendChild(imageWrapper);
    });
}
