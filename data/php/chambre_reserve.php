<!DOCTYPE html>
<html>
<title>Chambres reservé</title>

<head>
    <link rel="stylesheet" href="/data/css/chambres.css">
</head>

<header>
    <?php
    include('navbar.php');
    include('database.php');
    session_start();
    if($_GET['error'] == "noaccount"){
        echo '<div class="error">Erreur : Vous devez avoir un compte pour réserver </div> <br>';
    }
    ?>
</header>

<body>
    
    <h1>Chambres reservées</h1>
    
    <br>
    <div class='avant-box' style="display:flex; text-align:center; justify-content:center; flex-wrap: wrap;" >
        <?php

            $query = getDB()->query("SELECT * FROM room WHERE disponible=0 ORDER BY num_chambre ASC");
        

        $rooms = $query->fetchAll(PDO::FETCH_ASSOC);

        
        
        foreach ($rooms as $room) {
            echo ('
            <br><br>
            <div style="display:flex; flex-direction:column; ">
                <div class="box">
                    <br>    
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
                    <br>    
                </div>
            </div> 
                <br><br>
            ');
        }
        
        ?>
    </div>
</body>

</html>
