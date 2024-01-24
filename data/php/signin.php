<?php  

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$password = $_POST['pwd'];
$repassword = $_POST['repwd'];

include('database.php');

if ($password!==$repassword){
    header('Location:/data/php/utilisateurs.php?error=errorpwd');
    exit;
}

$query = getDB()->query("SELECT mail FROM 'user'");
$emails = $query->fetchAll(PDO::FETCH_COLUMN);
// echo 'Les mails : ' . implode(', ', $emails);
foreach ($emails as $email){
    if ($mail==$email){
        header('Location:/data/php/utilisateurs.php?error=errormail');
        exit; 
    }
} 
$query = getDB()->query("INSERT INTO user (nom, prenom, mail, password, solde, admin) VALUES('$nom', '$prenom', '$mail', '$password', '0', '0')");

$query = getDB()->prepare("SELECT id FROM user WHERE mail = :mail");
$query->bindParam(':mail', $mail, PDO::PARAM_STR);
$query->execute();

$id = $query->fetch(PDO::FETCH_ASSOC);
$query = getDB()->prepare("SELECT solde FROM user WHERE mail = :mail");
$query->bindParam(':mail', $mail, PDO::PARAM_STR);
$query->execute();
$solde = $query->fetch(PDO::FETCH_ASSOC);


session_start();
$_SESSION['solde']=$solde['solde'];
$_SESSION['id']=$id['id'];
$_SESSION['mail']=$mail;
$_SESSION['pwd']=$password;
$_SESSION['Nom']=$nom;
$_SESSION['Prenom']=$prenom;
header('Location:/data/php/utilisateurs.php?good=connexion');
exit;

?>