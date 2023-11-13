 document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
     mettreContactAaJour();
});

    function mettreContactAaJour(){
        var emailInput = document.getElementById('emaill');
        var phoneInput = document.getElementById('phonee');
        var facebookInput = document.getElementById('facebookk');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/ProjetGite/phpAdmin/action/afficher-contact-action.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                var contact = JSON.parse(xhr.responseText);
                emailInput.value = contact.email || 'Pas d\'email';
                phoneInput.value = contact.phone || 'Pas de téléphone';
                facebookInput.value = contact.facebook || 'Pas de profil Facebook';
            }
};
        xhr.send('emaill=' + emailInput.value + '&phonee=' + phoneInput.value + '&facebookk=' + facebookInput.value);
    }

function afficherContact(){
    var emailInput = document.getElementById('emaill');
    var phoneInput = document.getElementById('phonee');
    var facebookInput = document.getElementById('facebookk');
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/ProjetGite/phpAdmin/action/afficher-contact-action.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var contact = JSON.parse(xhr.responseText);
            emailInput.value = contact.email || 'Pas d\'email';
            phoneInput.value = contact.phone || 'Pas de téléphone';
            facebookInput.value = contact.facebook || 'Pas de profil Facebook';
        }
    };
    xhr.send();
}
