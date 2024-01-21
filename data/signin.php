<?php  

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$password = $_POST['pwd'];
$repassword = $_POST['repwd'];

include ('database.php');

if ($password!==$repassword){
    header('Location:/data/Utilisateurs.php?error=errorpwd');
    exit;
}

$query = getDB()->query("SELECT mail FROM 'user'");
$emails = $query->fetchAll(PDO::FETCH_COLUMN);
// echo 'Les mails : ' . implode(', ', $emails);
foreach ($emails as $email){
    if ($mail==$email){
        header('Location:/data/Utilisateurs.php?error=errormail');
        exit; 
    }
} 
$query = getDB()->query("INSERT INTO user (nom, prenom, mail, password, admin) VALUES('$nom', '$prenom', '$mail', '$password', '0')");


session_start();

$_SESSION['mail']=$mail;
$_SESSION['pwd']=$password;
$_SESSION['Nom']=$nom;
$_SESSION['Prenom']=$prenom;
header('Location:/data/Utilisateurs.php?good=connexion');
exit;

?>