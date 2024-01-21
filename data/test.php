<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec Choix Personnalisé</title>
</head>
<body>

<form  method="post">
    <label>
        <input type="radio" name="choix" value="choix1" >
        Choix 1
    </label>
    <br>
    <label>
        <input type="radio" name="choix" value="choix2">
        Choix 2
    </label>
    <br>
    <label>
        <input type="radio" name="choix" value="choix3">
        Choix 3
        <input type="text" name="choix_personnalise" placeholder="Saisissez votre choix">
    </label>
    <br>
    <label>
        <input type="radio" name="choix" value="choix4">
        Choix 4
    </label>
    <br>
    <input type="submit" value="Valider">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["choix"])) {
        $choix = $_POST["choix"];

        if ($choix == "choix3") {
            if (isset($_POST["choix_personnalise"])) {
                $choix_personnalise = $_POST["choix_personnalise"];
                echo "Vous avez choisi : " . $choix_personnalise;
            } else {
                echo "Veuillez saisir votre choix personnalisé.";
            }
        } else {
            echo "Vous avez choisi : " . $choix;
        }
    } else {
        echo "Aucun choix n'a été sélectionné.";
    }
}
?>


</body>
</html>
