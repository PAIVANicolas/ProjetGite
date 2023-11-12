
<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page regroupant les informations pour nous contacter">
    <meta name="keywords" content="Contact email réserver gite gîte conques conces conqes maison vacances ">
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/toggle.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/footer.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Nous contacter</title>
</head>
<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/header.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/nav.php");?>

<div class="container">

</div>



<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/footer.php"); ?>

<script src="/ProjetGite/assets/js/mode.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page À propos de notre gîte">
    <meta name="keywords" content="gîte, maison, vacances, histoire, équipe">
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/toggle.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/footer.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>À propos</title>
</head>
<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/header.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/nav.php");?>

<div class="container">
    <div id="about-content">
        <!-- Le contenu à propos sera chargé ici -->
    </div>
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/footer.php"); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchAboutContent();
    });

    function fetchAboutContent() {
        fetch('/ProjetGite/apropos-handler.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('about-content').innerHTML = data.content;
            })
            .catch(error => console.error('Erreur:', error));
    }
</script>
<script src="/ProjetGite/assets/js/mode.js"></script>
</body>
</html>
