<!DOCTYPE html>
    <html>
    <title>Modification des utilisateurs</title>

    <head>
        <link rel="stylesheet" href="/data/css/admin.css">
    </head>

<?php

session_start();
include('database.php');

if ($_SESSION['admin']==true){
    if ($_POST['user'])
    {
        $id_user = $_POST['user'];
        $query = getDB()->prepare("SELECT * FROM user where id = :id");
        $query->bindParam(':id', $id_user, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
}}
?>

<h1>MODIFIER UN UTILISATEUR</h1>
<br>
<form action="/data/php/maj_modif_user.php" method="post">
    <div class="boxinscription">
        Id de l'utilisateur :
        <input type="text "  placeholder="Id" name=id_user value="<?php echo( $user['id'] ); ?>" required>
        Prénom de l'utilisateur :
        <input type="text "  placeholder="Prénom" name=prenom value="<?php echo( $user['prenom'] ); ?>" required>
        Nom de l'utilisateur :
        <input type="text "  placeholder="Nom" name=name value="<?php echo( $user['nom'] ); ?>" required>
        Email de l'utilisateur :
        <input type="mail "  placeholder="Email de l'utilisateur" name=mail value="<?php echo( $user['mail'] ); ?>" required>
        Mot de passe de l'utilisateur :
        <input type="text "  placeholder="Mot de passe de l'utilisateur" name=password value="<?php echo( $user['password'] ); ?>" required>
        solde :
        <input type="smallint "  placeholder="solde" name=solde value="<?php echo( $user['solde'] ); ?>" required>
        Admin (1=oui / 0=non) :
        <input type="smallint "  placeholder="Admin" name=password value="<?php echo( $user['admin'] ); ?>" required>

        <div class="text-center">
            <input type="submit" id="reservation" value="Mettre a jour"> <!-- id réutilisé, a changer-->
        </div>            
    </div>
    </div>
</form>
