<?php
session_start();
?>

<!DOCTYPE html>
<html>
<title>ADMIN</title>

<head>
    <link rel="stylesheet" href="/data/css/admin.css">
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
<br><br>
<body>
    <div class='boxinscription', style='text-align:center;'><br>
    <a href="/data/php/add_room.php"> add room</a><br>
    <a href="/data/php/remove_room.php"> remove room</a><br>
    <a href="/data/php/edit.php"> modifier room</a><br><br><br>
    <a href="/data/php/user_admin.php"> Utilisateur</a><br>
    </div>
</body>