 document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    mettreContactAJour();
});

    function mettreContactAJour(){
    var emailInput = document.getElementById('email');
    var phoneInput = document.getElementById('phone');
    var facebookInput = document.getElementById('facebook');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/ProjetGite/phpAdmin/afficher-contact-action.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        console.log(xhr.responseText);
    if (xhr.readyState == 4 && xhr.status == 200) {
    var contact = JSON.parse(xhr.responseText);
    emailInput.value = contact.email || 'Pas d\'email';
    phoneInput.value = contact.phone || 'Pas de téléphone';
    facebookInput.value = contact.facebook || 'Pas de profil Facebook';
    console.log(contact);
}
};

    xhr.send('email=' + emailInput.value + '&phone=' + phoneInput.value + '&facebook=' + facebookInput.value);

}
