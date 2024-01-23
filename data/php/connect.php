<?php

$mail = $_POST['mail'];
$password = $_POST['pwd'];

 
include('database.php');


$query = getDB()->prepare("SELECT * FROM user WHERE mail = :mail AND password = :password");

$query->bindParam(':mail', $mail, PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);
$query->execute();
$userData = $query->fetch(PDO::FETCH_ASSOC);

if ($userData) {
    session_start();
    $_SESSION['mail']=$mail;
    $_SESSION['pwd']=$password;

    //recupère le nom et prenom pour la page compte

    $query = getDB()->prepare("SELECT nom FROM user WHERE mail = :mail AND password = :password");
    $query->bindParam(':mail', $mail, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $nom = $query->fetch(PDO::FETCH_ASSOC);

    $query = getDB()->prepare("SELECT prenom FROM user WHERE mail = :mail AND password = :password");
    $query->bindParam(':mail', $mail, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $prenom = $query->fetch(PDO::FETCH_ASSOC);

    $_SESSION['Nom']=$nom['nom'];
    $_SESSION['Prenom']=$prenom['prenom'];

    // regarde si l'utilsateur renseigné est de grade admin si oui lui active ses permitions 

    
    $query = getDB()->prepare("SELECT admin FROM user WHERE mail = :mail AND password = :password");
    $query->bindParam(':mail', $mail, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $admin = $query->fetch(PDO::FETCH_ASSOC);
    $admin = $admin['admin'];
    if ($admin==1){
        $_SESSION['admin']=true;
    }
        
    header('Location:/data/php/connexion.php?good=identification');

} else {
    header('Location:/data/php/connexion.php?error=identification');
    exit; 
}
?>