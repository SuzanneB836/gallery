<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallerij
    </title>

    <link rel="icon" href="media/logo.png" type="image/png">
    <link rel="stylesheet" href="stylesheets/global.css">
    <link rel="stylesheet" href="stylesheets/home.css">
</head>

<body>

    <div class="navigation-container">
        <div class="nav-bar">
            <div class="logo">
                <a href="main.php">
                    <img src="media/logo.png" alt="Logo" class="logo-img">
                    <img src="media/web-name.png" alt="KnuffelGallerij" class="web-name">
                </a>
            </div>
            <div class="nav-items">
                <div class="nav-item">
                    <a href="gallery.php">Gallerij</a>
                </div>
                <div class="nav-item">
                    <a href="upload.php">Uploaden</a>
                </div>
            </div>
        </div>
    </div>

    <div class="intro-container">
        <div class="intro-text">
            <h1>
                De KnuffelGallerij
            </h1>
            <div>
                <p>In februari 2025 kreeg ik de opdracht om een eenvoudige PHP-website te ontwikkelen met een gekoppelde
                    database. Dit project was een kans om mijn programmeervaardigheden in de praktijk te brengen. In het
                    begin vond ik het lastig om een goed idee te bedenken. Na overleg met mijn docent, de heer P.
                    Holleberg, besloot ik het idee voor de <strong>KnuffelGalerij</strong> te ontwikkelen.</p>
            </div>

            <div>
                <p>De inspiratie voor dit project kwam uit mijn persoonlijke situatie. Omdat ik ver van school woon en
                    vaak met veel bagage reis, had ik regelmatig een knuffel bij me. Dit viel niet alleen mij op, maar
                    ook anderen in mijn omgeving. Dit bracht me op het idee om een platform te maken waar mensen hun
                    knuffels kunnen delen en waar knuffels een speciale plek krijgen in een digitale galerij.</p>
            </div>

            <div>
                <p>De <strong>KnuffelGalerij</strong> is een website waar mensen hun favoriete knuffels kunnen laten
                    zien. Het is meer dan alleen een verzameling foto's; het is een plek waar herinneringen en verhalen
                    gedeeld kunnen worden. Door dit project heb ik niet alleen mijn technische vaardigheden verbeterd,
                    maar ook geleerd hoe ik een idee om kan zetten naar een werkende en creatieve website.</p>
            </div>
        </div>
        <div class="intro-img">
            <img src="./media/knuffels.jpg">
        </div>
    </div>

    <div class="button-container">
        <a class="button" href="gallery.php">
            <p>Ga naar de gallerij!</p>
        </a>
    </div>

</body>

</html>