document.getElementById('image').addEventListener('change', function(event) {

    var file = event.target.files[0];
    if (file) {
        var img = new Image();
        img.onload = function() {
            if (img.width > 400 || img.height > 400) {
                document.getElementById('resizeLink').style.display = 'block';
            } else {
                document.getElementById('resizeLink').style.display = 'none';
            }
        };
        img.src = URL.createObjectURL(file);
    }
});