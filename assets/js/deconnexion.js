document.getElementById('logoutButton').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/ProjetGite/phpAdmin/deconnexion.php', true);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = '/ProjetGite/phpAdmin/login.php';
        }
    };
    xhr.send();
});