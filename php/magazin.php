<?php
require_once dirname(__DIR__) . '/config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmand&Bien - Prendre du poids avec plaisir</title>
    <link rel="stylesheet" href="../css/magazin.css">
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

    <section class="produits">
        <h2>Nos produits pour un gain de poids sain et gourmand</h2>
        
        <div class="produit">
            <img src="../images/boisson.jpg" alt="Shake hypercalorique">
            <h3>Shakes hypercaloriques</h3>
            <p>Des boissons onctueuses et riches en calories pour un apport énergétique optimal.</p>
            <span class="price">14,99 €</span>
            <button>Ajouter au panier</button>
        </div>
        
        <div class="produit">
            <img src="../images/snekers.jpg" alt="Snacks énergétiques">
            <h3>Snacks énergétiques</h3>
            <p>Des barres et snacks gourmands à déguster pour un boost de calories tout au long de la journée.</p>
            <span class="price">9,99 €</span>
            <button>Ajouter au panier</button>
        </div>
        
        <div class="produit">
            <img src="../images/mcdo.jpg" alt="Repas riches en calories">
            <h3>Repas prêts-à-manger</h3>
            <p>Des plats délicieux et équilibrés pour vous aider à atteindre vos objectifs de prise de poids.</p>
            <span class="price">19,99 €</span>
            <button>Ajouter au panier</button>
        </div>
        
        <div class="produit">
            <img src="../images/sucre.jpg" alt="Suppléments">
            <h3>Suppléments nutritionnels</h3>
            <p>Des compléments pour soutenir votre prise de poids en toute sécurité.</p>
            <span class="price">12,99 €</span>
            <button>Ajouter au panier</button>
        </div>
    </section>

    <?php include PHP_PATH_FS . '/footer.php'; ?>
</body>
</html>
