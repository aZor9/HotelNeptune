<?php
session_start();
?>

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
?>
</header>

<body>
<br>  
<h1>VOICI LES INFORMATIONS RELATIVES A VOTRE COMPTE</h1>
<br><br>
    <div class="compte">
        <p>Nom :<?php echo(' '.$_SESSION['Nom']) ?> </p>
        <p>Prénom :<?php echo(' '.$_SESSION['Prenom']) ?> </p>
        <p>Mail :<?php echo(' '.$_SESSION['mail']) ?> </p> 
        <?php
        if ($_SESSION['admin']==true){
            echo ("<p>Statue : ADMIN </p>");
        }
        ?>
    </div>

</body>
</html>