<?php  

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$password = $_POST['pwd'];
$repassword = $_POST['repwd'];


include ('database.php');

if ($password!==$repassword){
    header('Location:/data/Utilisateurs.php?error=errorpwd');
    $erreur=1;
    exit;
}

$query = getDB()->query("SELECT mail FROM 'user'");
$emails = $query->fetchAll(PDO::FETCH_COLUMN);
// echo 'Les mails : ' . implode(', ', $emails);
foreach ($emails as $email){
    if ($mail==$email){
        header('Location:/data/Utilisateurs.php?error=errormail');
        $erreur=1;
        exit; 
    }
} 
$query = getDB()->query("INSERT INTO user (nom, prenom, mail, password) VALUES('$nom', '$prenom', '$mail', '$password')");






?>