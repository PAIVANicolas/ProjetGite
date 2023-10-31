document.getElementById('imageForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    fetch('ajouter-photo-action.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.text())
        .then(data => {

        })
        .catch(error => {
            console.error('Error:', error);
        });
});
