<!DOCTYPE html>
<title>Connexion</title>
<head>
    <link rel="stylesheet" href="connexion.css">

</head>
<header>
<?php
    include ('navbar.php');
?>
</header>
<body>
    <main>
        <br>
        <form>
            <h1>SE CONNECTER</h1>
            <br>
            <div class="boxinscription" action="POST">
                <input type="text" id="mail" placeholder="Adresse mail" required>
                <input type="password" id="password" placeholder="Mot de passe" required>
                <div class="text-center">
                    <input type="submit" id="Connexion" value="Connexion">
                </div>

            </div>
        </form>
    </main>

</body>

</html>