<!DOCTYPE html>
    <html>
    <title>Modification de chambre</title>

    <head>
        <link rel="stylesheet" href="/data/css/admin.css">
    </head>

    <header>
        <?php
        include('navbar.php');
        include('database.php');
        session_start();
        

        $num_chambre = $_POST['num_chambre']; 
        echo('aa'); 
        $query = getDB()->query("DELETE FROM room WHERE num_chambre = $num_chambre "); //supprime l'ancienne donnée
        echo('aa'); 
            $num_chambre = $_POST['num_chambre']; //mise a jour de l'ancienne donnée :
            $surface = $_POST['surface'];
            $prix = $_POST['prix'];
            $nb_lit_simple = $_POST['nb_lit_simple'];
            $nb_lit_double = $_POST['nb_lit_double'];
            $nb_personne = ($nb_lit_double*2 + $nb_lit_simple); //calcul en fonction du nombre de lit par chambre car donnée calculable
            if ($_POST['dispo'] == 'dispo') { //passage d'une bouton radio en donnée booléenne
                $dispo = 1;}
            else {
                $dispo = 0;}
            echo('aa'); 
        $query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('$num_chambre', '$surface', '$prix', '$nb_personne', '$nb_lit_simple','$nb_lit_double', '$dispo')");

        
        header('Location:/data/php/chambres.php'); // la chambre n'existe pas

    ?>
    </header>

    </body>
