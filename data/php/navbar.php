<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<title>ACCEUIL</title>

<head>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    

<header>
    <nav class="navbar">
        <div class="nav-logo">
            <img src="/image/neptuneicone.png" alt="logo hotel neptune" id="neptuneicone" />
            <p id="textlogo">HOTEL NEPTUNE</p>
        </div>
        <div class="lien-nav">
            <ul>
                <li><a href="/index.php">ACCEUIL</a></li>
                <li><a href="../php/chambres.php">CHAMBRES</a></li>
                <li
                    <?php
                        if ($_SESSION['admin']!==true){
                            echo ('id="lien-droite"');
                        }
                    ?>
                >
                    <?php  
                    if ($_SESSION['mail']){
                        echo ('<a href="../php/account.php">MON COMPTE</a></li>');
                    }
                    else {
                        echo('<a href="../php/utilisateurs.php">UTILISATEURS</a></li>');
                    }
                    ?>
                </li>
                <li 
                    <?php
                        if ($_SESSION['admin']==true){
                            echo ('id="lien-droite"');
                        }
                        else {
                            echo('style="display:none;"');
                        }
                    ?>
                >
                    <?php
                        if ($_SESSION['admin']==true){
                            echo ('<a href="../php/admin.php">ADMIN</a>');
                        }
                    ?>
                </li>
            </ul>
        </div>
        <div class="nav-menu">
            <ul>
                <li><a>MENU</a>
                    <ul>
                        <li></li>
                        <li><a href="../php/unconnect.php">deco</a></li>
                        <li><a>je</a></li>
                        <li><a>sais</a></li>
                        <li><a>pas</a></li>
                        <li><a>quoi</a></li>
                        <li><a>mettre</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
</body>
</html>