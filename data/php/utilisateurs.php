<!DOCTYPE html>
<title>Utilisateurs</title>
<link rel="stylesheet" href="/data/css/Utilisateurs.css">
<header>
<?php
    include('navbar.php');
    session_start();
    if($_GET['error'] == "errorpwd")
    {
        echo '<div class="error">Erreur : mot de passe différent</div>';
    }
    if($_GET['error'] == "errormail")
    {
        echo '<div class="error">Erreur : Mail déja existant </div>';
    }
    if($_GET['good'] == "connexion")
    {
        echo '<div class="good">Connexion réussite : BIENVENUE</div>';
    }
?>
</header>

<body>
    <main>
        <br>
        <h1>SE CRÉER UN COMPTE</h1>
        <br>
        <form action="/data/php/signin.php" method="post">
            <div class="boxinscription" action="POST">
                <input type="text " id="Nom" placeholder="Nom" name=nom required>
                <input type="text " id="Prénom" placeholder="Prénom" name=prenom required>
                <input type="email" id="mail" placeholder="Adresse mail" name=mail required>
                <input type="password" id="password" placeholder="Mot de passe" name=pwd required>
                <input type="password" id="re-password" placeholder="Confirmation mot de passe" name=repwd required>
                <div class="text-center">
                    <input type="submit" id="inscrire" value="S'inscrire">
                </div>
                <?php
                if (!$_SESSION['mail']){

                    echo('
                    <div class="row">
                        <p>Vous avez un compte ?</p>
                        <br>
                        <a href="/data/php/connexion.php" id="seconnecter">se connecter</a>
                    </div>');
                }
                ?>
                
            </div>
            </div>
        </form>
    </main>

</body>

</html>