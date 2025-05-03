<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Témoignages - Être Gros, C'est Bon pour la Santé !</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<?php 
if(isset($_COOKIE["theme"])){
    if ($_COOKIE["theme"] == "sombre"){
        echo '<body class="dark-theme">';
    }
    else{
        echo '<body class="light-theme">';
    }
}
else{
    echo '<body class="light-theme">';
}

    include PHP_PATH_FS . '/nav.php'; ?>  
    
    <div class="container">
        <article class="art1">
            <img src="images/hamburger.jpg" alt="hamburger">
            <h1>Aider à Grossir</h1>
            <div class="resume">
                <p>Un site créé par MEZDOUR Ghani, ENGELS Tom, FREMION Lucas , GEIGER Romain et ROGER Thomas. Nous sommes honorés de pouvoir vous présenter notre site, il aura pour but d'aider les personnes souhaitant gagner un peu de poid. En leur proposant des produits, des conseils, vous pourrez aussi avoir accès à nos feedback.</p>
            </div>
        </article>
    </div>
    
    
    <?php include PHP_PATH_FS . '/footer.php'; ?>
</body>
</html>