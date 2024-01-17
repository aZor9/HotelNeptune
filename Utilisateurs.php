<!DOCTYPE html>
<title>Utilisateurs</title>
<link rel="stylesheet" href="Utilisateurs.css">

<header>
    <nav class="navbar">
        <div class="lien-nav">
            <ul>
                <li><a href="Page d'Acceuil.html">ACCEUIL</a></li>

                <li><a href="Nos chambres.html">CHAMBRES</a></li>

                <li  class="select"><a href="Utilisateurs.html">UTILISATEURS</a></li>

            </ul>
        </div>
    </nav>

</header>

<body>
        <br>
        <form>
            <h1>SE CRÉER UN COMPTE</h1>
            <br>
            <div class="boxinscription" method="post">
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
                        <a href="connexion.html" id="seconnecter">se connecter</a>
                    </div>
                </div>
            </div>
        </form>
        <?php
            if(isset($_POST['inscrire'])){
                echo "Merci ".$_POST['Prénom']." pour la création de votre compte ! Nous vous souhaitons la bienvenue à l'Hotel Neptune";
            }

        ?>

</body>

</html>