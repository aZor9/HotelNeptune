<!DOCTYPE html>
<html>
<title>Nos Chambres</title>

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

    <div style="height:100px" ></div>
    <div style="display:flex; justify-content:center; margin:30px 0;">
        <div class="menu">
            <ul>
                <li><a>TRIER : </a></li>
                <li class="dropdown">
                    <a>PRIX</a>
                    <ul class="dropdown-content">
                        <form method="post">
                            <label>
                                <li><input type="radio" name="prix" value="PRIX" required> PRIX CROISSANT</li>
                            </label>
                            <label>
                                <li><input type="radio" name="prix" value="PRIX_DESC"> PRIX DECROISSANT</li>
                            </label>
                            <label>
                                <div style="display:flex;">
                                    <li><input type="radio" name="prix" value="Xprix"></li>
                                    <li  style="display:flex;"><p style="padding-right:5px;" >Max </p><input type="text" placeholder="X>prix / X=?" name="Xprix"></li>
                                </div>
                            </label>
                            <label>
                                <div style="display:flex;">
                                    <li><input type="radio" name="prix" value="prixX"></li>
                                    <li  style="display:flex;"><p style="padding-right:5px;" >Min </p><input type="text" placeholder="X<prix / X=?" name="prixX"></li>
                                </div>
                            </label>
                            <label>
                                <li style="text-align:center;"><input type="submit" value="VALIDER"></li>
                            </label>
                        </form>
                    </ul>
                </li>
                <li class="dropdown">
                    <a>CAPACITE</a>
                    <ul class="dropdown-content">
                        <form method="post">
                            <label>
                                <li><input type="radio" name="capacite" value="CAP" required> Petit -> Grand </li>
                            </label>
                            <label>
                                <li><input type="radio" name="capacite" value="CAP_DESC"> Grand -> Petit </li>
                            </label>
                            <label>
                                <div style="display:flex;">
                                    <li><input type="radio" name="capacite" value="Xcap"></li>
                                    <li  style="display:flex;"><p style="padding-right:5px;" >Max </p><input type="text" placeholder="X>cap / X=?" name="Xcap"></li>
                                </div>
                            </label>
                            <label>
                                <div style="display:flex;">
                                    <li><input type="radio" name="capacite" value="capX"></li>
                                    <li  style="display:flex;"><p style="padding-right:5px;" >Min </p><input type="text" placeholder="X<prix / X=?" name="capX"></li>
                                </div>
                            </label>
                            <label>
                                <li style="text-align:center;">
                                    <input type="submit" value="VALIDER" >
                                </li>
                            </label>
                        </form>
                    </ul>
                    
                </li>
            </ul>
        </div>
    </div>
    <br>
    <div class='avant-box' style="display:flex; text-align:center; justify-content:center; flex-wrap: wrap;" >
        <?php


        if (isset($_POST["prix"])) {
            $choix = $_POST["prix"];

            if ($choix == "PRIX") {
                $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY prix ASC");
            } elseif ($choix == "PRIX_DESC") {
                $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY prix DESC");
            } elseif ($choix == "Xprix") {
                $Xprix = $_POST["Xprix"];
                $query = getDB()->query("SELECT * FROM room WHERE disponible=1 AND prix < $Xprix ORDER BY prix ASC");
            } elseif ($choix == "prixX") {
                $prixX = $_POST["prixX"];
                $query = getDB()->query("SELECT * FROM room WHERE disponible=1 AND prix > $prixX ORDER BY prix ASC");
            }
        }
        elseif (isset($_POST["capacite"])) {
            $choix = $_POST["capacite"];

            if ($choix == "CAP") {
                $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY nb_personne ASC");
            } elseif ($choix == "CAP_DESC") {
                $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY nb_personne DESC");
            } elseif ($choix == "Xcap") {
                $Xcap = $_POST["Xcap"];
                $query = getDB()->query("SELECT * FROM room WHERE disponible=1 AND nb_personne < $Xcap ORDER BY nb_personne ASC");
            } elseif ($choix == "capX") {
                $cap = $_POST["capX"];
                $query = getDB()->query("SELECT * FROM room WHERE disponible=1 AND nb_personne > $cap ORDER BY nb_personne ASC");
            }
        }
        else { 
            $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY num_chambre ASC");
        }

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
                    <form action="reserver.php" method="post">
                        <br>
                        <input type="hidden" name="reserve" value="' . $room['num_chambre'] . '">
                        <input type="submit" value="Réservez" name=reservee id="reservation">   
                    </form>
                </div>
            </div> 
                <br><br>
            ');
        }
        
        ?>
    </div>
</body>

</html>
