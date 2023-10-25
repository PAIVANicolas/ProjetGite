document.getElementById('imageForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    fetch('ajouter-photo-action.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
});


function previewImage(event) {
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
    imagePreview.onload = function() {
        URL.revokeObjectURL(imagePreview.src)
    }
    imagePreview.style.display = 'block';
}