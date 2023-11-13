function envoyerMail() {
    var xhr = new XMLHttpRequest();
    
    xhr.open('GET', '/ProjetGite/phpAdmin/action/afficher-contact-action.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var jsonResponse = JSON.parse(xhr.responseText);

            var emailDestinataire = jsonResponse.email;

            var nom = document.querySelector('#nomMail').value;
            var sujet = document.querySelector('#sujetMail').value;
            var demande = document.querySelector('#demandeMail').value;

            // Encodage du sujet de l'email
            var subject = encodeURIComponent("Demande de " + nom + " : " + sujet);

            // Encodage du corps de l'email
            var body = encodeURIComponent("Demande: " + demande);

            // Construction du lien mailto
            var mailtoLink = "mailto:" + emailDestinataire + "?subject=" + subject + "&body=" + body;
            console.log(mailtoLink);
            // Ouverture de la fenêtre de messagerie
            window.location.href = mailtoLink;
        }
    };

    xhr.send();
}
