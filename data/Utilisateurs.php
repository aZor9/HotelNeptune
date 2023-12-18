<!DOCTYPE html>
<title>Utilisateurs</title>
<link rel="stylesheet" href="Utilisateurs.css">
<header>
<?php
    include ('navbar.php');
?>
</header>

<body>
    <main>
        <br>
        <form>
            <h1>SE CRÉER UN COMPTE</h1>
            <br>
            <div class="boxinscription" action="POST">
                <input type="text " id="Nom" placeholder="Nom" required>
                <input type="text " id="Prénom" placeholder="Prénom" required>
                <input type="email" id="mail" placeholder="Adresse mail" required>
                <input type="password" id="password" placeholder="Mot de passe" required>
                <input type="password" id="re-password" placeholder="Confirmation mot de passe" required>
                <div class="text-center">
                    <input type="submit" id="inscrire" value="S'inscrire">
                </div>
                <div class="row">
                    <p>Vous avez un compte ?</p>
                    <br>
                    <a href="connexion.php" id="seconnecter">se connecter</a>
                </div>
            </div>
            </div>
        </form>
    </main>

</body>

</html>