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
    echo('aa');
    if ($_POST['user'])
    {
        $id_user = $_POST['user'];
        $query = getDB()->query("SELECT id FROM 'user'");
        $users = $query->fetchAll(PDO::FETCH_COLUMN);
        foreach ($users as $user){
            if ($id_user==$user){
                $query = getDB()->query("DELETE FROM user WHERE id = $id_user "); 
                header('Location:/data/php/user_admin.php?good=suppresion');
                exit();
            }
        } 
        header('Location:/data/php/user_admin.php?error=suppresion'); // l'id user n'existe pas
    }
}
?>

<h1>MODIFIER UNE CHAMBRE</h1>
<br>
<form action="/data/php/maj_modif.php" method="post">
    <div class="boxinscription">
    Numéro de chambre :
        <input type="smallint "  placeholder="Numéro de chambre" name=num_chambre value="<?php echo( $room['num_chambre'] ); ?>" required>
        Surface en m² :
        <input type="smallint "  placeholder="Surface en m²" name=surface value="<?php echo( $room['surface'] ); ?>" required>
        Prix :
        <input type="decimal "  placeholder="Prix" name=prix value="<?php echo( $room['prix'] ); ?>" required>
        Nombre de lit simple :
        <input type="smallint "  placeholder="Nombre de lit simple" name=nb_lit_simple value="<?php echo( $room['nb_lit_simple'] ); ?>" required>
        Nombre de lit double :
        <input type="smallint "  placeholder="Nombre de lit double" name=nb_lit_double value="<?php echo( $room['nb_lit_double'] ); ?>" required>
        <div class="btn_radio" style="padding-left:10px; border: solid 0.5px;">
            <?php echo('Anciennement : '. $room['disponible']. ' (1=dispo)' ); ?>
            <br>
            <input type="radio" id="dispo" name="dispo" value="dispo" checked />
            <label for="huey">Disponnible</label>
            <br>
            <input type="radio" id="dispo" name="dispo" value="indispo" />
            <label for="dewey">Indisponnible</label>
        </div>
        <div class="text-center">
            <input type="submit" id="reservation" value="Mettre a jour">
        </div>            
    </div>
    </div>
</form>
