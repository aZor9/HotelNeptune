<!DOCTYPE html>
<html>
<title>MON COMPTE</title>

<head>
    <link rel="stylesheet" href="/data/css/account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<header>
    <?php
        include('navbar.php');
        include('database.php');
    ?>
</header>

<body>
    <?php
    session_start();
    if($_GET['good'] == "connexion"){
        echo '<div class="good">Connexion réussite : BIENVENUE</div>';
    }
    ?>

    <br>  
    <h1>VOICI LES INFORMATIONS RELATIVES A VOTRE COMPTE</h1>
    <br><br>
        <div class="compte">
            <p>Nom :<?php echo(' '.$_SESSION['Nom']) ?> </p>
            <p>Prénom :<?php echo(' '.$_SESSION['Prenom']) ?> </p>
            <p>Mail :<?php echo(' '.$_SESSION['mail']) ?> </p> 
            <?php
            if ($_SESSION['admin']==true){
                echo ("<p>Statut : ADMIN </p>");
            }
            $mail=$_SESSION['mail'];
            $query = getDB()->prepare("SELECT solde FROM user WHERE mail = :mail");
            $query->bindParam(':mail', $mail, PDO::PARAM_STR);
            $query->execute();
            $solde = $query->fetch(PDO::FETCH_ASSOC);
            $solde=$solde['solde'];
            ?>
            <p>Votre solde : <?php echo($solde) ?> </p> 
        </div>

</body>
</html>