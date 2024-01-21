<!DOCTYPE html>
<title>Connexion</title>
<head>
    <link rel="stylesheet" href="connexion.css">

</head>
<header>
<?php
    include ('navbar.php');
    if($_GET['error'] == "identification")
    {
        echo '<div class="error">Erreur : Adresse e-mail ou mot de passe incorrect. </div>';
    }
    if($_GET['good'] == "identification")
    {
        echo '<div class="good">Connexion réussite : BIENVENUE</div>';
    }
?>
</header>
<body>
    <main>
        <br>
        <h1>SE CONNECTER</h1>
            <br>
        <form action="./connect.php" method="post">
            <div class="boxinscription" action="POST">
                <input type="text" id="mail" placeholder="Adresse mail" name="mail" required>
                <input type="password" id="password" placeholder="Mot de passe" name="pwd" required>
                <div class="text-center">
                    <input type="submit" id="Connexion" value="Connexion">
                </div>
            </div>
        </form>
    </main>

</body>

</html>