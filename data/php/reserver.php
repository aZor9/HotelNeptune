<!DOCTYPE html>
<title>Reservation</title>
<link rel="stylesheet" href="/data/css/chambres.css">
<header>
<?php
    include('navbar.php');
    include('database.php');
    session_start();
?>

<body>

<br>
<div class="boxinscription">

<?php 

    // $numch=$_POST['reserve'];

    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reserve'])) { 
    //     $query = getDB()->query("SELECT * FROM room WHERE num_chambre =$numch");    
    //     // 
    //     // header('Location:chambres.php?reussi');
    // }
    // // else {header('Location:chambres.php?aaaa');}
    $numch=$_POST['reserve'];

    $query = getDB()->query("SELECT * FROM room WHERE num_chambre =$numch ");
    $room = $query->fetch(PDO::FETCH_ASSOC);
        echo ('
            <br><br>
            <div style="display:flex; flex-direction:column; ">
                <div class="box">
                    <br>    
                    <b>VOULEZ VOUS RESERVER CETTE CHAMBRE</b>
                    Numéro de chambre : ' . $room['num_chambre'] . '
                    <br>
                    Surface : ' . $room['surface'] . ' m²
                    <br>
                    Prix : ' . $room['prix'] . ' € par nuit
                    <br>
                    Nombre de personnes : ' . $room['nb_personne'] . '
                    <br>
                    Nombre de lit double : ' . $room['nb_lit_double'] . '
                    <br>
                    Nombre de lit simple : ' . $room['nb_lit_simple'].'
                    <br>
                    <form method="post">
                        <br>
                        <input type="hidden" name="confirmation" value="' . $room['num_chambre'] . '">
                        <input type="submit" value="Confirmez" id="reservation">   
                    </form>
                </div>
            </div> 
                <br><br>
       ');
       
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmation'])) {
        $confirmation=$_POST['confirmation'];
        $num_ch=$confirmation;
        $query = getDB()->query("UPDATE room SET disponible = '0' WHERE num_chambre = $num_ch ");
        
        // récupère la solde actuelle du client
        $mail=$_SESSION['mail'];
        $query = getDB()->prepare("SELECT solde FROM user WHERE mail = :mail");
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $solde = $query->fetch(PDO::FETCH_ASSOC);
        $solde=$solde['solde'];

        // récup le prix de la chambre 
        $query = getDB()->prepare("SELECT prix FROM room WHERE num_chambre = :num_chambre");
        $query->bindParam(':num_chambre', $num_ch, PDO::PARAM_STR);
        $query->execute();
        $prixch = $query->fetch(PDO::FETCH_ASSOC);
        $prixch=$prixch['prix'];

        // lui soustrait le tarif de la chambre
        $transaction=$solde-$prixch;
        $query = getDB()->query("UPDATE user SET solde=$transaction WHERE mail = $mail ");

        header('Location:/index.php?reservation=ok');

    }


?>



</div>


</body>
