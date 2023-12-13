<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout avec PHP, HTML et CSS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #left-column {
            flex: 1;
            padding: 20px;
        }

        #right-column {
            flex: 2;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .photo {
            width: 100%;
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <?php
        // Les liens des photos à afficher
        $leftPhoto = '/chambreTest.jpg';
        $rightPhotos = ['chambreTest.jpg', 'chambreTest.jpg'];
    ?>

    <?php
        // Obtenir la hauteur de l'image de gauche
        $leftImageInfo = getimagesize($leftPhoto);
        $leftImageHeight = $leftImageInfo[1];
        
        // Calculer la hauteur totale des images de droite
        $rightImagesHeight = $leftImageHeight / 2; // Divisez par le nombre d'images de droite
    ?>

    <div id="left-column">
        <img class="photo" src="<?php echo $leftPhoto; ?>" alt="Photo Gauche">
    </div>

    <div id="right-column">
        <?php foreach ($rightPhotos as $photo): ?>
            <img class="photo" src="<?php echo $photo; ?>" alt="Photo Droite" style="height: <?php echo $rightImagesHeight; ?>px;">
        <?php endforeach; ?>
    </div>

</body>
</html>
