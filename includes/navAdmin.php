<nav class="nav-menu">
    <ul>
        <li><a href="/ProjetGite/phpAdmin/dashboard.php">Tableau de bord</a></li>
        <li><a href="/ProjetGite/phpAdmin/calendar.php">Calendrier</a> </li>
        <li><button id="logoutButton">Déconnexion</button></li>
    </ul>

</nav>

<script>
    document.getElementById('logoutButton').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/ProjetGite/phpAdmin/deconnexion.php', true);
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.href = '../index.php';
            }
        };
        xhr.send();
    });
</script>