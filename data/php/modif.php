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
        
        $numch = $_GET['good'];
        $query = getDB()->query("SELECT * FROM room WHERE num_chambre = $numch");
        $room = $query->fetch(PDO::FETCH_ASSOC);

        if($_GET['error'] == "chambre_non_existe"){
            echo '<div class="error">Erreur : Chambre non existante </div> <br>';
        }       
    ?>
    </header>

    <body>
        <br>
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

        <br><br>

    </body>
