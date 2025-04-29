<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmand&Bien - Prendre du poids avec plaisir</title>
    <link rel="stylesheet" href="../css/magazin.css">
</head>
<body>

    <?php
    $title = 'Accueil';
    include $_SERVER['DOCUMENT_ROOT'].'/ProjetWEB/Darkmode.php';
    ?>
    
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

    <footer class="footer">
        <dl>
            <dt>Téléphone :</dt>
            <dd> (+33) (0)3 22 88 99 63</dd>
            <dt> Adresse :</dt>
            <dd> Gourmang & CO
            -
            Institut Santé <br>
            de l'art de manger équilibré <br>
            2 Rue de Marthe <br>
            80500 Montdidier </dd>
        </dl>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2583.4086902754784!2d2.5847180920388624!3d49.646598271309735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7c1c6a9871dc7%3A0x6a6bb891382827e8!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732617040481!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <ul class="formLink">
            <li><a class="formLink" href="magazin.html">Visitez notre boutique en ligne</a></li>
            <li><a class="formLink" href="contact.html">Contactez-nous </a></li>
        </ul>
    </ul>
        </footer>
</body>
</html>
