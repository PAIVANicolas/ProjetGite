document.getElementById('imageForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    fetch('ajouter-image-action.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
});


document.getElementById('cancelButton').addEventListener('click', function() {
    console.log("trouvé");
    document.getElementById('imageForm').reset();
    document.getElementById('imagePreview').style.display = 'none';
});


function previewImage(event) {
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
    imagePreview.onload = function() {
        URL.revokeObjectURL(imagePreview.src)
    }
    imagePreview.style.display = 'block';
}