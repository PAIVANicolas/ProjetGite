<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/loginform.css">
</head>
<body>
<form id="loginForm" class="box" method="post" name="login">
    <div class="cadreLogin" >
        <h2 class="title">Se connecter</h2>
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">
    </div>
    <?php if (! empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>
</form>
<script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        fetch('./phpAdmin/loginaction.php', {
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
                    window.location.href = './phpAdmin/dashboard.php';
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
</script>
</body>
</html>
