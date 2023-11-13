document.addEventListener('DOMContentLoaded', function() {
    mettreContactAJour();
});
function mettreContactAJour(){
    var emailInput = document.getElementById('emaillll');
    var phoneInput = document.getElementById('phonenumber');
    var facebookInput = document.getElementById('facebooka');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/ProjetGite/phpAdmin/action/afficher-contact-action.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 200) {
            var contact = JSON.parse(xhr.responseText);
            emailInput.textContent = contact.email || 'Pas d\'email';
            phoneInput.textContent = contact.phone || 'Pas de téléphone';
            facebookInput.href = contact.facebook || 'Pas de profil Facebook';
        }
    };

    xhr.send('email=' + emailInput.value + '&phone=' + phoneInput.value + '&facebook=' + facebookInput.value);

}
