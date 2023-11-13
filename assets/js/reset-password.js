document.getElementById("cancelButton").addEventListener("click", function() {
    window.location.href = '/ProjetGite/index.php';
});

document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    fetch('/ProjetGite/phpAdmin/action/reset-password-action.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => {
                    throw new Error(text);
                });
            }
            return response.text();
        })
        .then(text => {
            if (text.includes('dashboard.php')) {
                window.location.href = '/ProjetGite/phpAdmin/dashboard.php';
            } else {
                const errorMsg = document.querySelector('.errorMessage');
                errorMsg.textContent = "Le mot de passe ou le nom d'utilisateur est incorrect.";
                errorMsg.style.display = 'block';
            }
        })
        .catch(error => {
            window.alert(error);
        });
});
